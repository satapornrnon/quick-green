<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'backoffice/dashboard/get_data',
        'backoffice/interested/get_data',
        'backoffice/interested/save',
        'backoffice/interested/get_detail',
        'backoffice/product/get_data',
        'backoffice/roles/get_data',
        'backoffice/user/get_data',
        // เพิ่มตามชื่อ route ของคุณ
    ];
}
