
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
                <span  onclick="ver(this.id)" id="{{$incidencia->id_incidencia}}" class="btn btn-default"> Ver</span>
            </td>
        </tr>
    @endforeach
@endif
