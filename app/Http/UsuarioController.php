<?php

namespace Incidencias\Http\Controllers;

use Illuminate\Http\Request;

use Incidencias\Usuario;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Exception;
use DB;

class UsuarioController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }
    public function index(){
    		
		$usuarios = DB::table('usuario')->paginate(7);
   		return view('almacen.usuario.index',['usuarios' => $usuarios]);

    }
    public function create(){

    	return view('almacen.usuario.create');

    }
    public function store(Request $request){

        $this->validate($request, [
            'dni' => 'required|max:9',
            'user' => 'required|max:10',
            'pass' => 'required|max:8',
            'nombre' => 'required|max:50',
            'tipo' => 'required',
        ]);

        try{

        	$usuario = new Usuario;
	    	$usuario->dni=$request->get('dni');
	    	$usuario->user=$request->get('user');
	    	$usuario->password=$request->get('pass');
	    	$usuario->nombre=$request->get('nombre');
	    	$usuario->tipo=$request->get('tipo');
	        $usuario->save();

	        \Session::flash('flash_message_ok','Profesor Registrado Correctamente');
	  
	    	return Redirect::to('almacen/usuario');

        }catch(Exception $e){

        	\Session::flash('flash_message','Error al Registrar Profesor');

        	return Redirect::to('almacen/usuario');
        	
        }
    	
    }
    public function show($id){ 

       return view ('almacen.usuario.show',["usuario"=>Usuario::findOrFail($id)]);

    }
    public function edit($id){

        return view ('almacen.usuario.edit',["usuario"=>Usuario::findOrFail($id)]);

    }
    public function update(Request $request, $id){

        $this->validate($request, [
            'dni' => 'required|max:9',
            'user' => 'required|max:10',
            'pass' => 'required|max:8',
            'nombre' => 'required|max:50',
            'tipo' => 'required',
        ]);

      try{
            $usuario=Usuario::findOrFail($id);
            $usuario->dni=$request->get('dni');
            $usuario->user=$request->get('user');
            $usuario->password=$request->get('pass');
            $usuario->nombre=$request->get('nombre');
            $usuario->tipo=$request->get('tipo');
            $usuario->update();

            \Session::flash('flash_message_ok','Profesor Editado Correctamente');

            return Redirect::to('almacen/usuario');
        }catch(Exception $e){

            \Session::flash('flash_message','Error al Editar Profesor');
            return Redirect::to('almacen/usuario');
        }

    }
    public function destroy($id){

        $usuario=Usuario::findOrFail($id);
        $usuario->delete();
        return Redirect::to('almacen/usuario');

    }
}