<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserJob;
class Travel extends Model
{
    protected $table = 'travel';
    protected $primaryKey = 'id';
    protected $with = ['user_jobs'];

    protected $fillable = [
        'user_job_id','driver_id','from','to',
        'price','passenger','start_time','driver_move',
        'expected_time','text','status'

        ];

    protected $hidden = [
        'user_job_id','driver_id','from','to',
        'price','passenger','start_time','driver_move',
        'expected_time','text','status'
    ];

   
    public function user_job()
    {
        return $this->belongsTo(UserJob::class);
    } 
}
