<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Program;
use App\Models\Operation;
class Income extends Model
{
    protected $table = 'incomes';
    protected $primaryKey = 'id';
    protected $with = ['programs'];

    protected $fillable = [
        'program_id','opration_id','price',
        'name','status'
        ];

    protected $hidden = [
        'program_id','opration_id','price',
        'name','status'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    } 
    public function operation()
    {
        return $this->belongsTo(Operation::class);
    } 
}
