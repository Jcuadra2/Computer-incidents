<?php

namespace Incidencias\Http\Controllers;

use Illuminate\Http\Request;

use Incidencias\Ubicacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Exception;
use DB;

class UbicacionController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }
    public function index(){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            $ubicaciones = DB::table('ubicacion')->paginate(7);
            return view('almacen.ubicacion.index', ['ubicaciones' => $ubicaciones]);
        }
    }
    public function create(){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            return view('almacen.ubicacion.create');
        }
    }
    public function store(Request $request){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            $this->validate($request, [
                'c_ubicacion' => 'required|max:4',
                'tipo' => 'required|max:30',
            ]);

            try {

                $ubicacion = new Ubicacion;
                $ubicacion->cod_ubicacion = $request->get('c_ubicacion');
                $ubicacion->tipo = $request->get('tipo');
                $ubicacion->save();

                \Session::flash('flash_message_ok', 'Ubicacion Registrada Correctamente');

                return Redirect::to('almacen/ubicacion');

            } catch (Exception $e) {

                \Session::flash('flash_message', 'Error al Registrar Ubicacion');

                return Redirect::to('almacen/ubicacion');

            }
        }
    }
    public function show($id){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            return view('almacen.ubicacion.show', ["ubicacion" => Ubicacion::findOrFail($id)]);
        }
    }
    public function edit($id){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            return view('almacen.ubicacion.edit', ["ubicacion" => Ubicacion::findOrFail($id)]);
        }
    }
    public function update(Request $request,$id){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            try {
                $ubicacion = Ubicacion::findOrFail($id);
                $ubicacion->id = $request->get('id');
                $ubicacion->cod_ubicacion = $request->get('c_ubicacion');
                $ubicacion->tipo = $request->get('tipo');
                $ubicacion->update();

                \Session::flash('flash_message_ok', 'Ubicacion Editada Correctamente');

                return Redirect::to('almacen/ubicacion');
            } catch (Exception $e) {

                \Session::flash('flash_message', 'Error al Editar Ubicacion');
                return Redirect::to('almacen/ubicacion');
            }
        }
    }
    public function destroy($id){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            try {

                $ubicacion = Ubicacion::findOrFail($id);
                $ubicacion->delete();

                \Session::flash('flash_message_ok', 'Ubicacion Borrada Correctamente');
                return Redirect::to('almacen/ubicacion');
            } catch (\Mockery\CountValidator\Exception $e) {

                \Session::flash('flash_message', 'Error al Borrar Ubicación Correctamente');
                return Redirect::to('almacen/ubicacion');
            }
        }
        
    }
}
