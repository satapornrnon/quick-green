<?php
$sidebar_menu = array();

$general_menu[] = array("name" => "แดชบอร์ด", "source" => "dashboard_controller", "class" => "fa-solid fa-house", "url" => route('dashboard'));

if(get_check_roles('can_view_interested') == 1){
    $report_dropdown_menu = array(
        array("name" => "รายงานลงทะเบียน (ทั้งหมด)", "source" => "interested_controller", "url" => route('interested')),
    );
    $general_menu[] = array("name" => "รายงานลงทะเบียน", "source" => "interested_controller", "class" => "fa-solid fa-book-open", "url" => "", "dropdown_menu" => $report_dropdown_menu);
}

if(get_check_roles('can_view_product') == 1){
    $general_menu[] = array("name" => "ผลิตภัณฑ์", "source" => "product_controller", "class" => "fa-brands fa-product-hunt", "url" => route('product'));
}

$sidebar_menu[] = array("name" => 'general', "subject_menu" => $general_menu);

if(get_check_roles('can_view_roles') == 1){
    $setting_menu[] = array("name" => "สิทธิการใช้งาน", "source" => "roles_controller", "class" => "fa-solid fa-user-tag", "url" => route('roles'));
}

if(get_check_roles('can_view_user') == 1){
    $setting_menu[] = array("name" => "ผู้ใช้งานระบบ", "source" => "user_controller", "class" => "fa-solid fa-users", "url" => route('user'));
}

if(get_check_roles('can_view_setting') == 1){
    $setting_menu[] = array("name" => "ตั้งค่าระบบ", "source" => "settings_controller", "class" => "fa-solid fa-gears", "url" => route('settings'));
}

$sidebar_menu[] = array("name" => 'settings', "subject_menu" => $setting_menu);
?>

<aside class="page-sidebar">
    <div class="overflow-x-clip">
        <header class="page-header">
            <div class="logo">
                <a href="#" class="logo-link">
                    <h3><span class="text-blue">QUICK</span> <span class="text-green">GREEN</span></h3>
                </a>
            </div>
            <button class="btn btn-close-nav" type="button" aria-label="Close" onclick="document.querySelector('.page-sidebar').classList.toggle('sidebar-closed')">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </header>
    </div>

    <nav class="page-sidebar-nav">
        <div class="main-navbar custom-scrollbar">
            <ul class="sidebar-nav-groups">
                @foreach ($sidebar_menu as $main_menu)
                    @php
                        $subject_menu = get_array_value($main_menu, "subject_menu");
                    @endphp
                    
                    @if(!empty($main_menu['name']))
                        <li class="sidebar-main-title">
                            <div>
                                <h6>{{ $main_menu['name'] }}</h6>
                            </div>
                        </li>
                    @endif

                    @foreach ($main_menu['subject_menu'] as $subject_menu)
                        @php
                            $dropdown_menu = get_array_value($subject_menu, "dropdown_menu");
                            $active_class = active_menu_backoffice($subject_menu['source'], $dropdown_menu);
                            $expend_class = $dropdown_menu ? " expand " : "";
                            $sidebar_show_class = ($expend_class && $active_class) ? "show" : "";
                            $sidebar_css_class = ($expend_class && $active_class) ? "display: block;" : "";
                        @endphp

                        @if(!$dropdown_menu)
                            <li class="sidebar-item">
                                <a class="sidebar-item-link {{ $active_class }}" href="{{ $subject_menu['url'] }}">
                                    <i class="sidebar-item-icon {{ $subject_menu['class'] }}"></i>
                                    <span>{{ $subject_menu['name'] }}</span>
                                </a>
                            </li>
                        @else
                            <li class="sidebar-item sidebar-item-open">
                                <a class="sidebar-item-link sidebar-item-title {{ $active_class }} {{ $sidebar_show_class }}" href="#">
                                    <i class="{{ $subject_menu['class'] }}"></i>
                                    <span>{{ $subject_menu['name'] }}</span>
                                </a>
                                <ul class="nav-submenu sidebar-item-content" style="{{ $sidebar_css_class }}">
                                    @foreach ($dropdown_menu as $sub_menu)
                                        <li>
                                            <a href="{{ $sub_menu['url'] }}">{{ $sub_menu['name'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                @endforeach
            </ul>
        </div>
    </nav>
</aside>