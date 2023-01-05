<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';
    
    protected $primaryKey= 'id';

    protected $fillable = [
        'id',
        'name',
        'company_id',
        'code',
    ];
}
