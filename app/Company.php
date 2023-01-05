<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 *
 * @property $id
 * @property $identification_nro
 * @property $fantasy_name
 * @property $legal_name
 * @property $status
 * @property $updated_at
 * @property $created_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Company extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['identification_nro','fantasy_name','legal_name','status'];



}
