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
                        <li>
                            <a href="{{ route('homepage') }}" class="nav-link">หน้าแรก</a>
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
                        </li>
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