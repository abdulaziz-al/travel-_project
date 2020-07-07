<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserJob;
class Covenant extends Model
{
    protected $table = 'covenants';
    protected $primaryKey = 'id';
    protected $with = ['user_jobs'];

    protected $fillable = [
        'user_job_id','name','from','to','status'
        ];

    protected $hidden = [
        'user_job_id','name','from','to','status'

    ];

    public function user_job()
    {
        return $this->belongsTo(UserJob::class);
    }

}
