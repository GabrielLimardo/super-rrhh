<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VisualDocument
 *
 * @property $id
 * @property $rol_id
 * @property $periodo
 * @property $tipo_documento
 * @property $belong_to
 * @property $company
 * @property $branch
 * @property $management
 * @property $document_nro
 * @property $profile_nro
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VisualDocument extends Model
{
    
    static $rules = [
		'rol_id' => 'required',
    ];

    public $timestamps = false;

    
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['rol_id','periodo','tipo_documento','belong_to','company','branch','management','document_nro','profile_nro'];



}
