<?php

namespace Incidencias\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Exception;
use DB;

class PrincipalController extends Controller
{
    public function __construct(){

    	$this->middleware('auth');
    }
    public function index(){
    		
		
   		return view('almacen.principal.index');

    }
}