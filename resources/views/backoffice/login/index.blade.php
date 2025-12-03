@extends('backoffice.layouts.master')

@section('title', 'Quick Green - เข้าสู่ระบบ')

@section('content')
    <!-- login -->
    <div class="login-container">
        <div class="login-box">
            <div class="logo">
                <img src="{{ asset('uploads/system/'. get_settings('logo')) }}" alt="Company Logo" style="max-width: 150px; display: block; margin: 0 auto 10px;">
            </div>

            <div class="header">
                <h3>เข้าสู่ระบบ</h3>
            </div>

            <form action="" class="form-validation" id="login-form" method="POST" role="form">
                @csrf
                <div class="content">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Username" autocomplete="off">
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" autocomplete="off">
                    </div>
                </div>

                <div class="footer">
                    <button type="submit" class="btn-login">เข้าสู่ระบบ</button>
                </div>
            </form>
        </div>
    </div>
    <!-- end login -->

    <?php
        load_js(array(
            asset('js/backoffice/login.js'),
        ));
    ?>

@endsection