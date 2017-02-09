@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('User') ? ' has-error' : '' }}">
                            <label for="user" class="col-md-4 control-label">Usuario</label>

                            <div class="col-md-6">
                                <input id="User" type="text" class="form-control" name="User" value="{{ old('User') }}" required autofocus>

                                @if ($errors->has('User'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('User') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="Nombre" type="text" class="form-control" name="Nombre" value="{{ old('Nombre') }}" required autofocus>

                                @if ($errors->has('Nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Dni') ? ' has-error' : '' }}">
                            <label for="Dni" class="col-md-4 control-label">DNI</label>

                            <div class="col-md-6">
                                <input id="Dni" type="text" class="form-control" name="Dni" value="{{ old('Dni') }}" required>

                                @if ($errors->has('Dni'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Dni') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Password') ? ' has-error' : '' }}">
                            <label for="Password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="Password" type="password" class="form-control" name="Password" required>

                                @if ($errors->has('Password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Password-confirm" class="col-md-4 control-label">Confirmar Password</label>

                            <div class="col-md-6">
                                <input id="Password-confirm" type="password" class="form-control" name="Password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Tipo') ? ' has-error' : '' }}">
                            <label for="Tipo" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="Tipo" type="hidden" class="form-control" name="Tipo" value="A" required>

                                @if ($errors->has('Tipo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
