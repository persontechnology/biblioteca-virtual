<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Global stylesheets -->
	<link href="{{ asset('assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/ltr/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ asset('assets/demo/demo_configurator.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('assets/js/vendor/tables/datatables/extensions/natural_sort.js') }}"></script>

	<script src="{{ asset('assets/js/vendor/visualization/echarts/echarts.min.js') }}"></script>
	<script src="{{ asset('assets/js/vendor/maps/echarts/world.js') }}"></script>

	<script src="{{ asset('assets/js/app.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard_6/area_gradient.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard_6/map_europe_effect.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard_6/progress_sortable.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard_6/bars_grouped.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard_6/line_label_marks.js') }}"></script>
	<script src="{{ asset('assets/demo/pages/task_manager_list.js') }}"></script>

	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-xl navbar-static shadow">
		<div class="container-fluid">
			<div class="navbar-brand flex-1">
				<a href="{{ route('welcome') }}" class="d-inline-flex align-items-center">
					<img src="{{ asset('assets/images/logo_icon.svg') }}" alt="">
					<img src="{{ asset('assets/images/logo_text_dark.svg') }}" class="d-none d-sm-inline-block h-16px invert-dark ms-3" alt="">
				</a>
			</div>

			<div class="d-flex w-100 w-xl-auto overflow-auto overflow-xl-visible scrollbar-hidden border-top border-top-xl-0 order-1 order-xl-0 pt-2 pt-xl-0 mt-2 mt-xl-0">
				<ul class="nav gap-1 justify-content-center flex-nowrap flex-xl-wrap mx-auto">
					<li class="nav-item">
						@auth
						<a href="{{ route('dashboard') }}" class="navbar-nav-link rounded active">
							<i class="ph-house me-2"></i>
							Sistema educativo
						</a>
						@else
						<a href="{{ route('welcome') }}" class="navbar-nav-link rounded active">
							<i class="ph-house me-2"></i>
							Inicio
						</a>
						@endauth
					</li>
				</ul>
			</div>

			<ul class="nav gap-1 flex-xl-1 justify-content-end order-0 order-xl-1">
			
				@auth
				<li class="nav-item nav-item-dropdown-xl dropdown">
					<a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
						<div class="status-indicator-container">
							<img src="{{ asset('assets/images/demo/users/face11.jpg') }}" class="w-32px h-32px rounded-pill" alt="">
							<span class="status-indicator bg-success"></span>
						</div>
						<span class="d-none d-md-inline-block mx-md-2">Victoria</span>
					</a>

					<div class="dropdown-menu dropdown-menu-end">
						<a href="#" class="dropdown-item">
							<i class="ph-user-circle me-2"></i>
							Mi perfil
						</a>
						<form method="POST" action="{{ route('logout') }}">
                            @csrf
							<a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item">
								<i class="ph-sign-out me-2"></i>
								Salir
							</a>
						</form>
					</div>
				</li>
				@else
				<li class="nav-item">
					<a href="{{ route('register') }}" class="navbar-nav-link navbar-nav-link-icon rounded ms-1">
						<div class="d-flex align-items-center mx-md-1">
						<i class="ph-user-circle-plus"></i>
						<span class="d-none d-md-inline-block ms-2">Registrar</span>
					</div>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('login') }}" class="navbar-nav-link navbar-nav-link-icon rounded ms-1">
						<div class="d-flex align-items-center mx-md-1">
						<i class="ph-user-circle"></i>
						<span class="d-none d-md-inline-block ms-2">Acceder</span>
					</div>
					</a>
				</li>
				@endauth

				


			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

			


				<!-- Content area -->
				<div class="content container pt-2">

					@yield('content')
					

				</div>
				<!-- /content area -->


				<!-- Footer -->
				<div class="navbar navbar-sm navbar-footer border-top">
					<div class="container-fluid">
						<span>&copy; {{ date('Y') }} <a href="{{ route('welcome') }}">{{ config('app.name') }}</a></span>
					</div>
				</div>
				<!-- /footer -->

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->



</body>
</html>