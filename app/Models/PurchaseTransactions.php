<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseTransactions extends Model
{
    use HasFactory;

    protected $fillable = ['branch_id','employee_id','supplier_id','type','tax_type','total_qty','subtotal','total_tax_value','discount','total',
                        'remarks','description','status'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id','id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
    public function payments()
    {
        return $this->hasMany(PurchasePayments::class,'purchase_transactions_id','id');
    }
    public function documents()
    {
        return $this->hasMany(PurchaseDocuments::class,'purchase_transactions_id','id');
    }
    public function items()
    {
        return $this->hasMany(PurchaseTransactionDetails::class,'purchase_transactions_id','id')->with('product');
    }
}
