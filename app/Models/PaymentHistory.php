<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class PaymentHistory extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'amount' => 'required',
		'last' => 'required',
    ];

    public $timestamps = false;
    protected $perPage = 20;

    protected $fillable = ['user_id','amount','last'];


    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
