<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PaymentTypes extends Model
{
    
    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public $timestamps = false;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cargasImpositivas()
    {
        return $this->hasMany('PaymentTax', 'payment_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function descuentosSueldos()
    {
        return $this->hasMany('PaymentDiscounts', 'payment_id', 'id');
    }
    
    

}
