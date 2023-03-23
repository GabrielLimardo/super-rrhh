<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    
    static $rules = [
		'name' => 'required',
        'email' => 'required',
        'password' => 'required',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'document_type',
        'document_nro',
        'identification_doc',
        'terms_agreements',
        'labor_profile',
        'organization_id',
        'company_id',
        'branch_id',
        'management_id',
        'status',
        'admission_date',
        'egress_date',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function paymentHistories()
    {
        return $this->hasMany(PaymentHistory::class);
    }
}
