<?php

namespace Incidencias\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Incidencias\User;
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
    		
		$usuarios = DB::table('users')->paginate(7);
   		return view('almacen.usuario.index',['usuarios' => $usuarios]);

    }
    public function create(){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            return view('almacen.usuario.create');
        }
    }
    public function store(Request $request){

        if(Auth::user()->Tipo !='A'){
            return view('errors.403');
        }else {

            $this->validate($request, [
                'dni' => 'required|max:9|unique:users',
                'user' => 'required|max:10',
                'nombre' => 'required|max:50',
                'password' => 'required|min:6|confirmed',
                'tipo' => 'required',
            ]);

            try {

                $usuario = new User;
                $usuario->Dni = $request->get('dni');
                $usuario->user = $request->get('user');
                $usuario->password = bcrypt($request->get('password'));
                $usuario->Nombre = $request->get('nombre');
                $usuario->Tipo = $request->get('tipo');
                $usuario->save();

                \Session::flash('flash_message_ok', 'Profesor Registrado Correctamente');

                return Redirect::to('almacen/usuario');

            } catch (Exception $e) {

                \Session::flash('flash_message', 'Error al Registrar Profesor');

                return Redirect::to('almacen/usuario');

            }
        }
    }
    public function show($id){ 

       return view ('almacen.usuario.show',["usuario"=>User::findOrFail($id)]);

    }
    public function edit($id){

        return view ('almacen.usuario.edit',["usuario"=>User::findOrFail($id)]);

    }
    public function update(Request $request, $id){

        $this->validate($request, [
            'user' => 'required|max:10',
            'Dni' => 'required|max:9|unique:users',
            'Nombre' => 'required|max:50',
            'password' => 'required|min:6|confirmed',
            'tipo' => 'required',
        ]);

      try{
            $usuario = User::findOrFail($id);
            $usuario->dni=$request->get('Dni');
            $usuario->user=$request->get('user');
            $usuario->password=$request->get('password');
            $usuario->nombre=$request->get('Nombre');
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

        try{

            $usuario = DB::table('users')->where('id', '=', $id)->delete();

            \Session::flash('flash_message_ok','Profesor Eliminado Correctamente');

            return Redirect::to('almacen/usuario');

        }catch (Exception $e){

            \Session::flash('flash_message_ok','Error al Eliminar Profesor');

            return Redirect::to('almacen/usuario');

        }


    }
    public function verImportar()
    {
        return view('almacen.usuario.verImportar');
    }
    public function importar(Request $requet)
    {

        try {
            $usuario = new User;
            $usuario->Dni = '22725329H';
            $usuario->user = 'flindo';
            $usuario->password = bcrypt('123456');
            $usuario->Nombre = 'Francisco Lindo';
            $usuario->Tipo = 'P';
            $usuario->save();

            $usuario = new User;
            $usuario->Dni = '05031893E';
            $usuario->user = 'fbonilla';
            $usuario->password = bcrypt('123456');
            $usuario->Nombre = 'Francisco Bonilla';
            $usuario->Tipo = 'P';
            $usuario->save();

            $usuario = new User;
            $usuario->Dni = '17214322H';
            $usuario->user = 'mmegias';
            $usuario->password = bcrypt('123456');
            $usuario->Nombre = 'Manuel Megias';
            $usuario->Tipo = 'P';
            $usuario->save();

            $usuario = new User;
            $usuario->Dni = '99742605T';
            $usuario->user = 'agalan';
            $usuario->password = bcrypt('123456');
            $usuario->Nombre = 'Alonso Galan';
            $usuario->Tipo = 'P';
            $usuario->save();

            \Session::flash('flash_message_ok', 'Importacion Realizada Correctamente');

            return Redirect::to('almacen/usuario');

        } catch (Exception $e) {

            \Session::flash('flash_message', 'Error al Impotar los Datos');

            return Redirect::to('almacen/usuario');

        }

        /*$path = $requet->file('importar')->store('csv','public');

        //DB::table('users')->delete();
        $reader=\League\Csv\Reader::createFromPath(storage_path('app'. DIRECTORY_SEPARATOR. 'public'. DIRECTORY_SEPARATOR.$path));
        $reader->setDelimiter(';');
        $nombre_campos = $reader->fetchOne();
        $valores = $reader->fetchAssoc($nombre_campos);
        $primero = true;

        foreach ($valores as $fila){
            if(!primero) {
                DB::table('alumnos')->insert($fila);
            }else{
                $primero = false;
            }
        }
        return "iepaa";
        dd($reader->fetchAssoc());*/
        //DB::table('users')->insert($reader->fetchAssoc());
    }

}