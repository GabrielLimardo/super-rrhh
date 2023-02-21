<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseType extends Model
{
    use HasFactory;

    protected $fillable = ['name','has_photo','max_users_per_week'];

    public $timestamps = false;

    public function licenseFlows()
    {
        // return $this->hasMany(LicenseFlow::class);
        return $this->belongsToMany(LicenseFlow::class, 'license_flows', 'license_type_id', 'state_id');
    }
}