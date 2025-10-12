<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table='subscriptions';

    protected $fillable = [
        'names',
        'slug',
        'description',
        'phone',
        'email',
        'website',
        'address',
        'url',
        'user_id',
        'subscription_type',
        'amount_paid',
        'amount_due',
        'is_paid',
        'is_recurring',
        'start_date',
        'end_date',
        'next_due_date',
        'grants_account',
        'status',
    ];
}
