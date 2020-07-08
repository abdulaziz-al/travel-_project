<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Travel;
use App\Models\Hotel;
use App\Models\UserJob;
class Program extends Model
{
    protected $table = 'programs';
    protected $primaryKey = 'id';
    protected $with = ['user_jobs'];

    protected $fillable = [
        'user_job_id','hotel_id','travel_id',
        'type','cost'
        ];

    protected $hidden = [
        'user_job_id','hotel_id','travel_id',
        'type','cost'
    ];

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    } 
    public function user_job()
    {
        return $this->belongsTo(UserJob::class);
    } 
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    } 
}
