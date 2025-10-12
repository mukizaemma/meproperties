<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;
    
    protected $table = 'deals';

    protected $fillable = [
        'title','slug','description','image','status','currency','price','subscription_id','category_id',
        'location','contact','condition','subscription_type','listing_type','added_by','price',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subscription(){
        return $this->belongsTo(Subscription::class);
    }
    
    public function images(){
        return $this->hasMany(Dealimage::class);
    }
}
