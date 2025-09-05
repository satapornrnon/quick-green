<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Laravel 8 Website')</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="{{ asset('uploads/system/logo.webp') }}">

    <?php
		load_css(array(
			asset('css/bootstrap/bootstrap.css'),
			asset('css/sweetalert/sweetalert.min.css'),
			asset('css/fontawesome/all.css'),
			asset('css/validation/validation.css'),
			asset('css/wow/animate.min.css'),
			asset('css/app.css'),
		));
    ?>

    <?php
		load_js(array(
			asset('js/jquery/jquery-3.6.0.js'),
			asset('js/jquery/jquery-ui.js'),
			asset('js/bootstrap/bootstrap.bundle.js'),
			asset('js/loadingoverlay/loadingoverlay.min.js'),
			asset('js/sweetalert/sweetalert.min.js'),
			asset('js/validation/jquery.validate.min.js'),
			asset('js/wow/wow.min.js'),
			asset('js/global.js'),
			asset('js/general_helper.js'),
		));
    ?>
</head>
<body>

    @include('partials.header')
    
    @include('partials.menu')

    @yield('content')

    @include('partials.footer')

</body>
</html>