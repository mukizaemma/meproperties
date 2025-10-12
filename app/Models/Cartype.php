<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartype extends Model
{
    use HasFactory;
    protected $table = 'cartypes';

    protected $fillable = [
        'name','slug','description','image','status'
    ];

    public function cars(){
    return $this->hasMany(Car::class);
    }
}
