<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'identification_nro',
        'fantasy_name',
        'legal_name',
        'code',
        'status',
        'organization_id'

    ];

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class);
    }
}
