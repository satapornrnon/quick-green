@extends('layouts.app')

@section('title', 'Quick Green - เซ็นเซอร์ (Sensor)')

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
                            <li class="breadcrumb-item">เซ็นเซอร์ (Sensor)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="cover-content">
                <div class="title">
                    <h1>เซ็นเซอร์ (Sensor)</h1>
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
                        <h3>เซ็นเซอร์ <span class="text-green"> (Sensor)</span></h3>
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
                        <img src="{{ asset('uploads/product/product-smart-power-sensor.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="interested-detail-card">
                        <div class="header">
                            <h3>Huawei Smart Power <span class="text-green">Sensor</span></h3>
                        </div>
                        <div class="content">
                            <span>อินเวอร์เตอร์ไฮบริดรุ่นใหม่ รองรับทั้ง PV และแบตเตอรี่ LUNA2000 อัจฉริยะ ปลอดภัย ประสิทธิภาพสูงสุด 98.6% พร้อมโหมดสำรองไฟบ้านเต็มรูปแบบ</span>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-10">
                                <div class="detail">
                                    <h5 class="text-blue">Class Ⅰ</h5>
                                    <span>ความแม่นยำ</span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-10">
                                <div class="detail">
                                    <h5 class="text-blue">LCD Display</h5>
                                    <span>ใช้งานง่าย</span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-10">
                                <div class="detail">
                                    <h5 class="text-blue">≤ 1.5 W</h5>
                                    <span>การใช้พลังงาน</span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-10">
                                <div class="detail">
                                    <h5 class="text-blue">0–100 A</h5>
                                    <span>รองรับกระแส</span>
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
                            <img src="{{ asset('uploads/system/icon-solar-cell-13.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>High Accuracy Measurement</h5>
                        </div>
                        <div class="content">
                            <span>ความแม่นยำสูง Current/Voltage ±0.5%, Power/Energy ±1%, Frequency ±0.01 Hz ตามมาตรฐาน Class I</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="interested-information-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-solar-cell-11.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>LCD Display & Easy Setup</h5>
                        </div>
                        <div class="content">
                            <span>หน้าจอ LCD แสดงผลชัดเจน ปุ่มกด SET และ ESC สำหรับการตั้งค่าและตรวจสอบข้อมูลอย่างง่ายดาย</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                    <div class="interested-information-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-solar-cell-10.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>DIN Rail Mounting</h5>
                        </div>
                        <div class="content">
                            <span>ติดตั้งง่ายด้วยระบบ DIN35 Rail mounting ประหยัดพื้นที่และติดตั้งได้อย่างมั่นคง</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="interested-information-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-solar-cell-14.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>RS485 Communication</h5>
                        </div>
                        <div class="content">
                            <span>การสื่อสารผ่าน RS485 พร้อม Modbus-RTU Protocol, Baud rate 9,600 bps สำหรับการเชื่อมต่อระบบ</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                    <div class="interested-information-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-solar-cell-12.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>Wide Operating Range</h5>
                        </div>
                        <div class="content">
                            <span>ทำงานได้ในช่วงอุณหภูมิ -25°C ถึง +60°C และความชื้น 5%-95% RH (non-condensing)</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                    <div class="interested-information-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-solar-cell-9.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>Low Power Consumption</h5>
                        </div>
                        <div class="content">
                            <span>ประหยัดพลังงาน การใช้ไฟรวม ≤ 1.5W เหมาะสำหรับการใช้งานต่อเนื่อง 24/7</span>
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
                                    <span>DDSU666-H</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>รุ่น</h6>
                                    <span>DTSU666-H</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>ขนาด</h6>
                                    <span>100 × 36 × 65.5 มม.</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>ขนาด</h6>
                                    <span>100 × 72 × 65.5 มม.</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>น้ำหนัก</h6>
                                    <span>1.2 กก.</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>น้ำหนัก</h6>
                                    <span>1.5 กก.</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>การใช้พลังงาน</h6>
                                    <span>≤ 0.8 W</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>การใช้พลังงาน</h6>
                                    <span>≤ 1 W</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>ประเภทกริดไฟฟ้า</h6>
                                    <span>1P2W</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>ประเภทกริดไฟฟ้า</h6>
                                    <span>3P3W/3P4W</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>Current Range</h6>
                                    <span>0-100A</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>Current Range</h6>
                                    <span>0-100A</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>Accessories</h6>
                                    <span>1 CT 100A/40mA</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>Accessories</h6>
                                    <span>3 CT 100A/40mA</span>
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
                                <label>แรงดันเฟส</label>
                                <span>176–288 V AC</span>
                            </div>
                            <div class="parameter-card">
                                <label>แรงดันไลน์</label>
                                <span>304–499 V AC</span>
                            </div>
                            <div class="parameter-card">
                                <label>กระแส</label>
                                <span>0–100 A</span>
                            </div>
                            <div class="parameter-card">
                                <label>Current/Voltage</label>
                                <span>±0.5%</span>
                            </div>
                            <div class="parameter-card">
                                <label>Power/Energy</label>
                                <span>±1%</span>
                            </div>
                            <div class="parameter-card">
                                <label>Interface</label>
                                <span>RS485</span>
                            </div>
                            <div class="parameter-card">
                                <label>Baud rate</label>
                                <span>9,600 bps</span>
                            </div>
                            <div class="parameter-card">
                                <label>Communication protoco</label>
                                <span>Modbus-RTU</span>
                            </div>
                            <div class="parameter-card">
                                <label>อุณหภูมิทำงาน</label>
                                <span>–25°C ถึง +60°C</span>
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