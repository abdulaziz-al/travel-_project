<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserJob;
class Bus extends Model
{
    protected $table = 'buses';
    protected $primaryKey = 'id';
    protected $with = ['user_jobs'];

    protected $fillable = [
        'user_job_id','number_letter','status',
    ];

    protected $hidden = [
        'user_job_id','number_letter','status',

    ];

    public function user_job()
    {
        return $this->belongsTo(UserJob::class);
    }

   
}
