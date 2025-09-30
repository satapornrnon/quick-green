@extends('layouts.app')

@section('title', 'Quick Green - ติดต่อเรา')

@section('content')
    <section class="cover-area" style="background: url(<?php echo base_url('images/cover-contact.png'); ?>) no-repeat center center/cover;">
        <div class="overlay cover-absolute"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb">
                        <ul class="breadcrumb-card">
                            <li class="breadcrumb-item">หน้าแรก</li>
                            <li class="breadcrumb-item">ติดต่อเรา</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="cover-content">
                <div class="title">
                    <h1 class="title-xl">ติดต่อเรา</h1>
                </div>
                <div class="content">
                    <p>ช่องทางการติดต่อสอบถาม เจ้าหน้าที่ ควิก กรีน</p>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-area bar">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title section-bg-blue">
                        <h3>ช่องทางการ<span class="text-green"> ติดต่อ</span></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="contact-card">
                        <div class="icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="content">
                            <div class="title">
                                <h5>ที่อยู่</h5>
                            </div>
                            <div class="detail">
                                <span>308,310 ถ.ติวานนท์ ตำบลตลาดขวัญ อำเภอเมืองนนทบุรี จังหวัดนนทบุรี 11000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="contact-card">
                        <div class="icon">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                        </div>
                        <div class="content">
                            <div class="title">
                                <h5>โทรศัพท์</h5>
                            </div>
                            <div class="detail">
                                <span>099-999-9999</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="contact-card">
                        <div class="icon">
                            <i class="fa-solid fa-envelope-open-text"></i>
                        </div>
                        <div class="content">
                            <div class="title">
                                <h5>อีเมล</h5>
                            </div>
                            <div class="detail">
                                <span>quickgreen@quickgreen.co.th</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <iframe width="100%" height="450px" style="border:0;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242.105940402901!2d100.5208788000245!3d13.85733491635353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29b5b062092c3%3A0x6bc4fe3d5970f8fb!2z4LiE4Lin4Li04LiB4Lil4Li04Liq4LiL4Li04LmI4LiHIOC4quC4suC4guC4suC4leC4tOC4p-C4suC4meC4meC4l-C5jA!5e0!3m2!1sth!2sth!4v1756363376222!5m2!1sth!2sth"></iframe>
@endsection