<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserJob;
use App\Models\Bus;
use App\Models\Store;
class Servicing extends Model
{
    protected $table = 'servicings';
    protected $primaryKey = 'id';
    protected $with = ['user_jobs'];

    protected $fillable = [
        'user_job_id','store_id','bus_id',
        'price','status'
        ];

    protected $hidden = [
        'user_job_id','store_id','bus_id',
        'price','status'
    ];

   
    public function user_job()
    {
        return $this->belongsTo(UserJob::class);
    } 
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    } 
    public function store()
    {
        return $this->belongsTo(Store::class);
    } 
}
