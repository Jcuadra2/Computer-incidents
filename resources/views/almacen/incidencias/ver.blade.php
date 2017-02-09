@extends('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
            <h3><strong>Datos de Incidencia</strong></h3>
            </br>
            <table id="datos_incidencia" class="table table-hover">
                <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Direccion Ip
                    </th>
                    <th>
                        Marca
                    </th>
                    <th>
                        Modelo
                    </th>
                    <th>
                        Estado
                    </th>
                    <th>
                        Ubicación
                    </th>
                    <th>
                        Usuario
                    </th>
                    <th>
                        Fecha
                    </th>
                    <th>
                        Hora
                    </th>
                    <th>
                        Descripcion Avería
                    </th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($incidencia))
                    @foreach($incidencia as $in)
                        <tr>
                            <td>
                                {{$in->id_incidencia}}
                            </td>
                            <td>
                                {{$in->Direccion_Ip}}
                            </td>
                            <td>
                                {{$in->Marca}}
                            </td>
                            <td>
                                {{$in->Modelo}}
                            </td>
                            <td>
                                {{\Incidencias\Estado::find($in->estado)->Descripcion}}
                            </td>
                            <td>
                                {{$in->Cod_Ubicacion}}
                            </td>
                            <td>
                                {{$in->Nombre}}
                            </td>
                            <td>
                                {{$in->Fecha}}
                            </td>
                            <td>
                                {{$in->Hora}}
                            </td>
                            <td>
                                {{$in->Observaciones}}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            </br>
            @if(\Illuminate\Support\Facades\Auth::user()->Tipo=='A')
                @foreach($incidencia as $in)
                    {!!Form::open(array('url'=>'almacen/editarEstado','method'=>'POST','autocomplete'=>'off'))!!}
                    {{Form::token()}}
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="{{$in->id_incidencia}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id_dispositivo" class="form-control" value="{{$in->Id_dispositivo}}">
                        </div>
                         <div class="form-group">
                            <input type="hidden" name="id_usuario" class="form-control" value="{{$in->id_usuario}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="vista" class="form-control" value="si">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="observaciones" class="form-control" value="{{$in->Observaciones}}">
                        </div>
                        <div class="form-group">
                            <label>Selecciona Estado Acutal: </label>
                            </br>
                            <select name="estado">
                                @foreach($estados as $estado)
                                    <option value="{{$estado->id}}" > {{$estado->Descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Enviar</button>
                        </div>
                {!!Form::close()!!}
            @endforeach
        @endif
    </div>
</div>
@endsection






