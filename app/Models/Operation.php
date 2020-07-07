<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\USerJob;
class Operation extends Model
{
    protected $table = 'operations';
    protected $primaryKey = 'id';
    protected $with = ['user_jobs'];

    protected $fillable = [
        'user_job_id','type','company_name','country','phone',
        'email','path','price','status'
        ];

    protected $hidden = [
        'user_job_id','type','company_name','country','phone',
        'email','path','price','status'
    ];

    public function user_job()
    {
        return $this->belongsTo(UserJob::class);
    } 
  
}
