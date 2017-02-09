@extends('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3><strong>Listado de Ubicaciones</strong></h3>
				<a href="ubicacion/create"><button class="btn btn-success">Nuevo</button></a>
				</br></br>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Codigo Ubicación</th>
						<th>Tipo</th>
					</thead>
					@foreach ($ubicaciones as $ub)
						<tr>
							<td>{{ $ub->Cod_Ubicacion }}</td>
							<td>{{ $ub->Tipo }}</td>
							<td>
								<a href="{{URL::action('UbicacionController@edit',$ub->id)}}"><button class="btn btn-info">Editar</button></a>
								<a href="" data-target="#modal-delete-{{$ub->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>
						</tr>
					@include('almacen.ubicacion.modal')	
					@endforeach
				</table>
			</div>
			@if(Session::has('flash_message_ok'))
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					{{ Session::get('flash_message_ok') }}
				</div>
			@elseif(Session::has('flash_message'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					{{ Session::get('flash_message') }}
				</div>
			@endif
		</div>
	</div>
@endsection