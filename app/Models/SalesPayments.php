<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesPayments extends Model
{
    use HasFactory;
    protected $fillable = ['sales_transactions_id','customer_id','employee_id','reference','payment_account','payment_method','amount',
        'outstanding_balance','date','description','remarks','status'
    ];
}
