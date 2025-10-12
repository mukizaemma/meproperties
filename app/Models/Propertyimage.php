<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propertyimage extends Model
{
    use HasFactory;
    
    protected $table = 'propertyimages';

    protected $fillable = [
        'image','caption','property_id','added_by'
    ];

    public function property(){
    return $this->belongsTo(Property::class);
    }
}
