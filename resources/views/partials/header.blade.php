<?php
$sidebar_menu = array();

$sidebar_menu[] = array("name" => "หน้าแรก", "source" => "homepage_controller", "url" => route('homepage'));

$product_dropdown_menu = array(
    array("name" => "แผงโซลาร์เซลล์ (Solar Panel)", "source" => "product_controller", "url" => route('solar')),
    array("name" => "อินเวอร์เตอร์ (Inverter)", "source" => "product_controller", "url" => route('inverter')),
    array("name" => "เซ็นเซอร์ (Sensor)", "source" => "product_controller", "url" => route('sensor')),
);
$sidebar_menu[] = array("name" => "ผลิตภัณฑ์", "source" => "product_controller", "url" => "", "dropdown_menu" => $product_dropdown_menu);

$sidebar_menu[] = array("name" => "ผลงานของเรา", "source" => "our_work_controller", "url" => route('our_work'));
$sidebar_menu[] = array("name" => "ติดต่อเรา", "source" => "contact_us_controller", "url" => route('contact_us'));
?>

<header class="header-area sticky-top">
    <div class="topbar-area">
        <div class="container">
            <div class="contact-info">
                <a href="mailto:quickgreen@quickgreen.co.th"><i class="fas fa-envelope"></i> quickgreen@quickgreen.co.th</a>
                <a href="tel:099-999-9999"><i class="fa-solid fa-phone-volume"></i> 099-999-9999</a>
            </div>
        </div>
    </div>

    <div class="mainmenu-area">
        <div class="container">
            <div class="mainmenu">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('uploads/system/logo.webp') }}" alt="Quick Green Logo" class="img-fluid">
                    </a>
                </div>

                <nav id="navbar-menu" class="navbar-menu">
                    <ul>
                        @foreach ($sidebar_menu as $main_menu)
                            @php
                                $dropdown_menu = get_array_value($main_menu, "dropdown_menu");
                                $active_class = active_menu($main_menu['source'], $dropdown_menu);
                            @endphp

                            @if(!$dropdown_menu)
                                <li>
                                    <a href="{{ $main_menu['url'] }}" class="nav-link {{ $active_class }}">{{ $main_menu['name'] }}</a>
                                </li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="nav-link {{ $active_class }}"><span>{{ $main_menu['name'] }}</span> <i class="fa-solid fa-angle-down toggle-dropdown"></i></a>
                                    <ul>
                                        @foreach ($main_menu['dropdown_menu'] as $sub_menu)
                                            <li><a href="{{ $sub_menu['url'] }}">{{ $sub_menu['name'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                        <!-- <li>
                            <a href="{{ route('homepage') }}" class="nav-link active">หน้าแรก</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link" ><span>ผลิตภัณฑ์</span> <i class="fa-solid fa-angle-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="{{ route('solar') }}">แผงโซลาร์เซลล์ (Solar Panel)</a></li>
                                <li><a href="{{ route('inverter') }}">อินเวอร์เตอร์ (Inverter)</a></li>
                                <li><a href="{{ route('sensor') }}">เซ็นเซอร์ (Sensor)</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('our_work') }}" class="nav-link">ผลงานของเรา</a>
                        </li>
                        <li>
                            <a href="{{ route('contact_us') }}" class="nav-link">ติดต่อเรา</a>
                        </li> -->
                    </ul>
                    <i class="mobile-nav-toggle fa-solid fa-bars"></i>
                </nav>
                <div class="contact-info text-end">
                    <a href="tel:099-999-9999"><i class="fa-solid fa-phone-volume"></i> โทรเลย</a>
                </div>
            </div>
        </div>
    </div>
</header>