<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationConfig extends Model
{
    
    static $rules = [
		'organization_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organization_id','send_email','send_signature_email','dissatisfied','watch','download','sign_first'];



}
