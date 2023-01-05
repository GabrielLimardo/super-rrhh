<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $last_name
 * @property $document_type
 * @property $document_nro
 * @property $identification_doc
 * @property $terms_agreements
 * @property $labor_profile
 * @property $company_id
 * @property $branch_id
 * @property $management_id
 * @property $status
 * @property $admission_date
 * @property $egress_date
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Model
{
    
    static $rules = [
		'name' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email','last_name','document_type','document_nro','identification_doc','terms_agreements','labor_profile','company_id','branch_id','management_id','status','admission_date','egress_date'];



}
