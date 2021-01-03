<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDocuments extends Model
{
    use HasFactory;
    protected $fillable = ['purchase_transactions_id','employee_id','type','name','file','remarks','description','status'];
}
