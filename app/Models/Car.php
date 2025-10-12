<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $fillable = [
        'title','slug','description','image','status','price','model','year','color','mileage',
        'engineType','advertType','transmission','doors','ownerTel','contact','ownerId','subscription_type',
        'cartype_id','added_by','subscription_id'
    ];

    public function type(){
    return $this->belongsTo(Cartype::class,'catype_id');
    }

    public function subscription(){
        return $this->belongsTo(Subscription::class);
    }
    public function images(){
        return $this->hasMany(Carimage::class);
    }
}
