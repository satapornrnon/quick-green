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

    function active_menu($routeNames = [], $dropdown_menu, $class = 'active') {

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

    function active_menu_backoffice($routeNames = [], $dropdown_menu, $class = 'active') {

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
    function gen_interested_code() {




        echo 'A1';
        
        $ci = app();
        $ci->load->model('interested'); 

        $sql = "SELECT MAX( SUBSTRING( interested_code, 9 ) ) AS interested_code FROM tbl_interested WHERE created_at LIKE '". date('Y') ."%' ORDER BY id DESC";
        $interested = $ci->interested_model->get_interested($sql);  

        print_r($interested);


        // $sql = "SELECT MAX( SUBSTRING( loan_code, 9 ) ) AS loan_code FROM tbl_loan WHERE created_at LIKE '". date('Y') ."%' ORDER BY id DESC";
        // $loan = $ci->loan_model->get_loan($sql);

        // if($loan[0]['loan_code'] == ''){
        //     $loan_no = '00000';
        // } else {
        //     $loan_no = $loan[0]['loan_code'];
        // }

        // $loan_head = 'LOAN'.date("ym");
        // $data = $loan_head.substr("00000".($loan_no+1), -5); 

        // return $data;
    }
}


/**
 * Generate a unique product code
 * 
 * @return string unique product code
 */
if (!function_exists('gen_product_code')) {
    function gen_product_code() {
        $prefix = 'PRD';
        $unique_id = strtoupper(uniqid());
        return $prefix . $unique_id;
    }
}

?>