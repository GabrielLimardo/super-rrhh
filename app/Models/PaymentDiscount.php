<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDiscount extends Model
{
    use HasFactory;

    protected $table = 'payment_discounts';

    protected $fillable = ['name', 'percentage', 'payment_id'];

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }
}