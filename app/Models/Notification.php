<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserJob;
class Notification extends Model
{
    protected $table = 'notifications';
    protected $primaryKey = 'id';
    protected $with = ['user_jobs'];

    protected $fillable = [
        'text','from','to',
        'seen','user_job_id'
        ];

    protected $hidden = [
        'text','from','to',
        'seen','user_job_id'
    ];

    public function user_job()
    {
        return $this->belongsTo(UserJob::class);
    } 
  
}
