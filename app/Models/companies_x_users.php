<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies_x_users extends Model
{
    protected $table = 'companies_x_users';
    
    protected $primaryKey= 'id';
    
    public $timestamps = false;


    protected $fillable = [
        'id',
        'company_id',
        'user_id',
    ];
}
