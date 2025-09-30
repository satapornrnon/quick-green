@extends('layouts.app')

@section('title', 'Quick Green - แผงโซลาร์เซลล์ (Solar Panel)')

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
                            <li class="breadcrumb-item">แผงโซลาร์เซลล์ (Solar Panel)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="cover-content">
                <div class="title">
                    <h1 class="title-xl">แผงโซลาร์เซลล์ (Solar Panel)</h1>
                </div>
                <div class="content">
                    <p>Quick Green - ผู้เชี่ยวชาญด้านโซลาร์เซลล์ครบวงจร มั่นใจคุณภาพ มาตรฐานสากล</p>
                </div>
            </div>
        </div>
    </section>

    <section class="interested-area bar">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title section-bg-blue">
                        <h3>แผงโซลาร์เซลล์<span class="text-green"> (Solar Panel)</span></h3>
                    </div>
                    <div class="section-detail">
                        <span>โซลาร์เซลล์เป็นพลังงานสะอาดที่ช่วยลดค่าใช้จ่ายในระยะยาว พร้อมทั้งเป็นมิตรต่อสิ่งแวดล้อม การติดตั้งแผงโซลาร์ไม่เพียงช่วยให้คุณประหยัดค่าไฟฟ้าได้ทุกเดือน แต่ยังเป็นการลงทุนที่คุ้มค่าและคืนทุนได้จริง Quick Green พร้อมให้บริการครบวงจร ตั้งแต่ให้คำปรึกษา ออกแบบระบบ ไปจนถึงการติดตั้งและดูแลหลังการขาย ด้วยทีมงานมืออาชีพและอุปกรณ์มาตรฐานสากล เพื่อให้มั่นใจว่าทุกโครงการสามารถผลิตพลังงานได้เต็มประสิทธิภาพ</span>
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
                        <img src="{{ asset('uploads/product/product-solar-cell.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="interested-detail-card">
                        <div class="header">
                            <h3>JinkoSolar Tiger Neo <span class="text-green">610–635W</span></h3>
                        </div>
                        <div class="content">
                            <span>แผงโมโนเฟเชียลรุ่นประสิทธิภาพสูง เหมาะกับโครงการเชิงพาณิชย์และโรงงาน รับแสงน้อยได้ดี เสื่อมน้อย อายุยาว</span>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-10">
                                <div class="detail">
                                    <h5 class="text-blue">635W</h5>
                                    <span>กำลังไฟสูงสุด</span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-10">
                                <div class="detail">
                                    <h5 class="text-blue">23.51%</h5>
                                    <span>ประสิทธิภาพโมดูลสูงสุด</span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-10">
                                <div class="detail">
                                    <h5 class="text-blue">30 ปี</h5>
                                    <span>รับประกัน</span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-10">
                                <div class="detail">
                                    <h5 class="text-blue">87.4%</h5>
                                    <span>Power Warranty</span>
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
                            <img src="{{ asset('uploads/system/icon-solar-cell-1.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>N-type TOPCon Technology</h5>
                        </div>
                        <div class="content">
                            <span>เทคโนโลยี N-type พร้อม Tunnel Oxide Passivating Contacts ลด LID/LeTID degradation และประสิทธิภาพดีในแสงน้อย</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="interested-information-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-solar-cell-2.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>HOT 3.0 Technology</h5>
                        </div>
                        <div class="content">
                            <span>เทคโนโลยี JinkoSolar HOT 3.0 เพิ่มความน่าเชื่อถือและประสิทธิภาพของโมดูล N-type</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                    <div class="interested-information-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-solar-cell-3.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>Anti-PID Guarantee</h5>
                        </div>
                        <div class="content">
                            <span>รับประกันป้องกัน PID degradation ผ่านการปรับปรุงเทคโนโลยีการผลิตและควบคุมวัสดุ</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="interested-information-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-solar-cell-4.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>Enhanced Durability</h5>
                        </div>
                        <div class="content">
                            <span>ทนต่อสภาพแวดล้อมรุนแรง ทน Snow Load 5400 Pa และ Wind Load 2400 Pa</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                    <div class="interested-information-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-solar-cell-5.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>SMBB Technology</h5>
                        </div>
                        <div class="content">
                            <span>เทคโนโลยี Super Multi-Busbar ช่วยดักจับแสงและเก็บกระแสได้ดีขึ้น เพิ่มกำลังและความเชื่อถือ</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-10 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                    <div class="interested-information-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-solar-cell-6.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="header">
                            <h5>Premium Certifications</h5>
                        </div>
                        <div class="content">
                            <span>ได้รับมาตรฐาน IEC61215:2021, IEC61730:2023, ISO9001:2015 และใบรับรองคุณภาพอื่นๆ</span>
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
                                    <span>JKM610–635N-66HL4M-(V)</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>ชนิดเซลล์</h6>
                                    <span>โมโนคริสตัลไลน์ N‑type</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>จำนวนเซลล์</h6>
                                    <span>132 เซลล์ (66×2)</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>ขนาดโมดูล</h6>
                                    <span>2382 × 1134 × 35 มม.</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>น้ำหนัก</h6>
                                    <span>28.2 กก.</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>กระจกหน้า</h6>
                                    <span>กระจกเทมเปอร์ 3.2 มม. เคลือบกันแสงสะท้อน</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>เฟรม</h6>
                                    <span>อะลูมิเนียมอโนไดซ์</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>กล่องสาย</h6>
                                    <span>IP68</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>แรงดันระบบสูงสุด</h6>
                                    <span>1000/1500 VDC</span>
                                </div>
                                <div class="spec-detail">
                                    <h6>ฟิวส์อนุกรมสูงสุด</h6>
                                    <span>30 A</span>
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
                                <label>แรงดันที่กำลังสูงสุด (Vmp)</label>
                                <span>610-635 W</span>
                            </div>
                            <div class="parameter-card">
                                <label>กำลังไฟสูงสุด (Pmax)</label>
                                <span>40.56-41.39 V</span>
                            </div>
                            <div class="parameter-card">
                                <label>กระแสที่กำลังสูงสุด (Imp)</label>
                                <span>15.04-15.34 A</span>
                            </div>
                            <div class="parameter-card">
                                <label>แรงดันเปิดวงจร (Voc)</label>
                                <span>48.63-49.43 V</span>
                            </div>
                            <div class="parameter-card">
                                <label>กระแสลัดวงจร (Isc)</label>
                                <span>16.01-16.36 A</span>
                            </div>
                            <div class="parameter-card">
                                <label>ค่าสัมประสิทธิ์อุณหภูมิ Pmax</label>
                                <span>−0.29 %/°C</span>
                            </div>
                            <div class="parameter-card">
                                <label>ช่วงอุณหภูมิทำงาน</label>
                                <span>−40°C ถึง +70°C</span>
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