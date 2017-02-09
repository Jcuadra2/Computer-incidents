@extends('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
            <h3><strong>Listado de Incidencias</strong></h3>
        <div class="form-group">
            <select name="Estado" onchange="cambiaEstado(this.value)">
                <option value="0">Mostrar todas las incidencias</option>
                @foreach($estados as $estado)
                    <option value="{{$estado->id}}" > {{$estado->Descripcion}}</option>
                @endforeach
            </select>
        </div>
           <table id="datos_incidencia" class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            Dispositivo
                        </th>
                        <th>
                            Estado
                        </th>
                        <th>
                            Ubicación
                        </th>
                        <th>
                            Fecha
                        </th>
                        <th>
                            Hora
                        </th>
                        <th>
                            Vista
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
               <tbody>
               @if(!empty($incidencias))
                    @foreach($incidencias as $incidencia)
                        <tr>
                            <td>
                                {{$incidencia->Modelo}}
                            </td>
                            <td>
                                {{\Incidencias\Estado::find($incidencia->estado)->Descripcion}}
                            </td>
                            <td>
                                {{$incidencia->Cod_Ubicacion}}  {{$incidencia->Tipo}}
                            </td>
                            <td>
                                {{$incidencia->Fecha}}
                            </td>
                            <td>
                                {{$incidencia->Hora}}
                            </td>
                            <td>
                                {{$incidencia->Vista}}
                            </td>
                            <td>
                                <span onclick="ver(this.id)" id="{{$incidencia->id_incidencia}}" class="btn btn-default"> Ver</span>
                            </td>
                        </tr>
                    @endforeach
               @endif
               </tbody>
           </table>
        </div>
    </div>
@endsection
@section("script")
<script>
    function cambiaEstado(id) {
        $.ajax({
            url: "{{route("getIncidenciasEstado")}}"+"?id="+id,
        }).done(function(datos) {
           $('tbody').empty();
            $('tbody').append(datos);
        });
    }
    function ver(id) {
        window.location = ("{{route("verIncidencia")}}"+"?id="+id);
    }
</script>
@endsection
