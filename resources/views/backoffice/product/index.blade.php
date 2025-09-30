@extends('backoffice.layouts.app')

@section('title', 'Quick Green - ผลิตภัณฑ์')

@section('backoffice.content')        
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="pagetitle">
                        <h1 class="mb-0 text-gray-800">ผลิตภัณฑ์</h1>
                    </div>
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ผลิตภัณฑ์</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex align-items-center justify-content-between">    
                                <h5 class="card-title">ผลิตภัณฑ์</h5>

                                <button type="button" class="btn btn-sm btn-info btn-icon-split" data-toggle="modal" data-target="#product-modal" name="btn-add-product" data-title="เพิ่มผลิตภัณฑ์">
                                    <span class="icon text-white-50"><i class="fa fa-plus"></i></span>
                                    <span class="text">เพิ่มผลิตภัณฑ์</span>
                                </button>
                            </div>

                            <div class="table-responsive" style="overflow-y: auto;">
                                <table class="table table-hover display nowrap" id="table_product">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col"><i class="fa fa-bars"></i></th>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">รหัสผลิตภัณฑ์</th>
                                            <th scope="col">ชื่อผลิตภัณฑ์</th>
                                            <th scope="col">สถานะ</th>
                                            <th scope="col">รูปภาพ</th>
                                            <th scope="col">รูปภาพ Cover</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('backoffice.product.modal_form')

    <?php
        load_js(array(
            asset('js/backoffice/product.js'),
        ));
    ?>
@endsection