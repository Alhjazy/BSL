<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseSettings extends Model
{
    use HasFactory;
    protected $fillable = ['type','prefix_order','sequence_number','print_order_header','print_order_footer','remarks','description','status'];
}
