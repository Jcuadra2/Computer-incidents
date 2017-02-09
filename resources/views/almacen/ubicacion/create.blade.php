@extends('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3><strong>Nueva Ubicacion</strong></h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)	
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			{!!Form::open(array('url'=>'almacen/ubicacion','method'=>'POST','autocomplete'=>'off'))!!}
				{{Form::token()}}
					<div class="form-group">
						<label for="c_ubicacion">Codigo Ubicacion</label>
						<input type="text" name="c_ubicacion" class="form-control" placeholder="Codigo Ubicacion"></input>
					</div>
					<div class="form-group">
						<label for="tipo">Tipo</label>
						<input type="text" name="tipo" class="form-control" placeholder="Tipo"></input>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Guardar</button>
						<button class="btn btn-danger" type="reset">Cancelar</button>
					</div>
			{!!Form::close()!!}
		</div>
	</div>
@stop