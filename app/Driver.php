<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    //
    protected $fillable = [
        'name',
        'rf_id',
        'father_name',
        'present_address',
        'permanent_address',
        'birth_registration_id',
        'birth_date',
        'national_id',
        'nationality',
        'religion',
        'education',
        'phone_number',
        'blood_group',
        'image',
        'license_no',
        'license_category',
        'vehicle_type',
        'identifier_info',
        'validity_date',
        'print_status',
        'user_id',
    ];
}
