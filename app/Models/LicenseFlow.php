<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseFlow extends Model
{
    use HasFactory;

    protected $fillable = ['license_type_id','state_id','order'];

    public $timestamps = false;

    public function licenseType()
    {
        return $this->belongsTo(LicenseType::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}