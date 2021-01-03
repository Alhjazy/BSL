<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = ['flaying_tickets','basic','employee_id','gas','transport','housing','mobile','other_benefits','description','status'];
}
