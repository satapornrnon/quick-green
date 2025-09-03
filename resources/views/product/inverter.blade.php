@extends('layouts.app')

@section('title', 'Quick Green - อินเวอร์เตอร์ (Inverter)')

@section('content')
    
    <section class="cover-area" style="background: url(<?php echo base_url('images/cover-solar.png'); ?>) no-repeat center center/cover;">
        <div class="overlay cover-absolute"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb">
                        <ul class="breadcrumb-card">
                            <li class="breadcrumb-item">หน้าแรก</li>
                            <li class="breadcrumb-item">ผลิตภัณฑ์</li>
                            <li class="breadcrumb-item">อินเวอร์เตอร์ (Inverter)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="cover-content">
                <div class="title">
                    <h1>อินเวอร์เตอร์ (Inverter)</h1>
                </div>
                <div class="content">
                    <p>Quick Green – ผู้เชี่ยวชาญด้านการขายและติดตั้งโซลาร์เซลล์ครบวงจร</p>
                </div>
            </div>
        </div>
    </section>

    <section class="interested-area bar">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title section-bg-blue">
                        <h3>อินเวอร์เตอร์<span class="text-green"> (Inverter)</span></h3>
                    </div>
                    <div class="section-detail">
                        <span>อินเวอร์เตอร์ (Inverter) คือหัวใจหลักของระบบโซลาร์เซลล์ ทำหน้าที่แปลงพลังงานไฟฟ้ากระแสตรง (DC) จากแผงโซลาร์ ให้กลายเป็นไฟฟ้ากระแสสลับ (AC) ที่ใช้งานได้จริงในบ้านและธุรกิจ อินเวอร์เตอร์คุณภาพสูงช่วยให้ระบบทำงานได้อย่างเสถียร ประหยัดพลังงาน และปลอดภัย พร้อมทั้งรองรับการตรวจสอบการทำงานผ่านแอปพลิเคชัน ช่วยให้ผู้ใช้งานมั่นใจได้ว่าโซลาร์เซลล์สามารถผลิตพลังงานได้เต็มประสิทธิภาพตลอดเวลา</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="interested-list-area bar">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title section-bg-blue">
                        <h3><span class="text-green">ทำไมต้องเลือก</span> Quick green</h3>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 mb-30">
                    <div class="interested-box">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                                <div class="interested-list-card">
                                    <div class="interested-list-images">
                                        <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="interested-list-content">
                                        <div class="header">
                                            <h5>ใส่ใจในรายละเอียด</h5>
                                        </div>
                                        <div class="content">
                                            <p class="text">แน่นนอนบ้านคุณคือที่ทำงานของเรา เราจึงให้ความสำคัญกับรายละเอียดเล็กๆน้อยๆ ความสวยงาม ดูเป็นระเบียบเรียบร้อยทุกงานติดตั้ง</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                                <div class="interested-list-card">
                                    <div class="interested-list-images">
                                        <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="interested-list-content">
                                        <div class="header">
                                            <h5>ความปลอดภัยอันดับ 1</h5>
                                        </div>
                                        <div class="content">
                                            <p class="text">เราเลือกอุปกรณ์และวัสดุโดยยึดตามความปลอดภัยที่เป็นอันดับ 1 เสมอ เราไม่แข่งขันในราคาที่ต้องลดความน่าเชื่อถือหรือคุณภาพของอุปกรณ์ลง</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                                <div class="interested-list-card">
                                    <div class="interested-list-images">
                                        <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="interested-list-content">
                                        <div class="header">
                                            <h5>อุปกรณ์มาตรฐาน</h5>
                                        </div>
                                        <div class="content">
                                            <p class="text">เรา Quick green เลือกใช้อุปกรณ์มาตรฐานสากลและตามระเบียบข้อบังคับของการไฟฟ้าทุกชิ้นเพื่อความปลอดภัยและคุ้มค่าสำหรับคุณ</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                                <div class="interested-list-card">
                                    <div class="interested-list-images">
                                        <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="interested-list-content">
                                        <div class="header">
                                            <h5>รับประกันหลังการขาย</h5>
                                        </div>
                                        <div class="content">
                                            <p class="text">เราพร้อมรับประกันหลังการขายดูแลกันยาวๆต่อจากนี้อีก 25 ปีจะดีกว่าไหมถ้าบ้านคุณมีทีมช่างที่เชื่อถือได้ที่พร้อมดูแลคุณต่อจากนี้</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
            
    <section class="interested-form-area bg-blue-45 bar">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 mb-15 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    @include('product.modal_form')
                </div>
                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12">
                    <div class="interested-form-menu wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <a href="#" target="_blank">
                            <div class="wrpper-center">
                                <div class="images">
                                    <img src="{{ asset('uploads/system/icon-our-work.png') }}" class="img-fluid" alt="">
                                </div>
                                <div class="content">
                                    <span>ผลงานของเรา</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="interested-form-menu wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <a href="#" target="_blank">
                            <div class="wrpper-center">
                                <div class="images">
                                    <img src="{{ asset('uploads/system/icon-contact-us.png') }}" class="img-fluid" alt="">
                                </div>
                                <div class="content">
                                    <span>ติดต่อเรา</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="interested-detail-area bar">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-30 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="interested-detail-card">
                        <img src="{{ asset('uploads/product/product-invertor.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="interested-detail-card">
                        <div class="header">
                            <h3>Huawei FusionSolar <span class="text-green">SUN2000-5~12K-MAP0</span></h3>
                        </div>
                        <div class="content">
                            <span>อินเวอร์เตอร์ไฮบริดรุ่นใหม่ รองรับทั้ง PV และแบตเตอรี่ LUNA2000 อัจฉริยะ ปลอดภัย ประสิทธิภาพสูงสุด 98.6% พร้อมโหมดสำรองไฟบ้านเต็มรูปแบบ</span>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-10">
                                <div class="detail">
                                    <h5 class="text-blue">98.6%</h5>
                                    <span>ประสิทธิภาพสูงสุด</span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-10">
                                <div class="detail">
                                    <h5 class="text-blue">12kW</h5>
                                    <span>กำลังสูงสุด</span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-10">
                                <div class="detail">
                                    <h5 class="text-blue">200%</h5>
                                    <span>Overload Capacity</span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-10">
                                <div class="detail">
                                    <h5 class="text-blue">20ms</h5>
                                    <span>Switchover Time</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="interested-information-area bar">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title section-bg-blue">
                        <h3><span class="text-green">จุดเด่น</span> ที่แตกต่าง</h3>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="interested-information-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-solar-cell-7.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>Active Safety</h5>
                        </div>
                        <div class="content">
                            <span>ระบบป้องกันขั้นสูง AFCI & RSD พร้อม Optimizer และตรวจสอบอุณหภูมิ Connector แบบอัตโนมัติ</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="interested-information-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-solar-cell-8.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>Asymmetric Load</h5>
                        </div>
                        <div class="content">
                            <span>รองรับโหลดไม่สมดุล 3 เฟส 100% และสามารถทำงานใน Overload ได้ถึง 200%</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                    <div class="interested-information-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-solar-cell-9.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>Future Ready</h5>
                        </div>
                        <div class="content">
                            <span>เตรียมพร้อมสำหรับอนาคต รองรับ LUNA S0/S1 และ Whole Home Backup พร้อม SmartGuard</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="interested-information-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-solar-cell-10.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>Hybrid Operation</h5>
                        </div>
                        <div class="content">
                            <span>ทำงานได้ทั้งแบบ On-Grid และ Off-Grid พร้อมระบบ Automatic Switchover ภายใน 20ms</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                    <div class="interested-information-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-solar-cell-11.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>Smart Monitoring</h5>
                        </div>
                        <div class="content">
                            <span>ติดตามผ่าน FusionSolar APP พร้อมการเชื่อมต่อ Wi-Fi, 4G และ Ethernet</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                    <div class="interested-information-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-solar-cell-12.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>All-Weather Design</h5>
                        </div>
                        <div class="content">
                            <span>ทนทานในทุกสภาพอากาศ -25°C ถึง +60°C พร้อม IP66 Protection และเสียงเงียบ ≤29dB</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="interested-spec-area bar">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title section-bg-blue">
                        <h3><span class="text-green">สเปก</span> ทางเทคนิค</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="interested-spec-card">
                        <div class="header">
                            <h5>ข้อมูลทั่วไป</h5>
                        </div>
                        <div class="content">
                            <div class="spec-card">
                                <div class="spec-detail">
                                    <h6>รุ่น</h6>
                                    <span>SUN2000-5/6/8/10/12K-MAP0</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>กำลังไฟเอาต์พุต</h6>
                                    <span>5–12 kW</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>แรงดันเอาต์พุต</h6>
                                    <span>220/380–240/415 V AC, 3W+N+PE</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>เฟส</h6>
                                    <span>สามเฟส</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>ขนาด</h6>
                                    <span>490 × 460 × 130 มม.</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>น้ำหนัก</h6>
                                    <span>21 กก.</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>IP Rating</h6>
                                    <span>IP66</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>อุณหภูมิทำงาน</h6>
                                    <span>–25°C ถึง +60°C</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>การระบายความร้อน</h6>
                                    <span>Natural Convection</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>การสื่อสาร</h6>
                                    <span>RS485, WLAN/Ethernet (Smart Dongle), 4G (Optional)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="interested-parameter-card">
                        <div class="header">
                            <h5>พารามิเตอร์ไฟฟ้า (STC)</h5>
                        </div>
                        <div class="content">
                            <div class="parameter-card">
                                <h6 class="text-center">หัวข้อ</h6>
                                <h6 class="text-center">รายละเอียด</h6>
                            </div>
                            <div class="parameter-card">
                                <label>ประสิทธิภาพสูงสุด</label>
                                <span>98.4–98.6%</span>
                            </div>
                            <div class="parameter-card">
                                <label>ประสิทธิภาพ EU</label>
                                <span>97.5–98.2%</span>
                            </div>
                            <div class="parameter-card">
                                <label>แรงดันอินพุตสูงสุด</label>
                                <span>1,100 V</span>
                            </div>
                            <div class="parameter-card">
                                <label>แรงดันเริ่มทำงาน</label>
                                <span>160 V</span>
                            </div>
                            <div class="parameter-card">
                                <label>แรงดันอินพุตที่กำหนด</label>
                                <span>600 V</span>
                            </div>
                            <div class="parameter-card">
                                <label>MPPT</label>
                                <span>2 trackers, 16 A/MPPT</span>
                            </div>
                            <div class="parameter-card">
                                <label>กระแสสั้นสูงสุด</label>
                                <span>22 A</span>
                            </div>
                            <div class="parameter-card">
                                <label>โอเวอร์โหลด</label>
                                <span>200% / 150% / 110%</span>
                            </div>
                            <div class="parameter-card">
                                <label>เสียงรบกวน</label>
                                <span>≤ 29 dB</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
        load_js(array(
            asset('js/typed/js/typed.min.js'),
            asset('js/product.js'),
        ));
    ?>
@endsection