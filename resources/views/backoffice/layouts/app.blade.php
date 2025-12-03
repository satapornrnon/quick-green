<!DOCTYPE html>
<html lang="en">
		
	@include('backoffice.partials.header')

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