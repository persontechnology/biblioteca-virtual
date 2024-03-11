<ul>
    @foreach ($libros as $libro)
        <li data-tipo="libro" data-urleliminarlibro="{{ route('libros.show',$libro) }}" data-urllibro="{{ Storage::url($libro->archivo) }}" data-nombre="{{ $libro->nombre }}" data-jstree='{"icon":"ph ph-file-pdf"}'>
            {{ $libro->nombre }}
            {{-- <a href="{{ Storage::url($libro->archivo) }}">{{ Storage::url($libro->archivo) }}</a> --}}
        </li>
    @endforeach
</ul>