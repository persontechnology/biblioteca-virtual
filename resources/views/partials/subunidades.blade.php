<!-- subunidades.blade.php -->

<ul>
    @foreach($subunidades as $subunidad)
        <li id="{{ $subunidad->id }}" data-tipo="unidad" data-crearlibro="{{ route('libro.crear',$subunidad->id) }}" data-url="{{ route('unidades.show',$subunidad) }}" data-nombre="{{ $subunidad->nombre }}" data-id="{{ $subunidad->id }}" data-jstree='{"opened":true}'>
            {{ $subunidad->nombre }}

            @if ($subunidad->libros->count()>0)
                @include('partials.libros',['libros'=>$subunidad->libros])
            @endif



            @if($subunidad->subunidades->count() > 0)
                @include('partials.subunidades', ['subunidades' => $subunidad->subunidades])
            @endif
        </li>
    @endforeach
</ul>
