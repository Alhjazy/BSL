<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name','status','department_id','role_id','ar_name','username','email','phone_number','password','profile_image',
    'personal_image','id_number','id_copy_number','id_release_date','id_expiration_date','id_type','nationality','religion',
    'passport_number','passport_visa_number',
    'passport_release_date','passport_expiration_date','business_license_number','business_license_release_date',
    'business_license_expiration_date','bank_account_name','bank_account_number','bank_account_iban','join_at','last_day_at',
    'id_file','passport_file','contract_file','bank_file','contract_no','contract_validation_date','contract_release_date','contract_expiration_date',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function department(){
        return $this->hasOne(Department::class,'id','department_id');
    }
    public function role(){
        return $this->hasOne(EmployeesRole::class,'id','role_id');
    }
}
