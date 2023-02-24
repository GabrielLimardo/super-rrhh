<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class PaymentHistory extends Model
{
    protected $table = 'payment_history';

    static $rules = [
        'user_id' => 'required',
        'amount' => 'required',
    ];

    public $timestamps = false;
    protected $perPage = 20;

    protected $fillable = ['user_id','amount'];


    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
