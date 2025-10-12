<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carimage extends Model
{
    use HasFactory;
    
    protected $table = 'carimages';

    protected $fillable = [
        'image','caption','car_id','added_by'
    ];

    public function car(){
    return $this->belongsTo(Car::class);
    }
}
