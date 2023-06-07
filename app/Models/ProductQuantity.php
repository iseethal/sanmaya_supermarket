<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQuantity extends Model
{
    use HasFactory;
    protected $table = 'product_quantity';
    protected $guarded = [];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class,'id','product_id');
    }
}
