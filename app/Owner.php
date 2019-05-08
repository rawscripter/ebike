<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Owner extends Model implements Auditable
{
      use \OwenIt\Auditing\Auditable;
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
        'vehicle_no',
        'vehicle_type',
        'identifier_info',
        'validity_date',
        'print_status',
        'print_count',
        'print_date',
        'user_id',
    ];

//  en2bn() is a custom function. It's in App/Helpers/Functions.php file.
//  en2bn() function convert all english number to bangla number
//  converting english to bangle

//  applying setters to convert english to bangla before inserting into database
    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = en2bn($value);
    }
    public function setPhoneNumberAttribute($value)
    {
        $this->attributes['phone_number'] = en2bn($value);
    }

    public function setNationalIdAttribute($value)
    {
        $this->attributes['national_id'] = en2bn($value);
    }

    public function setVehicleNoAttribute($value)
    {
        $this->attributes['vehicle_no'] = en2bn($value);
    }

    public function setBirthRegistrationIdAttribute($value)
    {
        $this->attributes['birth_registration_id'] = en2bn($value);
    }
    public function getImageAttribute($value)
        {
            if ($value == null){
                $value = 'https://dummyimage.com/200x200/bfbfbf/000000&text=Owner+Image';
            }else{
                $value = '/images/owner/' . $value;
            }
            return $value ;
        }

//    end of en2bn() setters function


}
