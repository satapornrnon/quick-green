<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tbl_product';

    protected $fillable = [
        'product_code',
        'product_name',
        'product_description',
        'product_page',
        'product_status',
        'product_image',
        'product_cover',
        'created_at', 
        'created_by', 
        'updated_at', 
        'updated_by', 
        'deleted'
    ];
}
