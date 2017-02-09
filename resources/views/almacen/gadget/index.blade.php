@extends('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3><strong>Listado de Gadgets</strong></h3>
            <a href="gadget/create"><button class="btn btn-success">Nuevo</button></a>
            </br></br>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Id</th>
                    <th>Direccion Ip</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Tipo</th>
                    <th>Cod Ubicacion</th>
                    </thead>
                    @foreach ($gadgets as $g)
                        <tr>
                            <td>{{ $g->id }}</td>
                            <td>{{ $g->Direccion_Ip }}</td>
                            <td>{{ $g->Marca }}</td>
                            <td>{{ $g->Modelo }}</td>
                            <td>{{ $g->Tipo }}</td>
                            <td>{{ $g->Cod_Ubicacion }}</td>
                            <td>
                                <a href="{{URL::action('GadgetController@edit',$g->id)}}"><button class="btn btn-info">Editar</button></a>
                                <a href=""data-target="#modal-delete-{{$g->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                            </td>
                        </tr>
                        @include('almacen.gadget.modal')
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