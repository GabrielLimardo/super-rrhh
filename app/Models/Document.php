<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    
    static $rules = [
		'file_path' => 'required',
		'document_type_id' => 'required',
		'state_id' => 'required',
		'user_id' => 'required',
		'document_pack_id' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['file_path','document_type_id','state_id','user_id','dissatisfied_text','extra_filter','employers_sees','publication_date','period','document_pack_id'];



}
