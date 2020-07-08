<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserJob;
class Report extends Model
{
    protected $table = 'reports';
    protected $primaryKey = 'id';
    protected $with = ['user_jobs'];

    protected $fillable = [
        'user_job_id','name',
        'type','status'
        ];

    protected $hidden = [
        'user_job_id','name',
        'type','status'
    ];

   
    public function user_job()
    {
        return $this->belongsTo(UserJob::class);
    } 
    
}
