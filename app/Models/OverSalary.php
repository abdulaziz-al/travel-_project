<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserJob;
class OverSalary extends Model
{
    protected $table = 'over_salaries';
    protected $primaryKey = 'id';
    protected $with = ['user_job'];

    protected $fillable = [
        'name','percentage','user_job_id'
        ];

    protected $hidden = [
        'name','percentage','user_job_id'

    ];

    public function user_job()
    {
        return $this->belongsTo(UserJob::class);
    } 
}
