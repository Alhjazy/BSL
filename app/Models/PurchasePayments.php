<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasePayments extends Model
{
    use HasFactory;
    protected $fillable = ['purchase_transactions_id','supplier_id','employee_id','reference','payment_account','payment_method','amount',
                        'outstanding_balance','date','description','remarks','status'
        ];
}
