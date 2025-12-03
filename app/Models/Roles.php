<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'tbl_roles';

    protected $fillable = [
        'roles_name',
        'roles_permissions',
        'created_at', 
        'created_by', 
        'updated_at', 
        'updated_by', 
        'deleted'
    ];

    // ดึงค่าพร้อม cache
    public static function get($roles_id)
    {
        return json_decode(Roles::where('id', $roles_id)->first()->roles_permissions, true);
    }
}
