<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'properties';
    protected $fillable = [
        'title','slug','description','image','status','category','price','listing_type','property_type','currency','price',
        'parking','city','other_city','email','location','contact','bedrooms','bathrooms','furnished_status','subscription_type',
        'added_by','subscription_id'
    ];
    public function subscription(){
        return $this->belongsTo(Subscription::class);
    }
    
    public function images(){
        return $this->hasMany(Propertyimage::class);
    }
}
