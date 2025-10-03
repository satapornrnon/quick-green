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
			asset('css/datatables/datatables.css'),
			asset('css/backoffice/app.css'),
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
			asset('js/datatables/datatables.js'),
			asset('js/general_helper.js'),
			asset('js/app_files_helper.js'),
			asset('js/backoffice/global.js'),
		));
    ?>

	<script>
		window.Laravel = {
			csrfToken: "{{ csrf_token() }}",
		};
	</script>

</head>
<body>

    <div class="page-layout">
        <div class="page-main">
            @include('backoffice.partials.topbar')

            @yield('backoffice.content')
            
            @include('backoffice.partials.footer')
        </div>

        @include('backoffice.partials.menu')
    </div>

</body>
</html>