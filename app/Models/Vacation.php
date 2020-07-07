<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserJob;
class Vacation extends Model
{
    protected $table = 'vacations';
    protected $primaryKey = 'id';
    protected $with = ['user_job'];

    protected $fillable = [
        'user_job_id','Reason','to','seen',
        'from','status','accepted_by','seen_by'

        ];

    protected $hidden = [
        'user_job_id','Reason','to','seen',
        'from','status','accepted_by','seen_by'
    ];

   
    public function user_job()
    {
        return $this->belongsTo(UserJob::class);
    } 
    
}
