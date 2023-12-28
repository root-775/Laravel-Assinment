<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;

class Product extends BaseModel
{
    use HasFactory;


    protected $fillable = [
        'product_name',
        'product_slug',
        'product_brand',
        'product_price',
        'product_sale_price',
        'product_sku',
        'product_image_url',
        'product_short_description',
        'product_long_description',
        'status',
    ];
}
