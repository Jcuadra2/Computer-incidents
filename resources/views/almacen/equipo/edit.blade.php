@extends('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3><strong>Editar Equipo: </strong><span style="color:blue;">{{ $dispositivo->Direccion_Ip }}</span></h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)	
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			{!!Form::model($equipo,['method'=>'PATCH','route'=>['equipo.update',$dispositivo->id]])!!}
				{{Form::token()}}
					<div class="form-group">
						<input type="hidden" name="id" class="form-control" value=""></input>
					</div>
					<div class="form-group">
						<label for="direccion">Direccion Ip</label>
						<input type="text" name="direccion" class="form-control" value="{{$dispositivo->Direccion_Ip}}"></input>
					</div>
					<div class="form-group">
						<label for="marca">Marca</label>
						<input type="text" name="marca" class="form-control" value="{{$dispositivo->Marca}}"></input>
					</div>
					<div class="form-group">
						<label for="modelo">Modelo</label>
						<input type="text" name="modelo" class="form-control" value="{{$dispositivo->Modelo}}"></input>
					</div>
					<div class="form-group">
						<label for="memoria">Memoria</label>
						<input type="text" name="memoria" class="form-control" value="{{$equipo->Memoria}}"></input>
					</div>
					<div class="form-group">
						<label for="procesador">Procesador</label>
						<input type="text" name="procesador" class="form-control" value="{{$equipo->Procesador}}"></input>
					</div>
					<div class="form-group">
						<label for="grafica">Tarjeta Grafica</label>
						<input type="text" name="grafica" class="form-control" value="{{$equipo->Tarjeta_Grafica}}"></input>
					</div>
					<div class="form-group">
						<label for="red">Tarjeta Red</label>
						<input type="text" name="red" class="form-control" value="{{$equipo->Tarjeta_Red}}"></input>
					</div>
					<div class="form-group">
						<label for="alimentacion">Fuente Alimentacion</label>
						<input type="text" name="alimentacion" class="form-control" value="{{$equipo->Fuente_Alimentacion}}"></input>
					</div>
					<div class="form-group">
						<label for="ubicacion">Ubicacion</label>
						<select name="ubicacion" class="form-control">
							@foreach($ubicacion as $ub)
								<?php
								echo '<option value='.$ub->id.'>'.$ub->Cod_Ubicacion.'</option>';
								?>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Guardar</button>
						<button class="btn btn-danger" type="reset">Cancelar</button>
					</div>
			{!!Form::close()!!}
		</div>
	</div>
@stop