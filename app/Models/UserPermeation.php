<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Permeation;
class UserPermeation extends Model
{
    protected $table = 'user_permeations';
    protected $primaryKey = 'id';
    protected $with = ['user'];

    protected $fillable = [
        'user_id','permeation_id'

        ];

    protected $hidden = [
        'user_id','permeation_id'

    ];

   
    public function user()
    {
        return $this->belongsTo(User::class);
    } 
    public function permeation()
    {
        return $this->belongsTo(Permeation::class);
    } 
}
