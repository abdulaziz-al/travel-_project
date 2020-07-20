<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use App\Models\UserJob;
use App\Models\Job;
use App\Models\Salary;
use App\Models\OverSalary;
use App\Models\UserOver;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    protected function Addmember(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email =  $request->email;
        $user->phone =  $request->phone;
        $user->NID =  $request->NID;
        $user->exp = $request->Exp;
        $user->role_id =  1;
        $user->password = $request->password; 
        $user->created_at = '2020-07-08 23:27:40' ; 
        $user->save(); 

        $job = Job::find($request->selected);

        $userJob = new UserJob ; 
        $userJob->user_id = $user->id ; 
        $userJob->job_id = $job->id ; 
        $userJob->status = 1 ; 
        $userJob->save();

       
        $salary = new Salary();
        $salary->user_job_id = $userJob->id;
        $salary->price = $userJob->faisal->price;
        $salary->over_salary = 0.0;
        $salary->save();
        

        Alert::success($userJob->faisal->name. ' ' .'الوظيفة ', 'ألاسم '.' ' . $request->name);

        return back();
    }

    protected function newJobs(Request $request){
        
        $job = new Job ;
        $job->name = $request->job_name;
        $job->price = $request->job_price;
        $job->start = $request->start;
        $job->end = $request->end;
       // $job->created_by = auth()->user()->id ;   for know who create this new job 
        $job->save();



        Alert::success('تمت إضافة وظيفة '.$job->name.' ',$job->price .' '.'راتب');

        return back();

        
    }
    protected function overSalary(Request $request){

       // $user_job =  UserJob::where('user_id',auth()->user()->id)->first(); after active login 
        $overSalary = new OverSalary;
        $overSalary->name = $request->over_name;
        $overSalary->percentage = $request->over_percentage;
        $overSalary->user_job_id = 1 ; // deleted after active login 
       // $overSalary->user_job_id = auth()->user()->id ; also after active login
        $overSalary->save();

        
        Alert::success('تمت إضافة بدل  '.$overSalary->name.' ',$overSalary->percentage .' '.'بنسبة');

        return back();

    }

    protected function userOver(Request $request){

        $userOver = new UserOver;
        $userOver->user_job_id = $request->seletedUser;
        $userOver->over_salary_id = $request->overSalary;
        $userOver->status = 1;
        $userOver->save();


        Alert::success(' تم تسجيل بدل إلى'.' '. $userOver->user_job->azo->name  ,  'اسم البدل'.' '. $userOver->over_salary->name );

        return back();


    }
    protected function getjob(){
        $job=Job::all();
        return response()->json(['status'=>'success','data'=>$job]);
    }
  
    protected function createjob(Request $request){//post 
        $validator = Validator::make($request->all(),[
            
            ]);
            if ($validator->fails()) {
                return response()->json(['status'=>'error','errors'=>$validator->errors()]);
            }
        $job=Job::where('name',$request->selected)->first();
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->NID=$request->NID;
        $user->exp=$request->exp;
        $user->phone=$request->phone;
        $user->password=$request->password;
        $user->role_id=1;
        $user->save();
        $userJob=new UserJob;
        $userJob->user_id= $user->id;
        $userJob->job_id= $job->id;
        $userJob->status=1;
        $userJob->save();
        return response()->json(['status'=>'success','data'=>$userJob]);
        

        

    }   
    
    protected function CreateEmploye(){
        $job=Job::all();
        return view('HR.CreateEmploye');
    }
}
