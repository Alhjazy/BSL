<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesTransactionDetails extends Model
{
    use HasFactory;
    protected $fillable = ['sales_transactions_id','product_id','customer_id','employee_id','qty','price','subtotal','tax_value','discount_value','total',
        'remarks','status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
