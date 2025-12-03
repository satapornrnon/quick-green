@extends('backoffice.layouts.app')

@section('title', 'Quick Green - ตั้งค่าระบบ')

@section('backoffice.content')        
    <div class="page-content">
        <div class="container-fluid">
            <div class="row pb-3">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="pagetitle">
                        <h1 class="mb-0 text-gray-800">ตั้งค่าระบบ</h1>
                    </div>
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ตั้งค่าระบบ</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <ul class="nav-settings">
                        <li class="settings-link" data-setting-link="general">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>ตั้งค่าทั่วไป</span>
                                <i class="fa-solid fa-angle-right"></i>
                            </div>
                        </li>
                        <li class="settings-link" data-setting-link="slide">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>จัดการสไลด์</span>
                                <i class="fa-solid fa-angle-right"></i>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-6 col-sm-12">
                    <div class="tab-settings tab-general">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex align-items-center justify-content-between">    
                                    <h5 class="card-title">ตั้งค่าทั่วไป</h5>
                                </div>

                                <hr class="mt-0"> 

                                <form action="" class="form-validation" id="general-form" method="POST" role="form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group row">
                                                <label for="logo" class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-form-label">โลโก้<span class="required">*</span> :</label>
                                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
                                                    <div class="preview-logo-image mb-2"></div>
                                                    <input type="file" class="file logo_file d-none file-upload-input" id="logo" name="logo" accept="image/*" data-target-name="#logo_name" data-target-preview=".preview-logo-image">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-sm" id="logo_name" name="logo_name" placeholder="Upload File" readonly>
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-sm btn-select-file btn-file-browse"data-target-input="#logo">Browse</button>
                                                        </div>
                                                    </div>
                                                    <label class="form_alert_remark">*หมายเหตุ ขนาดที่เหมาะสมไฟล์ต้องไม่เกิน 1MB</label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="favicon" class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-form-label">Favicon<span class="required">*</span> :</label>
                                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
                                                    <div class="preview-favicon-image mb-2"></div>
                                                    <input type="file" class="file favicon_file d-none file-upload-input" id="favicon" name="favicon" accept="image/*" data-target-name="#favicon_name" data-target-preview=".preview-favicon-image">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-sm" id="favicon_name" name="favicon_name" placeholder="Upload File" readonly>
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-sm btn-select-file btn-file-browse"data-target-input="#favicon">Browse</button>
                                                        </div>
                                                    </div>
                                                    <label class="form_alert_remark">*หมายเหตุ ขนาดที่เหมาะสมไฟล์ต้องไม่เกิน 1MB</label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="website_title" class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-form-label">ชื่อเว็บไซต์ :</label>
                                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
                                                    <input type="text" class="form-control form-control-sm" id="website_title" name="website_title" data-rule-required="true" data-msg-required="กรุณากรอกชื่อเว็บไซต์">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="company_name" class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-form-label">ชื่อบริษัท :</label>
                                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
                                                    <input type="text" class="form-control form-control-sm" id="company_name" name="company_name" data-rule-required="true" data-msg-required="กรุณากรอกชื่อบริษัท">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="company_address" class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-form-label">ที่อยู่ :</label>
                                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
                                                    <input type="text" class="form-control form-control-sm" id="company_address" name="company_address" data-rule-required="true" data-msg-required="กรุณากรอกที่อยู่">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="company_telephone" class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-form-label">โทรศัพท์ :</label>
                                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
                                                    <input type="text" class="form-control form-control-sm" id="company_telephone" name="company_telephone" data-rule-required="true" data-msg-required="กรุณากรอกโทรศัพท์" data-rule-minlength="12" data-msg-minlength="กรุณากรอกเบอร์โทรศัพท์มือถือ 10 ตัวอักษร" data-rule-maxlength="12" data-msg-maxlength="กรุณากรอกเบอร์โทรศัพท์มือถือไม่เกิน 10 ตัวอักษร">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="company_email" class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-form-label">อีเมล :</label>
                                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
                                                    <input type="text" class="form-control form-control-sm" id="company_email" name="company_email" data-rule-required="true" data-msg-required="กรุณากรอกอีเมล">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="control-group">
                                                <div class="controls">
                                                    <div class="btn-toolbar sw-toolbar sw-toolbar-bottom justify-content-end">
                                                        <div class="btn-group sw-btn-group-extra" role="group">
                                                            <button type="submit" class="btn btn-sm btn-success btn-icon-split" name="submit">
                                                                <span class="icon text-white-50"><i class="fa-regular fa-circle-check"></i></span>
                                                                <span class="text">ยืนยัน</span>
                                                            </button>
                                                        </div>                 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-settings tab-slide">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex align-items-center justify-content-between">    
                                    <h5 class="card-title">จัดการสไลด์</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        load_js(array(
            asset('js/backoffice/settings.js'),
            asset('js/backoffice/settings_genenal.js'),
        ));
    ?>
@endsection