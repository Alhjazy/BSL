<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['category_id','name','ar_name','barcode','sku','price','tax_type','tax_percentage','type','unit_type',
                           'specification','description','status'
    ];


    public function product_images()
    {
        return $this->hasMany(ProductImages::class,'product_id','id');
    }
    public function category(){
        return $this->belongsTo(ProductCategory::class,'category_id','id');
    }
}
