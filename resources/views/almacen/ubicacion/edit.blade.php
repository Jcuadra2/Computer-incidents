@extends('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3><strong>Editar Ubicacion: </strong><span style="color:blue;">{{ $ubicacion->Cod_Ubicacion }}</span></h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)	
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			{!!Form::model($ubicacion,['method'=>'PATCH','route'=>['ubicacion.update',$ubicacion->id]])!!}
				{{Form::token()}}
					<div class="form-group">
						<input type="hidden" name="id" class="form-control" value="{{$ubicacion->id}}"></input>
					</div>
					<div class="form-group">
						<label for="c_bicacion">Codigo Ubicacion</label>
						<input type="text" name="c_ubicacion" class="form-control" placeholder="{{$ubicacion->Cod_Ubicacion}}"></input>
					</div>
					<div class="form-group">
						<label for="tipo">Tipo</label>
						<input type="text" name="tipo" class="form-control" placeholder="{{$ubicacion->Tipo}}"></input>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Guardar</button>
						<button class="btn btn-danger" type="reset">Cancelar</button>
					</div>
			{!!Form::close()!!}
		</div>
	</div>
@stop