@extends('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3><strong>Listado de Profesores</strong></h3>
				<a href="usuario/create"><button class="btn btn-success">Nuevo</button></a>
				</br></br>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>DNI</th>
						<th>Usuario</th>
						<!--<th>Password</th>-->
						<th>Nombre</th>
					</thead>
					@foreach ($usuarios as $us)
						@if($us->Tipo =='P')
						<tr>
							<td>{{ $us->Dni }}</td>
							<td>{{ $us->user }}</td>
							<!--<td>{{ $us->password }}</td>-->
							<td>{{ $us->Nombre }}</td>
							<td>
								<a href="{{URL::action('UsuarioController@edit',$us->id)}}"><button class="btn btn-info">Editar</button></a>
								<a href="" data-target="#modal-delete-{{$us->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>
						</tr>
						@endif
					@include('almacen.usuario.modal')		
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