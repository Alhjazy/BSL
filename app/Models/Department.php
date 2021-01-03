<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name','parent_id','description','address','status'];


    public function parents (){
        return $this->hasOne(Department::class,'id','parent_id');
    }
}
