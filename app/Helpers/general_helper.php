<?php
/**
 * echo array 
 * 
 * @param array $array
 * @return print css links
 */
if (!function_exists('echo_print')) {

    function echo_print($data) 
    {
        echo '<pre>'; print_r($data); echo '</pre>';
    }

}

/**
 * Format currency
 * 
 * @param float $amount
 * @return string formatted currency
 */
if (!function_exists('echo_uri')) {

    function echo_uri($uri = "") 
    {
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

    function get_uri($uri = "") 
    {
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

    function base_url($uri = "") 
    {
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

    function load_css(array $array) 
    {
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

    function load_js(array $array) 
    {
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

    function get_array_value(array $array, $key) 
    {
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

    function active_menu($routeNames = [], $dropdown_menu, $class = 'active') 
    {

        $controller = strtolower(class_basename(Route::current()->controller));

        if($routeNames == $controller) {
            return $class;
        } else if ($dropdown_menu && count($dropdown_menu)) {
            foreach ($dropdown_menu as $key => $dropdown) {
                if (get_array_value($dropdown, "source") === $controller) {
                    return "active";
                }
            }
        }
        return '';
    }
    
}

if (! function_exists('active_menu_backoffice')) {

    function active_menu_backoffice($routeNames = [], $dropdown_menu, $class = 'active') 
    {

        $controller = strtolower(class_basename(Route::current()->controller));

        if($routeNames == $controller) {
            return $class;
        } else if ($dropdown_menu && count($dropdown_menu)) {
            foreach ($dropdown_menu as $key => $dropdown) {
                if (get_array_value($dropdown, "source") === $controller) {
                    return "active";
                }
            }
        }
        return '';
    }
    
}

/**
 * Generate a unique interested code
 * 
 * @return string unique interested code
 */
if (!function_exists('gen_interested_code')) {

    function gen_interested_code() 
    {
        $result = DB::table('tbl_interested')->select('interested_code')->orderBy('interested_code', 'DESC')->limit(1)->lockForUpdate()->get();
        if($result->count() > 0){
            foreach ($result as $key => $value) {
                $last_running = (int) substr($value->interested_code, -5);
            }
        } else {
            $last_running = 0;
        }

        $prefix = 'INT'. date("ym");
        $new_running = $last_running + 1;
        $new_interested_code = $prefix . str_pad($new_running, 5, '0', STR_PAD_LEFT);

        return $new_interested_code;
    }

}

/**
 * Generate a unique product code
 * 
 * @return string unique product code
 */
if (!function_exists('gen_product_code')) {

    function gen_product_code() 
    {
        $result = DB::table('tbl_product')->select('product_code')->orderBy('product_code', 'DESC')->limit(1)->lockForUpdate()->get();
        if($result->count() > 0){
            foreach ($result as $key => $value) {
                $last_running = (int) substr($value->product_code, -3);
            }
        } else {
            $last_running = 0;
        }

        $prefix = 'PRD';
        $new_running = $last_running + 1;
        $new_product_code = $prefix . str_pad($new_running, 3, '0', STR_PAD_LEFT);

        return $new_product_code;
    }

}

// ------------------------------------------------------------------------
if (!function_exists('mobile_format')) {

    function mobile_format($number) {
        $number = preg_replace("/[^\d]/","",$number);
        $length = strlen($number);
        if($length == 10) {
            $number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $number);
        } else if($length == 9) {
            $number = preg_replace("/^1?(\d{2})(\d{3})(\d{4})$/", "$1-$2-$3", $number);
        }
        return $number;
    }
}

// ------------------------------------------------------------------------
if ( ! function_exists('get_interested_label')){

    function get_interested_label($interested_status)
    {        
        if($interested_status == 'pending'){
            $data = "<span class='badge bg-warning'>รอดำเนินการ</span>";
        } else if($interested_status == 'in_progress'){
            $data = "<span class='badge bg-primary'>กำลังดำเนินการ</span>";
        } else if($interested_status == 'completed'){
            $data = "<span class='badge bg-success'>เสร็จสิ้น</span>";
        } else if($interested_status == 'cancelled'){
            $data = "<span class='badge bg-danger'>ยกเลิก</span>";
        }

        return $data;
    }

}

// ------------------------------------------------------------------------
if ( ! function_exists('get_user_status_label')){

    function get_user_status_label($user_status)
    {        
        if($user_status == 'active'){
            $data = "<span class='badge bg-success'>กำลังทำงาน</span>";
        } else if($user_status == 'inactive'){
            $data = "<span class='badge bg-danger'>ยกเลิกการทำงาน</span>";
        }

        return $data;
    }

}

// ------------------------------------------------------------------------
if ( ! function_exists('renderButton')){
    function render_button($type, $class, $id, $title, $icon, $status = null)
    {
        $statusAttr = $status ? ' data-post-status="' . $status . '"' : '';
        $button = '<button type="button" class="btn btn-sm btn-outline-' . $type . ' mx-1 ' . $class . '" data-post-id="' . $id . '"' . $statusAttr . ' title="' . $title . '" data-title="' . $title . '"><i class="' . $icon . '"></i></button>';

        return $button;
    }
}
?>