@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Crear unidad</div>
        
        <div class="card-body">
            <form action="{{ route('unidad.guardar') }}" method="post">
                @csrf
               
                <input type="hidden" name="curso_id" value="{{ $curso->id }}">
                <div class="input-group">
                    
                    <div class="form-floating">
                        <input type="text" name="nombre" class="form-control" required value="{{ old('nombre') }}" autofocus>
                        <label>Ingresar nombre de  unidad</label>
                    </div>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>


            </form>

            <ul>
                @foreach($unidades as $unidad)
                    <li>
                        {{ $unidad->nombre }}

                        <form action="{{ route('unidad.guardar-sub') }}" method="post">
                            @csrf
                            <input type="hidden" name="curso_id" value="{{ $curso->id }}">
                            <input type="hidden" name="unidad_padre_id" value="{{ $unidad->id }}">

                            <div class="input-group">
                                
                                <div class="form-floating">
                                    <input type="text" name="nombre" class="form-control" required value="{{ old('nombre') }}" autofocus>
                                    <label>Ingresar nombre de  sub-unidad</label>
                                </div>
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                        </form>


                        @if($unidad->subunidades->count() > 0)
                            @include('partials.subunidades', ['subunidades' => $unidad->subunidades])
                        @endif
                    </li>
                @endforeach
            </ul>

        </div>
        
    </div>
    
@endsection