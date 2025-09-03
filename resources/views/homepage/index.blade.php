@extends('layouts.app')

@section('title', 'Quick Green - หน้าแรก')

@section('content')
    <section class="hero-area">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>โซลาร์เซลล์เพื่ออนาคตที่ยั่งยืน</h1>
            <p>Quick Green – ผู้เชี่ยวชาญด้านการขายและติดตั้งโซลาร์เซลล์ครบวงจร</p>

            <a href="{{ url('/product/solar') }}" class="btn-quotation-solar">แผงโซลาร์เซลล์ (Solar Panel)</a>
            <a href="{{ url('/product/inverter') }}" class="btn-quotation-inverter">อินเวอร์เตอร์ (Inverter)</a>
        </div>
    </section>

    <section class="our-philosophy-area bar" id="our-philosophy-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title section-bg-blue">
                        <h3><span class="text-green">ปรัชญาของ</span> Quick Green</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-25 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="our-philosophy-card">
                        <div class="icon">
                            <img src="{{ asset('uploads/system/icon-our-mission.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>ภารกิจของเรา</h4>
                            <p>ประหยัดค่าใช้จ่าย ตรวจสอบได้ งานมีคุณภาพ</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="our-philosophy-card">
                        <div class="icon">
                            <img src="{{ asset('uploads/system/icon-our-vision.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>วิสัยทัศน์ของเรา</h4>
                            <p>บริการ รวดเร็ว เรียบร้อย</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="our-philosophy-card">
                        <div class="icon">
                            <img src="{{ asset('uploads/system/icon-our-goals.png') }}" alt="">
                        </div>
                        <div class="content">
                            <h4>เป้าหมายของเรา</h4>
                            <p>หนึ่งในผู้ให้บริการที่ลูกค้าพึงพอใจสูงสุด</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-area bg-blue-overlay bar">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title section-bg-blue">
                        <h3><span class="text-green">สินค้าของ</span> Quick Green</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-25 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="product-card">
                        <a href="{{ url('/product/solar') }}" class="product-link">
                            <div class="images">
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="content">
                                <h4 class="title">แผงโซลาร์เซลล์ (Solar Panel)</h4>
                                <button type="button" class="btn btn-sm btn-interested" name="btn-interested">สนใจลงทะเบียน</button>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="product-card">
                        <a href="{{ url('/product/inverter') }}" class="product-link">
                            <div class="images">
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="content">
                                <h4 class="title">อินเวอร์เตอร์ (INVERTER)</h4>
                                <button type="button" class="btn btn-sm btn-interested" name="btn-interested">สนใจลงทะเบียน</button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>  

    <section class="service-area bar" id="service-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-20 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title section-bg-blue">
                        <h3><span class="text-green">บริการของ</span> Quick Green</h3>
                        <span>QUICK GREEN ให้บริการ Solar Cell แบบครบวงจร ตั้งแต่การวิเคาะห์หน้างานออกแบบระบบ ไปจนถึงการติดตั้งและดูแลหลังการขาย เพือให้ลูกค้าได้รับระบบทีมีคุณภาพ และคุ้มค่าที่สุด</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center mb-25">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="service-card">
                        <div class="images">
                            <img src="{{ asset('images/no-image-3.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="service-process-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-service-process-1.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <h5 class="title">นำเสนองาน</h5>
                            <span>QUICK GREEN นําเสนอ Solution พลังงาน แสงอาทิตย์ด้วยความรู้ ความจริงใจและ ประสบการณ์ เพือให้ลูกค้าได้รับระบบทีเหมาะสม คุ้มค่า และใช้งานได้จริง</span>
                        </div>
                    </div>
                    <div class="service-process-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-service-process-2.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <h5>ติดตั้งระบบ</h5>
                            <span>QUICK GREEN ติดตังระบบโดยทีมงานมือ อาชีพ ออกแบบเฉพาะตามการใช้งานจริง ใช้ อุปกรณ์คุณภาพสูง เพือให้ลูกค้าทุกคนมันใจใน ความคุ้มค่าและประสิทธิภาพระยะยาว</span>
                        </div>
                    </div>
                    <div class="service-process-card">
                        <div class="images">
                            <img src="{{ asset('uploads/system/icon-service-process-3.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <h5>บริการหลังการขาย</h5>
                            <span> QUICK GREEN พร้อมดูแลหลังการติดตัง ด้วย บริการตรวจเช็คระบบ บํารุงรักษา ให้คําปรึกษา และซัพพอร์ตตลอดการใช้งาน เพือให้คุณมันใจว่า ระบบ Solar Cell ของคุณจะทํางานได้ดีตลอดไป</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="system-design-area bg-blue-45 bar">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title section-bg-green text-blue">
                        <h3>คํานวน ออกแบบระบบ</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-15 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="system-design-card">
                        <div class="images">
                            <img src="{{ asset('images/no-image-3.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <h4 class="title">ใช้ Program สําหรับออกแบบระบบ Solar Cell</h4>
                            <span>QUICK GREEN ใช้ Program สําหรับออกแบบระบบ Solar Cell โดยเฉพาะ โดย Program จะคํานวนการผลิตไฟฟา พื้นที่ติดตั้งและประเมินผลตอบแทนการลงทุนได้อย่างชัดเจน</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-15 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="system-design-card">
                        <div class="images">
                            <img src="{{ asset('images/no-image-3.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <h4 class="title">ติดตั้งตามแบบ พร้อมวิศวกรควบคุมงานมือ Pro</h4>
                            <span>QUICK GREEN ดําเนินงานติดตั้งตามแบบ โดยใช้วิศกรมือ อาชีพในการดูแลการติดตั้งเพือให้ได้คุณภาพออกมาตาม แบบที่เราได้กําหนดไว้</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="request-permission-area bar">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title section-bg-blue">
                        <h3>ยื่นขออนุญาตกับหน่วยงานทางภาครัฐ</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-15 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="request-permission-card">
                        <div class="content">
                            <h4 class="title">บริการยื่นขออนุญาตกับหน่วยงานทางภาครัฐ</h4>
                            <span>QUICK GREEN มีความพร้อมอย่างเต็มที่ในการดําเนินการยื่นขอ อนุญาตต่อหน่วยงานภาครัฐ โดยได้จัดเตรียมเอกสารข้อมูลและกระบวนการที่เกี่ยวข้องไว้อย่างครบถ้วนและเป็นระบบ เพือให้การ ดําเนินงานเป็นไปอย่างราบรื่นและถูกต้องตามกฎหมาย</span>
                            <div class="images-permission">
                                <img src="{{ asset('uploads/system/logo-pea.webp') }}" alt="">
                                <img src="{{ asset('uploads/system/logo-mea.webp') }}" alt="">
                                <img src="{{ asset('uploads/system/logo-erc.webp') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-15 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="request-permission-card">
                        <div class="images">
                            <img src="{{ asset('images/no-image-3.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-services-area bar">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title section-bg-green">
                        <h3 class="text-green">ผลงานของเรา</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-15 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="our-services-filter">
                        <button class="active" type="button" data-filter="all">ทั้งหมด</button>
                        <button type="button" data-filter="22-kWp">22 kWp</button>
                        <button type="button" data-filter="30-kWp">30 kWp</button>
                        <button type="button" data-filter="50-kWp">50 kWp</button>
                        <button type="button" data-filter="150-kWp">150 kWp</button>
                        <button type="button" data-filter="160-kWp">160 kWp</button>
                        <button type="button" data-filter="200-kWp">200 kWp</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-15 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="filtr-container">
                        <div class="col-6 col-xl-4 col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="22-kWp">
                            <div class="our-services-block">
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-6 col-xl-4 col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="30-kWp">
                            <div class="our-services-block">
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-6 col-xl-4 col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="50-kWp">
                            <div class="our-services-block">
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-6 col-xl-4 col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="150-kWp">
                            <div class="our-services-block">
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-6 col-xl-4 col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="160-kWp">
                            <div class="our-services-block">
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-6 col-xl-4 col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="200-kWp">
                            <div class="our-services-block">
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
        load_js(array(
            asset('js/filterzr/jquery.filterizr.min.js'),
            asset('js/homepage.js'),
        ));
    ?>
@endsection