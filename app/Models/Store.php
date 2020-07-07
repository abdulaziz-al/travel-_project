<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserJob;
class Store extends Model
{
    protected $table = 'stores';
    protected $primaryKey = 'id';
    protected $with = ['user_jobs'];

    protected $fillable = [
        'user_job_id','name','count',
        'price'
        ];

    protected $hidden = [
        'user_job_id','name','count',
        'price'
    ];

   
    public function user_job()
    {
        return $this->belongsTo(UserJob::class);
    } 
   
}
