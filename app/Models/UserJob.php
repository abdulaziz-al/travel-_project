<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\User;
class UserJob extends Model
{
    protected $table = 'user_jobs';
    protected $primaryKey = 'id';
   

    protected $guarded = [];


    protected $fillable = [
        'user_id','job_id','status'

        ];

    protected $hidden = [
        'user_id','job_id','status'

    ];

   
    public function azo()
    {
       // return $this->belongsTo(User::class);// stander and the  basic one ..... function name must be like db table name 
        return $this->belongsTo('App\User', 'user_id', 'id');
    } 
    public function faisal()
    {
     //   return $this->belongsTo(job::class);

        return $this->belongsTo('App\Models\Job', 'job_id', 'id');//help if you wanna change the name of function...... if user's table and you wanna give function name Admin
    } 
}
