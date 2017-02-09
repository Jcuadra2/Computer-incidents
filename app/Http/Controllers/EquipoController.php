<?php

namespace Incidencias\Http\Controllers;

use Illuminate\Http\Request;

//use Incidencias\Http\Request;
use Illuminate\Support\Facades\Auth;
use Incidencias\Equipo;
use Incidencias\Dispositivo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Exception;
use DB;

class EquipoController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }
    public function index(Request $request){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else{

            if($request){

                //$equipos = DB::table('equipo')->paginate(7); //Mirar paginate porque no funciona

                $equipos = DB::select('SELECT d.id,Direccion_Ip,Marca,Modelo,Cod_Ubicacion,Memoria,Procesador,Tarjeta_Grafica,Tarjeta_Red,Fuente_Alimentacion
                FROM dispositivo as d
                INNER JOIN equipo as e 
                ON (d.id = e.Id_Dispositivo) INNER JOIN ubicacion AS u
                ON (d.id_ubicacion = u.id)');

                return view('almacen.equipo.index',['equipos' => $equipos]);
            }

        }

    }
    public function create(){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            $ubicacion = DB::select('SELECT id,Cod_Ubicacion
                FROM ubicacion');

            return view('almacen.equipo.create', ['ubicacion' => $ubicacion]);
        }

    }
    public function store(Request $request){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            $this->validate($request, [
                'direccion' => 'required|max:15',
                'marca' => 'required|max:30',
                'modelo' => 'required|max:50',
                'ubicacion' => 'required',

                'memoria' => 'required|max:50',
                'procesador' => 'required|max:50',
                'grafica' => 'required|max:50',
                'red' => 'required|max:50',
                'alimentacion' => 'required|max:50',
            ]);

            try {

                $dispositivo = new Dispositivo;
                $dispositivo->direccion_ip = $request->get('direccion');
                $dispositivo->marca = $request->get('marca');
                $dispositivo->modelo = $request->get('modelo');
                $dispositivo->id_ubicacion = $request->get('ubicacion');
                $dispositivo->save();

                $equipo = new Equipo;
                $equipo->memoria = $request->get('memoria');
                $equipo->procesador = $request->get('procesador');
                $equipo->tarjeta_grafica = $request->get('grafica');
                $equipo->tarjeta_red = $request->get('red');
                $equipo->fuente_alimentacion = $request->get('alimentacion');
                $equipo->id_dispositivo = $dispositivo->id;
                $equipo->id = $dispositivo->id;
                $equipo->save();

                \Session::flash('flash_message_ok', 'Equipo Insertado Correctamente');
                return Redirect::to('almacen/equipo');

            } catch (Exception $e) {

                \Session::flash('flash_message', 'Error al Insertar Equipo');
                return Redirect::to('almacen/equipo');

            }

        }
    }

    public function show($id){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            return view('almacen.equipo.show', ["equipo" => Equipo::findOrFail($id)]);

        }
    }
    public function edit($id){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            $ubicacion = DB::select('SELECT id,Cod_Ubicacion
                FROM ubicacion');

            return view('almacen.equipo.edit', ["equipo" => Equipo::findOrFail($id), "dispositivo" => Dispositivo::findOrFail($id), "ubicacion" => $ubicacion]);
        }
    }
    public function update(Request $request, $id){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            $this->validate($request, [
                'direccion' => 'required|max:15',
                'marca' => 'required|max:30',
                'modelo' => 'required|max:50',
                'ubicacion' => 'required',

                'memoria' => 'required|max:50',
                'procesador' => 'required|max:50',
                'grafica' => 'required|max:50',
                'red' => 'required|max:50',
                'alimentacion' => 'required|max:50',
            ]);

            try {

                $dispositivo = Dispositivo::findOrFail($id);
                $dispositivo->direccion_ip = $request->get('direccion');
                $dispositivo->marca = $request->get('marca');
                $dispositivo->modelo = $request->get('modelo');
                $dispositivo->id_ubicacion = $request->get('ubicacion');
                $dispositivo->update();

                $equipo = Equipo::findOrFail($id);
                $equipo->memoria = $request->get('memoria');
                $equipo->procesador = $request->get('procesador');
                $equipo->tarjeta_grafica = $request->get('grafica');
                $equipo->tarjeta_red = $request->get('red');
                $equipo->fuente_alimentacion = $request->get('alimentacion');
                $equipo->id_dispositivo = $dispositivo->id;
                $equipo->id = $dispositivo->id;
                $equipo->update();

                \Session::flash('flash_message_ok', 'Equipo Editado Correctamente');
                return Redirect::to('almacen/equipo');

            } catch (Exception $e) {

                \Session::flash('flash_message', 'Error al Editar Equipo');
                return Redirect::to('almacen/equipo');

            }
        }
    }
    public function destroy($id){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            try {

                $equipo = Equipo::findOrFail($id);
                $equipo->delete();

                $dispositivo = Dispositivo::findOrFail($id);
                $dispositivo->delete();

                \Session::flash('flash_message_ok', 'Equipo Borrado Correctamente');
                return Redirect::to('almacen/equipo');

            } catch (Exception $e) {

                \Session::flash('flash_message', 'Error al Borrar Equipo');
                return Redirect::to('almacen/equipo');
            }
        }
    }
}
