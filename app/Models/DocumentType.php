<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    protected $fillable = ['organization_id','name','period','sign_first_rol_id','code','status','masive','employee_see','regex','c_up_left_x','c_up_left_y','c_down_right_x','c_down_right_y','sign_father_x','sign_father_y','sign_father_high','sign_father_wide','sign_son_x','sign_son_y','sign_son_high','sign_son_wide'];



}
