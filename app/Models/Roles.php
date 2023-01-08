<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    
    protected $primaryKey= 'id';

    protected $fillable = [
        'id',
        'name',
        'guard_name',
        'organization_id'
    ];
}
