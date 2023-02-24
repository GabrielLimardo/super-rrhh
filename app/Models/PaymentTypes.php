<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentDiscount;
use App\Models\PaymentTax;
class PaymentTypes extends Model
{
    
    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['name'];

    public $timestamps = false;

    public function paymentTaxes()
    {
        return $this->hasMany(PaymentTax::class, 'payment_id', 'id');

    }
    
    public function paymentDiscounts()
    {
        return $this->hasMany(PaymentDiscount::class, 'payment_id', 'id');
    }

}
