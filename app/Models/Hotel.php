<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserJob;
class Hotel extends Model
{
    protected $table = 'hotels';
    protected $primaryKey = 'id';
    protected $with = ['user_jobs'];

    protected $fillable = [
        'user_job_id','city','from',
        'name','to','night','room'
        ];

    protected $hidden = [
        'user_job_id','city','from',
        'name','to','night','room'
    ];

    public function user_job()
    {
        return $this->belongsTo(UserJob::class);
    } 
   
}
