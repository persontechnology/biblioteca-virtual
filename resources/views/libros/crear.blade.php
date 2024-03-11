@extends('layouts.app')
@section('content')
<form action="{{ route('libros.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="card">
        
        <div class="card-header d-flex align-items-center">
            <h6 class="mb-0">Ingresar libro en <strong>{{ $unidad->nombre }}</strong></h6>
            <div class="ms-auto">
                <a href="{{ route('unidad.index2',$unidad->curso_id) }}" title="Cancelar" class="text-body">
                    <i class="ph ph-x text-danger fw-bold"></i>
                </a>
            </div>
        </div>

        <div class="card-body">
            <input type="hidden" value="{{ $unidad->id }}" name="unidad_id">
            <div class="form-floating">
                <input type="text" name="nombre" class="form-control" required value="{{ old('nombre') }}" autofocus>
                <label>Ingresar nombre de libro</label>
            </div>

            <div class="my-2">
                <label>Selecionar libro en formato PDF.</label>
                <input type="file" name="archivo" class="form-control" required accept="application/pdf">
            </div>


        </div>
        <div class="card-footer text-muted">
            <button class="btn btn-primary" type="submit">Guardar</button>
            
        </div>
    </div>
</form>    
@endsection