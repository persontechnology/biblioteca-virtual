@extends('layouts.app')
@section('content')
    <!-- Rounded thumbs -->

	<!-- Content area -->
	<div class="content d-flex justify-content-center align-items-center ">

		<!-- Container -->
		<div class="flex-fill ">

			<!-- Error title -->
			<div class="text-center mb-4 ">
				<img src="{{ asset('images/Logo.png') }}" class="img-fluid mb-3" height="130" wi alt="">
				<h1 class="display-3 fw-semibold lh-1 mb-3 text-info">BIBLOTECA VIRTUAL DE MATEMATICAS</h1>
				{{-- <h6 class="w-md-25 mx-md-auto">. <br> The resource requested could not be found on this server.</h6> --}}
			</div>
			<!-- /error title -->
		</div>
		<!-- /container -->

	</div>
	<!-- /content area -->
   
@endsection