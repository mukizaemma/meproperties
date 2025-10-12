<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealimage extends Model
{
    use HasFactory;
    protected $table = 'dealimages';

    protected $fillable = [
        'image','caption','deal_id','added_by'
    ];

    public function deal(){
    return $this->belongsTo(Deal::class);
    }
}
