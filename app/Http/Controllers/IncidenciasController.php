<?php

namespace Incidencias\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

//use Incidencias\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;
use Incidencias\Equipo;
use Incidencias\Dispositivo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use Exception;
use DB;
use Incidencias\Estado;
use Incidencias\Http\Requests\EstadoFormRequest;
use Incidencias\Incidencia;

class IncidenciasController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }

    public function mostrarEnviar(){
        /*$dispositivos = Dispositivo::select('ubicacion.id as id_ubicacion','dispositivo.id as id_dispositivo','ubicacion.*','dispositivo.*')
            ->join('ubicacion', 'dispositivo.id', '=', 'ubicacion.id')->get();*/

        $dispositivos = DB::select('SELECT d.id,d.Modelo,u.Tipo,u.Cod_Ubicacion FROM ubicacion as u INNER JOIN dispositivo as d ON (u.id = d.id_ubicacion)');
        return view("almacen.incidencias.enviar")->with('dispositivos',$dispositivos);
    }

    public function guardar(){
        $dispositivo = Input::get('Dispositivo');
        $averia_comun = Input::get('comunes');
        $observaciones = Input::get('Observaciones');

        $final_observacion = $averia_comun.' '.$observaciones;

        $incidencia = new Incidencia();
        $incidencia->Hora =Carbon::now()->toTimeString();
        $incidencia->Fecha = Carbon::now()->toDateString();
        $incidencia->Observaciones = $final_observacion;
        $incidencia->Vista = "no";
        $incidencia->Id_dispositivo = $dispositivo;
        $incidencia->Id_usuario = Auth::user()->id;
        $incidencia->save();

       return Redirect::back();
    }
    
    public function listar(){
        $estados = Estado::all();
        $incidencias = Incidencia::select("incidencia.id as id_incidencia","incidencia.*","ubicacion.*","dispositivo.*")
        ->join("dispositivo","incidencia.Id_dispositivo","=","dispositivo.id")
            ->join("ubicacion","dispositivo.id_ubicacion","=","ubicacion.id")->get();
        return view("almacen.incidencias.listar")->with("estados",$estados)->with("incidencias",$incidencias);
    }
    public function getIncidenciasEstado(){
        $id= Input::get('id');
        if($id == 0){
            $incidencias = Incidencia::select("incidencia.id as id_incidencia","incidencia.*","ubicacion.*","dispositivo.*")
                ->join("dispositivo","incidencia.Id_dispositivo","=","dispositivo.id")
                ->join("ubicacion","dispositivo.id_ubicacion","=","ubicacion.id")->get();
            return view("almacen.incidencias.tablaIncidencias")->with("incidencias",$incidencias);
        }else{
            $incidencias = Incidencia::select("incidencia.id as id_incidencia","incidencia.*","ubicacion.*","dispositivo.*")
                ->join("dispositivo","incidencia.Id_dispositivo","=","dispositivo.id")
                ->join("ubicacion","dispositivo.id_ubicacion","=","ubicacion.id")
                ->where("incidencia.estado",$id)
                ->get();
            return view("almacen.incidencias.tablaIncidencias")->with("incidencias",$incidencias);
        }

    }

    public function ver(){
        $id = Input::get("id");
        $incidencia = Incidencia::find($id);

        $estados = Estado::all();
        $incidencia = Incidencia::select("incidencia.id as id_incidencia","incidencia.*","ubicacion.*","dispositivo.*","users.*")
            ->join("users","users.id","=","incidencia.id_usuario")
            ->join("dispositivo","incidencia.Id_dispositivo","=","dispositivo.id")
            ->join("ubicacion","dispositivo.id_ubicacion","=","ubicacion.id")
            ->where("incidencia.id",$id)
            ->get();
        return view("almacen.incidencias.ver")->with("incidencia",$incidencia)->with("estados",$estados);

        //return view("almacen.incidencias.ver")->with("incidencia",$incidencia);
    }

    public function editarEstado()
    {

        if (Auth::user()->Tipo != 'A') {
            return view('errors.403');
        } else {

            $id = Input::get('id');
            $id_dispositivo = Input::get('id_dispositivo');
            $id_usuario = Input::get('id_usuario');
            $vista = Input::get('vista');
            $estado = Input::get('estado');
            $observaciones = Input::get('observaciones');

            $incidencia = Incidencia::findOrFail($id);
            $incidencia->Hora = Carbon::now()->toTimeString();
            $incidencia->Fecha = Carbon::now()->toDateString();
            $incidencia->Id_dispositivo = $id_dispositivo;
            $incidencia->id_usuario = $id_usuario;
            $incidencia->Vista = $vista;
            $incidencia->estado = $estado;
            $incidencia->Observaciones = $observaciones;
            $incidencia->update();

            return Redirect::back();
        }
    }
}
