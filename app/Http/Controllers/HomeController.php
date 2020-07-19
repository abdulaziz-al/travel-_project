<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Job;
use App\Models\UserJob;
use Illuminate\Support\Facades\Validator;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  /*  public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        toast('Your Post as been submited!','success');
        return view('home');
    }

    protected function welcome(){
        toast('Question Toast','question');
        return view('welcome');
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
