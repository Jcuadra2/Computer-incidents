@extends('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!!Form::open(array('url'=>'almacen/guardarIncidencia','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
                <input type="hidden" name="id" class="form-control" value="">
            </div>
                <div class="form-group">
                    <h3><strong>Formulario de Incidencias</strong></h3>
                </div>
                <div class="form-group">
                    <label for="comunes">Dipositivo/Ubicacion</label>
                   <select name="Dispositivo">
                       @foreach($dispositivos as $dp)
                         <option value="{{ $dp->id }}">Modelo: {{$dp->Modelo}} Ubicación: {{$dp->Tipo}} {{$dp->Cod_Ubicacion}}</option>
                       @endforeach
                   </select>
                </div>
            <div class="form-group">
                <label for="comunes">Averias Comunes</label>
                <select name="comunes">
                    <option value="No Enciende">No Enciende</option>
                    <option value="El Equipo Disminuyo su Rendimiento">El Equipo Disminuyo su Rendimiento</option>
                    <option value="El Dispositivo no tiene Red">El Dispositivo no tiene Red</option>
                    <option value="Aparece Pantalla de Error">Aparece Pantalla de Error</option>
                    <option value="El Equipo se Reinicia Automaticamente">El Equipo se Reinicia Automaticamente</option>
                    <option value="Averia no Comun">Averia no Comun</option>
                </select>
            </div>
            <div class="form-group">
              <h4><strong>Observaciones</strong></h4>
                <p>Describa brevemente lo que le ocurre al ordenador</p>
            </div>
            <div class="form-group">
              <textarea rows="4" cols="100" name="Observaciones" required></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
@stop