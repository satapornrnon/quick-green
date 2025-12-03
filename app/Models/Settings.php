<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Settings extends Model
{
    use HasFactory;

    protected $table = 'tbl_setting';

    protected $fillable = [
        'setting_name', 
        'setting_value', 
        'type', 
        'deleted'
    ];

    // ตั้งค่าเริ่มต้นให้ฟิลด์ที่ไม่ได้ส่งเข้าไปเวลา updateOrCreate
    protected $attributes = [
        'type' => 'app',
        'deleted' => 0,
    ];

    // ดึงค่าพร้อม cache
    public static function get($name, $default = null)
    {
        return Cache::rememberForever("setting_{$name}", function () use ($name, $default) {
            $setting = self::where('setting_name', $name)->first();
            return $setting ? $setting->setting_value : $default;
        });
    }

    // เซตค่า + อัปเดต cache
    public static function set($name, $value)
    {
        Cache::forget("setting_{$name}");

        return self::updateOrCreate(
            ['setting_name' => $name],
            [
                'setting_value' => $value,
                'type' => 'app',     // ถ้ามีหลายประเภท คุณเปลี่ยนตรงนี้ได้
                'deleted' => 0
            ]
        );
    }
}
