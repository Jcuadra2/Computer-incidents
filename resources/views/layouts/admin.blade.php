<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Incidencias EVG</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/b-1.2.2/b-html5-1.2.2/b-print-1.2.2/r-2.1.0/datatables.min.css')}}"/>


  </head>
  <body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="/home" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>C</b>I</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Computer Incident!</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-green">Online</small>
                  <span class="hidden-xs">{{\Illuminate\Support\Facades\Auth::user()->Nombre}}</span> <!--Referencia al usuario logeado-->
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                     {{\Illuminate\Support\Facades\Auth::user()->Nombre}}
                      </br>
                      @if(\Illuminate\Support\Facades\Auth::user()->Tipo == "A")
                        Administrador
                      @else
                        Profesor
                      @endif
                      <small></small> <!--Información del usuario logeado-->
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <form method="POST" action="{{url("/logout")}}">
                        {{csrf_field()}}
                    <input type="submit" class="btn btn-default btn-flat" value="Cerrar">
                    </form>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            @if(\Illuminate\Support\Facades\Auth::User()->Tipo =='A')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Profesores</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/almacen/verImportar"><i class="fa fa-square-o"></i> Importar Datos</a></li>
                <li><a href="/almacen/usuario"><i class="fa fa-square-o"></i> Listado</a></li>
              </ul>
            </li>
            @endif
            @if(\Illuminate\Support\Facades\Auth::User()->Tipo =='A')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-building"></i>
                <span>Ubicaciones</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/almacen/ubicacion/create"><i class="fa fa-square-o"></i> Registrar</a></li>
                <li><a href="/almacen/ubicacion"><i class="fa fa-square-o"></i> Listado</a></li>
              </ul>
            </li>
            @endif
            @if(\Illuminate\Support\Facades\Auth::User()->Tipo =='A')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Equipos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/almacen/equipo/create"><i class="fa fa-square-o"></i> Registrar</a></li>
                <li><a href="/almacen/equipo"><i class="fa fa-square-o"></i> Listado</a></li>
              </ul>
            </li>
            @endif
            @if(\Illuminate\Support\Facades\Auth::User()->Tipo =='A')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-plug"></i>
                <span>Gadgets</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/almacen/gadget/create"><i class="fa fa-square-o"></i> Registrar</a></li>
                <li><a href="/almacen/gadget"><i class="fa fa-square-o"></i> Listado</a></li>
              </ul>
            </li>
            @endif
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Incidencias</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/almacen/enviar"><i class="fa fa-square-o"></i> Crear</a></li>
                <li><a href="/almacen/listar"><i class="fa fa-square-o"></i> Listado</a></li>
                
              </ul>
            </li>
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Imprimir Listado</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <!--<li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>-->
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Incidencias</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2016-2020 <a href="">Jcuadra2</a>.</strong> All rights reserved.
      </footer>

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    <!-- DataTable -->
    <script src="{{asset('https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/b-1.2.2/b-html5-1.2.2/b-print-1.2.2/r-2.1.0/datatables.min.js')}}"></script>

    <script>
        $(document).ready(function() {
          setTimeout(function() {
          $(".alert").fadeOut(1500);
          },3000);
        });
    </script>
    <script>
      $(document).ready(function() {
        $("#datos_incidencia").DataTable({
          paging: false,
          searching: false,

          dom: 'Bfrtip',
          buttons: [
            'pdf'
          ]
        });
      } );
    </script>
  @yield("script")
  </body>
</html>
