<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Job;
class UserJob extends Model
{
    protected $table = 'user_jobs';
    protected $primaryKey = 'id';
    protected $with = ['user'];

    protected $fillable = [
        'user_id','job_id','status'

        ];

    protected $hidden = [
        'user_id','job_id','status'

    ];

   
    public function user()
    {
        return $this->belongsTo(User::class);
    } 
    public function job()
    {
        return $this->belongsTo(Job::class);
    } 
}
