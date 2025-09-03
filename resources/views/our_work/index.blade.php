@extends('layouts.app')

@section('title', 'Quick Green - ผลงานของเรา')

@section('content')
    <section class="cover-area" style="background: url(<?php echo base_url('images/cover-contact.png'); ?>) no-repeat center center/cover;">
        <div class="overlay cover-absolute"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb">
                        <ul class="breadcrumb-card">
                            <li class="breadcrumb-item">หน้าแรก</li>
                            <li class="breadcrumb-item">ผลงานของเรา</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="cover-content">
                <div class="title">
                    <h1>ผลงานของเรา</h1>
                </div>
                <div class="content">
                    <p>ผลงานการติดตั้งโซลาร์เซลล์จริง มั่นใจได้ทุกโครงการ</p>
                </div>
            </div>
        </div>
    </section>

    <section class="our-work-area bar">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title section-bg-blue">
                        <h3><span class="text-green">ผลงาน</span>การติดตั้งโซลาร์เซลล์</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-15 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="our-work-filter">
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
                        <div class="col-6 col-xl-3 col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="22-kWp">
                            <div class="our-work-block">
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="30-kWp">
                            <div class="our-work-block">
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="50-kWp">
                            <div class="our-work-block">
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="150-kWp">
                            <div class="our-work-block">
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="160-kWp">
                            <div class="our-work-block">
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="200-kWp">
                            <div class="our-work-block">
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="200-kWp">
                            <div class="our-work-block">
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-6 col-xl-3 col-lg-4 col-md-6 col-sm-6 filtr-item" data-category="200-kWp">
                            <div class="our-work-block">
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
            asset('js/our_work.js'),
        ));
    ?>
@endsection