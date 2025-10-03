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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->product_code)) {
                $model->product_code = gen_product_code(); // เรียกจาก Helper
            }
        });
    }
}
