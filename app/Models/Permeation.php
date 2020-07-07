<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permeation extends Model
{
    protected $table = 'permeations';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name','Rank'
        ];

    protected $hidden = [
        'name','Rank'

    ];

   
}
