@extends('backoffice.layouts.app')

@section('title', 'Quick Green - ผู้ใช้งาน')

@section('backoffice.content')        
    <div class="page-content">
        <div class="container-fluid">
            <div class="row pb-3">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="pagetitle">
                        <h1 class="mb-0 text-gray-800">ผู้ใช้งาน</h1>
                    </div>
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ผู้ใช้งาน</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
            </div>
        </div>
    </div>
@endsection