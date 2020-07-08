<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserJob;
use App\Models\Operation;
use App\Models\Servicing;
class Expenses extends Model
{
    protected $table = 'expenses';
    protected $primaryKey = 'id';
    protected $with = ['user_jobs'];

    protected $fillable = [
        'user_job_id','opration_id','servicing_id',
        'name','price','status'
        ];

    protected $hidden = [
        'user_job_id','opration_id','servicing_id',
        'name','price','status'
    ];

    public function user_job()
    {
        return $this->belongsTo(UserJob::class);
    } 
     public function operation()
    {
        return $this->belongsTo(Operation::class);
    } 
     public function servicing()
    {
        return $this->belongsTo(Servicing::class);
    }
}
