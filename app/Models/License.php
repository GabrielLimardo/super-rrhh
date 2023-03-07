<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{

    static $rules = [
		'file_path' => 'required',
		'license_type_id' => 'required',
		'state_id' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['file_path','license_type_id','state_id','user_id','dissatisfied_text','extra_filter','employers_sees','since','until'];



}
