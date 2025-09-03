<?php

/**
 * Format currency
 * 
 * @param float $amount
 * @return string formatted currency
 */
if (!function_exists('echo_uri')) {
    function echo_uri($uri = "") {
        echo get_uri($uri);
    }
}

/**
 * Get URI
 * 
 * @param string $uri
 * @return string full URL
 */
if (!function_exists('get_uri')) {
    function get_uri($uri = "") {
        return url($uri);
    }
}

/**
 * Get base URL
 * 
 * @param string $uri
 * @return string full base URL
 */ 
if (!function_exists('base_url')) {
    function base_url($uri = "") {
        return url($uri);
    }
}

/**
 * link the css files 
 * 
 * @param array $array
 * @return print css links
 */
if (!function_exists('load_css')) {

    function load_css(array $array) {
        // $version = get_setting("app_version");
        $version = date("s");

        foreach ($array as $uri) {
            echo '<link rel="stylesheet" type="text/css" href="' . $uri . '?v=' . $version . '">';
        }
    }

}

/**
 * link the javascript files 
 * 
 * @param array $array
 * @return print js links
 */
if (!function_exists('load_js')) {

    function load_js(array $array) {
        // $version = get_setting("app_version");
        $version = date("s");

        foreach ($array as $uri) {
            echo '<script type="text/javascript" src="' . $uri . '?v=' . $version . '"></script>';
        }
    }

}

/**
 * check the array key and return the value 
 * 
 * @param array $array
 * @return extract array value safely
 */
if (!function_exists('get_array_value')) {

    function get_array_value(array $array, $key) {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }
    }

}

/**
 * get the selected menu 
 * 
 * @param string $url
 * @param array $submenu
 * @return string "active" indecating the active page
 */
if (! function_exists('active_menu')) {

    function active_menu($routeNames = [], $class = 'active') {
        if (in_array(request()->route()->getName(), (array) $routeNames)) {
            return $class;
        }
        return '';
    }
    
}
?>