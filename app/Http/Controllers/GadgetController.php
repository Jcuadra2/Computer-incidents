<?php

namespace Incidencias\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Incidencias\Gadget;
use Incidencias\Dispositivo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Exception;
use DB;

class GadgetController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }
    public function index(Request $request){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            if ($request) {

                //$gadgets = DB::table('gadget')->paginate(7); //Mirar paginate porque no funciona

                $gadgets = DB::select('SELECT d.id,Direccion_Ip,Marca,Modelo,Cod_Ubicacion,g.Tipo
                    FROM dispositivo as d
                    INNER JOIN gadget as g 
                    ON (d.id = g.Id_Dispositivo) INNER JOIN ubicacion AS u
                    ON (d.id_ubicacion = u.id)');

                return view('almacen.gadget.index', ['gadgets' => $gadgets]);
            }
        }
    }
    public function create(){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            $ubicacion = DB::select('SELECT id,Cod_Ubicacion
                FROM ubicacion');

            return view('almacen.gadget.create', ['ubicacion' => $ubicacion]);
        }
    }
    public function store(Request $request){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            $this->validate($request, [
                'marca' => 'required|max:30',
                'modelo' => 'required|max:50',
                'ubicacion' => 'required',

                'tipo' => 'required|max:30',
            ]);

            try {

                $dispositivo = new Dispositivo;
                $dispositivo->direccion_ip = $request->get('direccion');
                $dispositivo->marca = $request->get('marca');
                $dispositivo->modelo = $request->get('modelo');
                $dispositivo->id_ubicacion = $request->get('ubicacion');
                $dispositivo->save();

                $gadget = new Gadget;
                $gadget->tipo = $request->get('tipo');
                $gadget->id_dispositivo = $dispositivo->id;
                $gadget->id = $dispositivo->id;
                $gadget->save();

                \Session::flash('flash_message_ok', 'Gadget Insertado Correctamente');
                return Redirect::to('almacen/gadget');

            } catch (Exception $e) {

                \Session::flash('flash_message', 'Error al Insertar Gadget');
                return Redirect::to('almacen/gadget');

            }
        }
    }

    public function show($id){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            return view('almacen.gadget.show', ["gadget" => Gadget::findOrFail($id)]);
        }
    }
    public function edit($id){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            $ubicacion = DB::select('SELECT id,Cod_Ubicacion
                FROM ubicacion');

            return view('almacen.gadget.edit', ["gadget" => Gadget::findOrFail($id), "dispositivo" => Dispositivo::findOrFail($id), "ubicacion" => $ubicacion]);
        }
    }
    public function update(Request $request, $id){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            $this->validate($request, [
                'marca' => 'required|max:30',
                'modelo' => 'required|max:50',
                'ubicacion' => 'required',

                'tipo' => 'required|max:30',
            ]);

            try {

                $dispositivo = Dispositivo::findOrFail($id);
                $dispositivo->direccion_ip = $request->get('direccion');
                $dispositivo->marca = $request->get('marca');
                $dispositivo->modelo = $request->get('modelo');
                $dispositivo->id_ubicacion = $request->get('ubicacion');
                $dispositivo->update();

                $gadget = Gadget::findOrFail($id);
                $gadget->tipo = $request->get('tipo');
                $gadget->id_dispositivo = $dispositivo->id;
                $gadget->id = $dispositivo->id;
                $gadget->update();

                \Session::flash('flash_message_ok', 'Gadget Editado Correctamente');
                return Redirect::to('almacen/gadget');

            } catch (Exception $e) {

                \Session::flash('flash_message', 'Error al Editar Gadget');
                return Redirect::to('almacen/gadget');

            }
        }
    }
    public function destroy($id){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            try {

                $gadget = Gadget::findOrFail($id);
                $gadget->delete();

                $dispositivo = Dispositivo::findOrFail($id);
                $dispositivo->delete();

                \Session::flash('flash_message_ok', 'Gadget Borrado Correctamente');
                return Redirect::to('almacen/gadget');

            } catch (Exception $e) {

                \Session::flash('flash_message', 'Error al Borrar Gadget');
                return Redirect::to('almacen/gadget');
            }
        }
    }
}
