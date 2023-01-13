<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentStatus extends Model
{

  protected $table = 'document_x_status';

    static $rules = [
		'organization_id' => 'required',
    'document_type_id' => 'required',
    ];

    public $timestamps = false;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organization_id','status_id','document_type_id'];



}
