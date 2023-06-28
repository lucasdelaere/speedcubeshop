<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'status',
        'total_price',
        'session_id',
        'user_id',
        'address',
        'postal_code',
        'city',
        'country',
        'phone_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
