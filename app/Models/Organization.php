<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Organization
 *
 * @property $id
 * @property $identification_nro
 * @property $fantasy_name
 * @property $legal_name
 * @property $code
 * @property $updated_at
 * @property $created_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Organization extends Model
{
    protected $table = 'organizations';

    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['identification_nro','fantasy_name','legal_name','code'];



}
