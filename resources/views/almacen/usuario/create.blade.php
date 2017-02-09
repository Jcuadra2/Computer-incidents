@extends('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3><strong>Nuevo Profesor</strong></h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)	
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			{!!Form::open(array('url'=>'almacen/usuario','method'=>'POST','autocomplete'=>'off'))!!}
				{{Form::token()}}
					<div class="form-group">
						<label for="dni">DNI</label>
						<input type="text" name="dni" class="form-control" placeholder="DNI">
					</div>
					<div class="form-group">
						<label for="user">Usuario</label>
						<input type="text" name="user" class="form-control" placeholder="Usuario">
					</div>
					<div class="form-group">
						<label for="pass">Password</label>
						<input type="password" name="password" class="form-control" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="Password-confirm">Confirmar Password</label>
						<input id="Password-confirm" type="password" class="form-control" name="Password_confirmation" placeholder="Repita Password" required>
					</div>
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" class="form-control" placeholder="Nombre">
					</div>
					<div class="form-group">
						<input type="hidden" name="tipo" value="P" class="form-control">
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Guardar</button>
						<button class="btn btn-danger" type="reset">Cancelar</button>
					</div>
			{{csrf_field()}}
			{!!Form::close()!!}
		</div>
	</div>
@stop