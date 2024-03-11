<!-- subunidades.blade.php -->

<ul>
    @foreach($subunidades as $subunidad)
        <li>
            {{ $subunidad->nombre }}

            <form action="{{ route('unidad.guardar-sub') }}" method="post">
                @csrf
                <input type="hidden" name="curso_id" value="{{ $curso->id }}">
                <input type="hidden" name="unidad_padre_id" value="{{ $subunidad->id }}">

                <div class="input-group">
                    
                    <div class="form-floating">
                        <input type="text" name="nombre" class="form-control" required value="{{ old('nombre') }}" autofocus>
                        <label>Ingresar nombre de  sub-unidad</label>
                    </div>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form>

            @if($subunidad->subunidades->count() > 0)
                @include('partials.subunidades', ['subunidades' => $subunidad->subunidades])
            @endif
        </li>
    @endforeach
</ul>
