@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="box box-default">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"><strong>Importar Datos Profesores</strong></h3>
                    </div>
                    <div class="box-body">
                        {!!Form::open(array('url'=>'almacen/importar','method'=>'GET','autocomplete'=>'off'))!!}
                        {{Form::token()}}
                            <div class="box box-primary">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Importar Profesores</label>
                                        <input type="file" id="importar" name="importar">
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success">Enviar</button>
                                </div>
                            </div>
                            {{csrf_field()}}
                        {!!Form::close()!!}
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>
@endsection