@extends('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
            <h3><strong>Editar Gadget: </strong><span style="color:blue;">{{ $dispositivo->Direccion_Ip }}</span></h3>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!!Form::model($gadget,['method'=>'PATCH','route'=>['gadget.update',$dispositivo->id]])!!}
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
                <label for="tipo">Tipo</label>
                <input type="text" name="tipo" class="form-control" value="{{$gadget->Tipo}}"></input>
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