<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseDaysUser extends Model
{
    use HasFactory;

    protected $fillable = ['user_id ','license_type_id ','available','used'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function licenseType()
    {
        return $this->belongsTo(LicenseType::class);
    }
}