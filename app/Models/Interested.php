<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interested extends Model
{
    use HasFactory;

    protected $table = 'tbl_interested';

    protected $fillable = [
        'product_id', 
        'interested_date', 
        'interested_time', 
        'interested_code', 
        'interested_status', 
        'first_name', 
        'last_name', 
        'mobile', 
        'time_callback', 
        'more_information', 
        'accept_policy', 
        'created_at', 
        'updated_at', 
        'created_by', 
        'updated_by', 
        'deleted'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->interested_code)) {
                $model->interested_code = gen_loan_code(); // เรียกจาก Helper
            }
        });
    }
}
