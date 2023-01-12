<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Status extends Model
{

    protected $table = 'states';
    
    static $rules = [
		'organization_id' => 'required',
        'name' => 'required',
    ];


    protected $perPage = 20;

    public $timestamps = false;

    
    protected $fillable = ['name','organization_id','rol_id'];



}
