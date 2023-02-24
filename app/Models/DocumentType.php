<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DocumentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class DocumentType extends Model
{
    use HasFactory;
    static $rules = [
    ];

    protected $perPage = 20;

    protected $fillable = ['organization_id','name','period','sign_first_rol_id','code','status','masive','employee_see','regex','c_up_left_x','c_up_left_y','c_down_right_x','c_down_right_y','sign_father_x','sign_father_y','sign_father_high','sign_father_wide','sign_son_x','sign_son_y','sign_son_high','sign_son_wide'];

    public function DocumentStatus()
    {
        return $this->belongsToMany(DocumentStatus::class, 'document_x_status', 'document_type_id', 'status_id');
        
    }

}
