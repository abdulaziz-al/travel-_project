<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Job;
use App\Models\UserJob;
use App\Models\OverSalary;
use App\Models\UserOver;
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

        $userjob = UserJob::all();
        $over_salary = OverSalary::all();
        $userOver = UserOver::all();
       // return $userOver ;
        $arr = Array('userjob'=>$userjob , 'over_salary'=>$over_salary , 'userOver'=>$userOver);
        return view('welcome' , $arr);
    }
  
}
