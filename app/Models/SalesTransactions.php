<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesTransactions extends Model
{
    use HasFactory;
    protected $fillable = ['branch_id','employee_id','customer_id','type','invoice_type','tax_type','total_qty','subtotal','total_tax_value','discount','total',
        'remarks','description','status'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id','id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function payments()
    {
        return $this->hasMany(SalesPayments::class,'sales_transactions_id','id');
    }
    public function items()
    {
        return $this->hasMany(SalesTransactionDetails::class,'sales_transactions_id','id')->with('product');
    }
}
