<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeesRole extends Model
{
    use HasFactory;
    protected $table  = 'employee_role';
    protected $fillable = ['title','position','description','status'];
}
