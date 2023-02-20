<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTax extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'name',
        'porcentaje',
    ];
    public $timestamps = false;

    public function tipoPago()
    {
        return $this->belongsTo(TipoPago::class);
    }
}
