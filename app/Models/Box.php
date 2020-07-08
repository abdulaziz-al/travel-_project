<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Income;
use App\Models\Expenses;

class Box extends Model
{
    protected $table = 'boxes';
    protected $primaryKey = 'id';
    protected $with = ['users'];

    protected $fillable = [
        'expenses_id','income_id','user_id','type','price',
        'status'
    ];

    protected $hidden = [
        'expenses_id','income_id','user_id','type','price',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function iccome()
    {
        return $this->belongsTo(Income::class);
    }
    public function expenses()
    {
        return $this->belongsTo(Expenses::class);
    }
  
}
