<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserJob;
class Salary extends Model
{
    protected $table = 'salaries';
    protected $primaryKey = 'id';
    protected $with = ['user_job'];

    protected $fillable = [
        'user_job_id','price',
        'over_salary'
        ];

    protected $hidden = [
        'user_job_id','price',
        'over_salary'
    ];

   
    public function user_job()
    {
        return $this->belongsTo(UserJob::class);
    } 
    
}
