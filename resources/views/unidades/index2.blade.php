@extends('layouts.app')
@section('content')
    <div class="card">
        
        <div class="card-header d-flex align-items-center">
            <h6 class="mb-0">Crear unidad</h6>
            <div class="ms-auto">
                <a href="{{ route('dashboard') }}" title="Cancelar" class="text-body">
                    <i class="ph ph-x text-danger fw-bold"></i>
                </a>
            </div>
        </div>
        
        <div class="card-body">
            @if (Auth::user()->perfil=='DOCENTE')
                <form action="{{ route('unidad.guardar') }}" method="post">
                    @csrf
                
                    <input type="hidden" name="curso_id" value="{{ $curso->id }}">
                    <div class="input-group">
                        
                        <div class="form-floating">
                            <input type="text" name="nombre" class="form-control" required value="{{ old('nombre') }}">
                            <label>Ingresar nombre de  unidad</label>
                        </div>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        
                    </div>
                </form>
                <hr>
            @endif
            <div class="form-floating">
                <input type="search" id="plugins4_q" class="form-control">
                <label>BUSCAR...</label>
            </div>


            <div id="jstree">
                <ul>
                    @foreach($unidades as $unidad)
                        <li id="{{ $unidad->id }}" data-tipo="unidad" data-crearlibro="{{ route('libro.crear',$unidad->id) }}" data-url="{{ route('unidades.show',$unidad) }}" data-nombre="{{ $unidad->nombre }}" data-id="{{ $unidad->id }}" data-jstree='{"opened":true}'>
                            {{ $unidad->nombre }}

                            @if ($unidad->libros->count()>0)
                                @include('partials.libros',['libros'=>$unidad->libros])
                            @endif


                            @if($unidad->subunidades->count() > 0)
                                @include('partials.subunidades', ['subunidades' => $unidad->subunidades])
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
        
    </div>


    <!-- Scrollable modal -->
    @if (Auth::user()->perfil=='DOCENTE')
    <form action="{{ route('unidad.guardar-sub') }}" method="post">
        <div id="modal_scrollable" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modaltitle"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="curso_id" value="{{ $curso->id }}">
                        <input type="hidden" name="unidad_padre_id" id="unidad_padre_id" value="">
                        <div class="form-floating">
                            <input type="text" name="nombre" class="form-control" required value="{{ old('nombre') }}" autofocus>
                            <label>Ingresar nombre de  sub-unidad</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="" id="btncrear" class="btn btn-primary">Ingresar Libro</a>
                        <a href="" id="btneliminar" class="btn btn-warning">Eliminar</a>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endif
	<!-- /scrollable modal -->
    
    
    
     <!-- Full width modal -->
	<div id="modal_full" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-full modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modaltitleLibro"></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>

				<div class="modal-body">
					<div class="ratio ratio-16x9">
                        <iframe src="" id="urllibro" title="Libro" allowfullscreen></iframe>
                    </div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
					@if (Auth::user()->perfil=='DOCENTE')
                    <a href="" id="btneliminarlibro" class="btn btn-warning">Eliminar</a>
                    @endif
				</div>
			</div>
		</div>
	</div>
	<!-- /full width modal -->
  
    

    <script>
        $.jstree.defaults.core.themes.variant = "large";

        $('#jstree').jstree({
            "plugins" : [ "search" ]}
        );

        
        $('#jstree').on("changed.jstree", function (e, data) {
            console.log(data.node.data);

            if(data.node.data.tipo==='libro'){
                $('#modaltitleLibro').html('Libro: '+data.node.data.nombre);
                $('#urllibro').attr('src',data.node.data.urllibro)
                $('#btneliminarlibro').attr('href',data.node.data.urleliminarlibro)
                $('#modal_full').modal('show');
            }else{
                $('#modal_scrollable').modal('show')
                $('#unidad_padre_id').val(data.node.data.id);
                $('#modaltitle').html('Ingresar sub-unidad en: '+data.node.data.nombre);
                $('#btneliminar').attr('href',data.node.data.url);
                $('#btncrear').attr('href',data.node.data.crearlibro);
            }
            
            
        });
        
        var to = false;
        $('#plugins4_q').keyup(function () {
            if(to) { clearTimeout(to); }
            to = setTimeout(function () {
                var v = $('#plugins4_q').val();
                $('#jstree').jstree(true).search(v);
            }, 250);
        });


    </script>
@endsection