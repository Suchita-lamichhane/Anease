<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'transaction_uuid',
        'status',
        'ref_id',
        'product_details',
        'payment_method',
        'billing_details',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
