<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'end','start','price',
        'name','status'
        ];

    protected $hidden = [
        'end','start','price',
        'status'
    ];

   
}
