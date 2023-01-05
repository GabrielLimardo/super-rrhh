<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $table = 'managements';
    
    protected $primaryKey= 'id';

    protected $fillable = [
        'id',
        'name',
        'branch_id',
        'code',
    ];
}
