@extends('layouts.app')
@section('content')
    <!-- Rounded thumbs -->
    <div class="mb-3 pt-2">
        <h6 class="mb-0">Cursos</h6>
        <span class="text-muted">Seleciona un curso</span>
    </div>
    
    <div class="row">

		@foreach ($cursos as $curso)
			<div class="col-xl-4 col-sm-6">
				<a href="{{ route('unidad.index2',$curso->id) }}">
					<div class="card bg-{{ $curso->color }} text-white" style="background-image: url({{ asset('assets/images/backgrounds/panel_bg.png') }}); background-size: contain;">
						<div class="card-body text-center">
							
							<h1 class="mb-0">{{ $curso->nombre }}</h1>
						</div>
					</div>
				</a>
			</div>	
		@endforeach

    </div>
    <!-- /rounded thumbs-->
@endsection