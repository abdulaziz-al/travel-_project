<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Travel;
use App\Models\Program;
use App\Models\Hotel;
class Passenger extends Model
{
    protected $table = 'passengers';
    protected $primaryKey = 'id';
    protected $with = ['travel'];

    protected $fillable = [
        'travel_id','program_id','hotel_id',
        'full_name','marking','status'
        ];

    protected $hidden = [
        'travel_id','program_id','hotel_id',
        'full_name','marking','status'
    ];

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    } 
    public function program()
    {
        return $this->belongsTo(Program::class);
    } 
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    } 

}
