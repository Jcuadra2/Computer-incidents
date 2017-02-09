@extends('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3><strong>Listado de Equipos</strong></h3>
				<a href="equipo/create"><button class="btn btn-success">Nuevo</button></a>
				</br></br>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Direccion Ip</th>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Memoria</th>
						<th>Procesador</th>
						<th>Tarjeta Grafica</th>
						<th>Tarjeta Red</th>
						<th>Fuente Alimentacion</th>
						<th>Cod Ubicacion</th>
					</thead>
					@foreach ($equipos as $eq)
						<tr>
							<td>{{ $eq->id }}</td>
							<td>{{ $eq->Direccion_Ip }}</td>
							<td>{{ $eq->Marca }}</td>
							<td>{{ $eq->Modelo }}</td>
							<td>{{ $eq->Memoria }}</td>
							<td>{{ $eq->Procesador }}</td>
							<td>{{ $eq->Tarjeta_Grafica }}</td>
							<td>{{ $eq->Tarjeta_Red }}</td>
							<td>{{ $eq->Fuente_Alimentacion }}</td>
							<td>{{ $eq->Cod_Ubicacion }}</td>
							<td>
								<a href="{{URL::action('EquipoController@edit',$eq->id)}}"><button class="btn btn-info">Editar</button></a>
								<a href=""data-target="#modal-delete-{{$eq->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>
						</tr>
						@include('almacen.equipo.modal')	
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