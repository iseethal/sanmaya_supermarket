<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $guarded = ['user_id','product_id','category_id','quant_id','product_name','amount','qty_name','quantity','total_amount','qty_id'];

    public $timestamps = false;   

}
