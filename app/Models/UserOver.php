<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserJob;
use App\Models\OverSalary;
class UserOver extends Model
{
    protected $table = 'user_overs';
    protected $primaryKey = 'id';
    protected $with = ['user_job'];

    protected $fillable = [
        'user_job_id','over_salary_id','status'

        ];

    protected $hidden = [
        'user_job_id','over_salary_id','status'

    ];

   
    public function user_job()
    {
        return $this->belongsTo(UserJob::class);
    } 
    public function over_salary()
    {
        return $this->belongsTo(OverSalary::class);
    } 
}
