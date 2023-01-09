<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VisualStatistic
 *
 * @property $id
 * @property $rol_id
 * @property $new_employee
 * @property $total_employee
 * @property $document_state
 * @property $egress_employee
 * @property $signed_documents
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VisualStatistic extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    public $timestamps = false;

    
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['rol_id','new_employee','total_employee','document_state','egress_employee','signed_documents'];



}
