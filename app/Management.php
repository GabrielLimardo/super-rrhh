<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Management
 *
 * @property $id
 * @property $name
 * @property $branch_id
 * @property $code
 * @property $updated_at
 * @property $created_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Management extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','branch_id','code'];



}
