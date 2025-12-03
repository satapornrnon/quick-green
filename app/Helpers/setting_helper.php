<?php

use App\Models\Roles;
use App\Models\User;
use App\Models\Settings;

if (!function_exists('get_settings')) {
    function get_settings($key, $default = null)
    {
        return Settings::get($key, $default);
    }
}

if (!function_exists('get_check_roles')) {
    function get_check_roles($key)
    {
        $data = Roles::get(session('roles_id'));
        return $data[$key];
    }
}

if ( ! function_exists('authenticate_check_backoffice')){
    function authenticate_check_backoffice(){
        if($session('is_logged_in') == true){
            return true;
        } else {
            return false;
        }
    }
}

?>