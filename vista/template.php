<?php
//SESSION_START();

include ('controladores/procesos.php');
$tp=$_SESSION['tipoUsuario'];
$id=$_SESSION['identificador'];
//$cant=$_SESSION['cantidad'];


if ($tp == 1) {
  $tp='Administrador';
}

//validar si esta ingresando con sesion incorrecta
if (!$_SESSION) {
  header("location:index.php");
}


$cercas = mostrarCercas();
$verificar = count($cercas);
$var = array();
/*'{
  "type": "FeatureCollection",
  "features": []
}';*/
if ($verificar != 0) {

  foreach ($cercas as $row ) {

  array_push($var,$row['datos']);
  //$cant= $_SESSION['cantidad'];
  //print_r($var);


  }

   //Guardo los datos de la BD en las variables de php
/*   $var1 = $row['datos'];
  echo "eureca!!!";
  echo $var1;
  print_r($var1);
  print_r($cercas);
  // code...*/

}


/*
$conn=new Conexion();
$query="SELECT count(id_dispositivo) FROM dispositivos WHERE id_usuario_fk = '".$id."' ";
$result=$conn->executeQuery($query);
foreach ($result as $row ) {
  // code...

$_SESSION['cantidad'] = $row['count(id_dispositivo)'];
$cant= $_SESSION['cantidad'];

}
echo "   cantidad : " .$cant;
*/

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> UBI | Gps</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="vista/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vista/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vista/dist/css/AdminLTE2.min.css">




  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="vista/dist/css/skins/skin-greenn.min.css">

  <!--  formulario Select2 -->
  <link rel="stylesheet" href="vista/bower_components/select2/dist/css/select2.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">




   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css"
  integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ=="
  crossorigin=""/>



   <!-- estilos de leaflet para barra de  edicion -->
   <link rel="stylesheet" href="plugins/leaflet.pm-develop/leaflet.pm.css"/>
   <link  rel="stylesheet" href="plugins/Leaflet.CondensedAttribution-master/dist/leaflet-control-condended-attribution.css"/>



   <link rel="stylesheet" href="plugins/Leaflet.Basemaps-master/L.Control.Basemapps.css"/>

   <link rel="stylesheet" href="plugins/AmaranJS-0.5.4/dist/css/amaran.min.css">





</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper" onclick="resize();"> <!-- esta linea ejecuta la reduccion o amplicacion del mapa -->

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo" onclick="resize();">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>PS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Tracker</b>Gps</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" id="barra-izquierda"  onclick="b_i();">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->


  <!--////////////////// cabecera de icono de mensajes-->

          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 0 messages</li>


              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                    <!--  <div class="pull-left">
                        <!-- User Image -->
                    <!--    <img src="vista/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>

              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>

<!-- / inner menu: contains the messages -->
          <!-- /.messages-menu -->










          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>














          <!----------------------------------------------------------------------------------------------------------------------------------------------------->
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar" id="barra-derecha" onclick="b_d();" ><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>




<!----------------------------------  CONTENIDO DE LA BARRA DE MENU LATERAL--------------------------------------------------------------------------------------->



  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="vista/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> <?php echo "" .$tp; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i><?php echo $_SESSION['usuario']; ?></a>
        </div>
      </div>



      <!-- search form (Optional) --->
    <!--  <form action="#" method="get" class="sidebar-form">
      <!---   <div class="input-group">
      <!--     <input type="text" name="q" class="form-control" placeholder="Search...">
      <!--     <span class="input-group-btn">
      <!--         <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
        <!--       </button>
        <!--     </span>
    <!--     </div>
  <!--     </form>   -->
      <!-- /.search form -->




      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HERRAMIENTAS</li>
        <!-- Optionally, you can add icons to the links   fa fa-dashboard   fa fa-compass  fa fa-globe-->

        <li class="treeview active">
      <a href="#">
        <i class="fa fa-location-arrow"></i> <span>Home</span>

    </a>
    </li>



        <li class="treeview">
		  <a href="#">
		    <i class="fa fa-edit"></i> <span>Registros</span>
		    <span class="pull-right-container">
		      <i class="fa fa-angle-left pull-right"></i>
		    </span>
		</a>
		<ul class="treeview-menu">
		  <li><a href="vista\pages\formularios\add_device.php"><i class="fa fa-circle-o"></i> Dispositivos</a></li>
          <li><a href="vista\pages\formularios\add_user.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>

		</ul>
		</li>


        <li class ="treeview" >
		  <a href="#">
		    <i class="fa fa-map-marker"></i> <span>Mis Dispositivos <i class="label bg-green" style="margin-left: 15px;" id="aca_va" name="aca_va"></script></i></span>
            <span class="pull-right-container">
		      <i class="fa fa-angle-left pull-right"></i>
		    </span>
		  </a>
		<ul class="treeview-menu" style="max-height:160px;overflow-y: auto ;overflow-x: hidden;" id="list" >
		  <!--<li class="dropdown-submenu"><a href="#"><i class="fa fa-circle-o"></i> Flotas</a></li>-->
		 <!-- <li class="dropdown-submenu"><a href="#"><i class="fa fa-car"></i> chevrolet spark RKH10B</a></li>-->
     <!--style="max-height:100px;min-height:100px;overflow-y: scroll;overflow-x: hidden;" -->

      <!--    <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Todos</a></li>-->
		</ul>
		</li>

		  <li class="treeview">
          <a href="#"><i class="fa fa-map"></i> <span>Opciones de mapa</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
          <!--  <li ><a href="#"><i class="fa fa-circle-o"></i> Tema</a></li>-->
            <!--data-toggle="modal" data-target="#modal_geocercas" -->
            <li><a href="vista\pages\formularios\geocercas.php"  role="button"  ><i class="fa fa-circle-o" ></i> Geocercas</a></li>

			<li><a href="vista\pages\formularios\eventos.php"><i class="fa fa-circle-o"></i> Historial</a>
          </ul>
        </li>
<!--data-toggle="push-menu" -->
		<li class="treeview">
          <a href="#"><i class="fa fa-book"></i> <span>Documentacion</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="vista\pages\formularios\ayuda.php"><i class="fa fa-circle-o"></i> Ayuda</a></li>

          </ul>
        </li>
        <li>
         <a href="vista\pages\formularios\contacto.php">
           <i class="fa fa-commenting"></i> <span>Contacto</span>
       </a>
       </li>


      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>


<!----------------    CONTENIDO PRINCIAL DE LA PAGINA -------------------------------------------->




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--<section class="content-header">
      <h1>
        Rastreo satelital
        <small>seguimientro en vivo</small>
      </h1>
      <!-- Rounded switch -->


  <!--  </section>

    <!-- Main content -->
    <section class="content container-fluid">



      <!------------------------------------------------------------------------------------------------------------------------------------------------------------
        | Your Page Content Here |
        -------------------------->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- MAP & BOX PANE -->
            <div class="box">
            <!--  <div class="box-header with-border">
            <!--    <h3 class="box-title">Seguimiento</h3> <!-- aqui va el nombre deseado para la cabecera del mapa -->
            <!--      <small> tiempo real</small>

				 <div class="box-tools pull-center" >
				 <a id="text" style="display:none" ><h5>Nocturno!     -------------.<h5></a>
				 </div>
                <div class="box-tools pull-right" >

                  <label class="switch">

		          <input type="checkbox" id="modo" onclick="miTema()" >

                  <span class="slider round"></span>

                  </label>


                </div>-->





            <!--  </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-12 col-sm-8">
                    <div class="pad">



                      <!-- Map contiene el mapa de mapfit que sera creado aqui -->
                      <div id="map" style="height: 520px;">

					          <!------ archivos necesarios para cargar api de mapfit ----->


					  </div>

					  <!-------- mapa se cargara aca --------------------------------------------------------------------------->




                    </div>
                  </div>


                  <!-- /.col -->

				  <!--
                  <div class="col-md-3 col-sm-4">
                    <div class="pad box-pane-right bg-green" style="min-height: 200px">
                      <div class="description-block margin-bottom">


                        <span class="description-text"><strong>COORDENADAS</strong></span>
                        <div class="sparkbar pad" data-color="#fff">Lat: 90,70907078070</div>
                        <div class="sparkbar pad" data-color="#fff">Long: -40,709070758070</div>


                      </div>
                      <!-- /.description-block -->
                <!--      <div class="description-block margin-bottom">

                        <span class="description-text"><strong>Tipo:</strong>  Automovil</span>
                        <div class="sparkbar pad" data-color="#fff">Descripcion: chevrolet spark negro</div>
                        <h5 class="description-header">Placa: RXV500</h5>




                      </div>
                      <!-- /.description-block -->

                      <!-- /.description-block -->
                  <!--  </div>
                  </div>
				  -->




                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
      </section>
      <!-- /.content -->



      <!-- contenido del cuadro de dialogo para validar que no hay dispositivos-->





      <!-- /. cierre del contenido cuadro de dialogo -->




    </div>

    <!-- /.content-wrapper -->

<!---------------------------------------------------------------------------------------------------------------------------------------------------------------->



  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Version 1.0
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">UBI</a>.</strong> Todos los derechos reservados.
  </footer>



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="controladores/cerrarsesion.php">
              <h4 class="control-sidebar-subheading">
                Cerrar sesion

              </h4>


            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="vista/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="vista/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="http://buzinas.github.io/simple-scrollbar/simple-scrollbar.min.js"></script>


<!-- AdminLTE App -->
<script src="vista/dist/js/adminlte.min.js"></script>
<!--
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
-->

<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"
 integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg=="
 crossorigin=""></script>
<script  src="plugins/Leaflet.MovingMarker-master/MovingMarker.js"></script>

<!-- SCRIPT PARA LIBRERIA DE LEAFLET, PARA HACER MAPAS DINAMICOS -->
<script  src="plugins/leaflet.pm-develop/leaflet.pm.min.js"></script>


<script  src="plugins/Leaflet.CondensedAttribution-master/dist/leaflet-control-condended-attribution.js"></script>





<script src="plugins/Leaflet.Basemaps-master/L.Control.Basemapss-min.js"></script>
<!--<script src="plugins/Marker.Rotate.js"></script>-->


<!--<script src="plugins/Leaflet.RotatedMarker-master/leaflet.rotatedMarker.js"></script>-->


<!--<script src="vista/dist/js/mapa.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?AIzaSyBcUgd1rrJ_P_m2bFuSepcxb8FFw7zE2yU&callback=myMap"></script> <!--key  de api google maps -->
<!-- el siguiente script pertenece a la api de turf, para utilidades de geometrias en mapa -->
<script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
<script src="plugins/AmaranJS-0.5.4/dist/js/jquery.amaran.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>



 circle_coords = [];
 coords = [];

let people = [];
let  HERE_normalDay;
var mis_marcadores;
let item;
//let anterior = [];
var pru;
var cantidad_dispositivos = 0;
var misAutos = [];
var ejecucionXml = false;



var condicion = false;
var bar_izq = false;
var bar_der = false;
var angle = 0;
//var w = [];



let map = L.map('map', {
  condensedAttributionControl: false,
  //zoomSnap: 1.5,
  twoFingerZoom: true

   // don't include default, as we are setting options below
}).setView([3.4372201,-76.5224991], 6);//3.4372201,-76.5224991
//let myFilter = ['invert:77%','grayscale:56%','bright:88%','saturate:97%','sepia:28%'];

//L.marker([51.50915, -0.096112], { pmIgnore: true }).addTo(map);
mis_marcadores = L.layerGroup().addTo(map);
//var markers = L.MarkerClusterGroup();


// set custom emblem and prefix

/*
, {
  condensedAttributionControl: false // don't include default, as we are setting options below
}*/
L.control.condensedAttribution({
  emblem: '<div class="emblem-wrap"><img src="vista/dist/img/marcadores/question-mark.png" class="img-circle" /></div>',
  prefix: '<a href="https://www.route360.net/" title="Travel time analysis by Motion Intelligence">route360&deg;</a> | <a href="http://leafletjs.com" title="A JS library for interactive maps">Leaflet</a>'
}).addTo(map);

map.zoomControl.setPosition ('topright'); /// linea para ubicar la posicion del controlador de zoom


//var scheme = 'normal.night.grey';

var basemaps = [
L.tileLayer('https://{s}.{base}.maps.cit.api.here.com/maptile/2.1/{type}/{mapID}/{scheme}/{z}/{x}/{y}/{size}/{format}?app_id={app_id}&app_code={app_code}&lg={language}&ppi=250', {
attribution: 'Map &copy; 1987-2014 <a href="http://developer.here.com">HERE</a>',
subdomains: '1234',
mapID: 'newest',
app_id: 'bI8qS9hvczbJxOSBuMmg',
app_code: 'Zl9ok_j17Xqr0x7ATtwDPA',
base: 'base',//'base'
maxZoom: 20,
minZoom: 3,
type: 'mapnopttile',//'maptile'
language: 'eng',
format: 'png8',
scheme : 'normal.day.grey',
label: 'Gris',

size: '256'
}),



L.tileLayer('https://{s}.{base}.maps.cit.api.here.com/maptile/2.1/{type}/{mapID}/{scheme}/{z}/{x}/{y}/{size}/{format}?app_id={app_id}&app_code={app_code}&lg={language}', {
attribution: 'Map &copy; 1987-2014 <a href="http://developer.here.com">HERE</a>',
subdomains: '1234',
mapID: 'newest',
app_id: 'bI8qS9hvczbJxOSBuMmg',
app_code: 'Zl9ok_j17Xqr0x7ATtwDPA',
base: 'base',//'base'
maxZoom: 20,
minZoom: 3,
type: 'mapnopttile',//'maptile'
language: 'eng',
format: 'png8',
scheme : 'reduced.night',
label: 'Nocturno',


size: '256'
}),

L.tileLayer('https://{s}.{base}.maps.cit.api.here.com/maptile/2.1/{type}/{mapID}/{scheme}/{z}/{x}/{y}/{size}/{format}?app_id={app_id}&app_code={app_code}&lg={language}&style=flame&ppi=320', {
attribution: 'Map &copy; 1987-2014 <a href="http://developer.here.com">HERE</a>',
subdomains: '1234',
mapID: 'newest',
app_id: 'bI8qS9hvczbJxOSBuMmg',
app_code: 'Zl9ok_j17Xqr0x7ATtwDPA',
base: 'base',//'base'
maxZoom: 20,
minZoom: 3,
type: 'mapnopttile',//'maptile'
language: 'eng',
format: 'png8',
scheme : 'normal.day',
label: 'Normal',
size: '256'
}),


L.tileLayer('https://{s}.{base}.maps.cit.api.here.com/maptile/2.1/{type}/{mapID}/{scheme}/{z}/{x}/{y}/{size}/{format}?app_id={app_id}&app_code={app_code}&lg={language}', {
attribution: 'Map &copy; 1987-2014 <a href="http://developer.here.com">HERE</a>',
subdomains: '1234',
mapID: 'newest',
app_id: 'bI8qS9hvczbJxOSBuMmg',
app_code: 'Zl9ok_j17Xqr0x7ATtwDPA',
base: 'aerial',//'base'
maxZoom: 18,
minZoom: 3,
type: 'mapnopttile',//'maptile'
language: 'eng',
format: 'jpg',
scheme : 'satellite.day',
label: 'satelital',
size: '256'
}),

L.tileLayer('https://{s}.{base}.maps.cit.api.here.com/maptile/2.1/{type}/{mapID}/{scheme}/{z}/{x}/{y}/{size}/{format}?app_id={app_id}&app_code={app_code}&lg={language}', {
attribution: 'Map &copy; 1987-2014 <a href="http://developer.here.com">HERE</a>',
subdomains: '1234',
mapID: 'newest',
app_id: 'bI8qS9hvczbJxOSBuMmg',
app_code: 'Zl9ok_j17Xqr0x7ATtwDPA',
base: 'base',//'base'
maxZoom: 20,
minZoom: 3,
type: 'mapnopttile',//'maptile'
language: 'eng',
format: 'png8',
scheme : 'normal.night.grey',
label: 'Nocturno',


size: '256'
})
/*
L.tileLayer('https://{s}.{base}.maps.cit.api.here.com/maptile/2.1/{type}/{mapID}/{scheme}/{z}/{x}/{y}/{size}/{format}?app_id={app_id}&app_code={app_code}&lg={language}&style=fleet', {
attribution: 'Map &copy; 1987-2014 <a href="http://developer.here.com">HERE</a>',
subdomains: '1234',
mapID: 'newest',
app_id: 'bI8qS9hvczbJxOSBuMmg',
app_code: 'Zl9ok_j17Xqr0x7ATtwDPA',
base: 'aerial',//'base'
maxZoom: 20,
type: 'mapnopttile',//'maptile'
language: 'eng',
format: 'png8',
scheme : 'terrain.day',
label: 'Terrain',
size: '256'
})*/


];

map.addControl(L.control.basemaps({
  basemaps: basemaps,
  tileX:0,
  tiley:0,
  tileZ:1
}));

//normal.day.grey
//cambio_tema();
//https://{s}.base.maps.cit.api.here.com/maptile/2.1/maptile/newest/normal.day.grey/{z}/{x}/{y}/{256}/png8?app_id=bI8qS9hvczbJxOSBuMmg&app_code=Zl9ok_j17Xqr0x7ATtwDPA&lg=eng


//map.basemaps.control.setPosition('topright');


//tooggle.setPosition('buttonright'); /// linea para ubicar la posicion del controlador de zoom



//var pointing = turf.point([-76.487879,
//3.47421]);
//var buffered = turf.buffer(pointing, 500, {units: 'miles'});
//jsnBUOWLbuffer = turf.buffer(map.toGeoJSON(),0.3,'kilometer');
//lyrBUOWLbuffer = L.geoJSON(jsnBUOWLbuffer, {style:{color:'yellow',dashArray:'5,5',fillOpacity:0}}).addTo(map);



//js = new array();
var js=<?php echo json_encode($var); ?>;

for (var i = 0; i < js.length; i++) {
  //document.write("<br>"+js[i]);

  var obj = JSON.parse(js[i]);
  //console.log(obj);
  visualizar_cercas();
}


var puntos2;

function visualizar_cercas (){
puntos2 = L.geoJSON(obj, {
  style: function(feature) {
      switch (feature.geometry.type) {
          case 'Point': return {color: "#cce6ff",/*fillColor:'#cce6ff',*/weight: 1,Opacity:.25,fillOpacity:.20/*,dashArray:'5,5'*/};
          case 'Polygon':   return {color: "#cce6ff",weight: 1,Opacity:.25,fillOpacity:.20/*,dashArray:'5,5'*/};
      }
  },
  pointToLayer: function (feature, latlng) {

  //console.log(feature.geometry.coordinates);
  //var k = feature.geometry.coordinates;

 if(feature.geometry.type == 'Point'){

  //console.log(feature.geometry);
  //var m = JSON.stringify(feature.geometry, null, 2);
  //console.log(m);
     var circle = turf.circle(feature.geometry.coordinates, feature.properties.radius, {units:'meters'});
    circle_coords.push(feature);


    //f = circle;
    //w.push(feature.properties.radius);
    //console.log(k);
    //var circle = turf.buffer(feature.geometry, feature.properties.radius, {units:'meters'});
    //var result = turf.featurecollection(circle,feature.geometry);
    // circulo.push(feature.geometry.coordinates, feature.properties.radius, {units:'meters'});
     //console.log(circulo);

     return L.geoJSON(circle);
       /*, {style:{weight: 1,color:'#acac86',dashArray:'5,5',fillOpacity:.25}});*/

   }


},
filter: function(feature, layer) {

  switch (feature.geometry.type) {
      case 'Point': return true;
      case 'Polygon':   return true;
  }

},

  onEachFeature:  function (feature, layer) {
      //console.log(feature);

       //console.log(k);
  /*    if (feature.properties.popupContent != null) {
          layer.bindPopup(feature.properties.popupContent);
      }*/

        if (feature.geometry.type != 'Point') {
        //  console.log(feature.geometry.type);
          //console.log(feature);
          coords.push(feature);
        }

  }

});
map.addLayer(puntos2);


// Add events to marker


//////////////// evento para cambio de color de las geocercas ////////////////////
/*
   puntos2.on({
       // What happens when mouse hovers markers
       mouseover: function(e) {
           var layer_marker = e.target;
           layer_marker.setStyle({
               //radius: 8,
               //fillColor: "#FFFFFF",
               color: "#000000",
               weight: 1,
               opacity: .25,
               fillOpacity: .20
               //"#cce6ff",weight: 1,Opacity:.25,fillOpacity:.20
           });
       },
       // What happens when mouse leaves the marker
       mouseout: function(e) {
           var layer_marker = e.target;
           layer_marker.setStyle({
               //radius: 7,
               //fillColor: "#984ea3",
               color: "#cce6ff",
               weight: 1,
               opacity:.25,
               fillOpacity: .20
           });
       }
   // Close event add for markers
   });
   */

/*
var p = turf.points(point);
var search = turf.polygon(puntos2);
var ptsWithin = turf.pointsWithinPolygon(p,search);
console.log(ptsWithin);*/
}


var geoJsonLayer = L.geoJSON().addTo(map);




//map.zoomControl.setPosition ('topright'); /// linea para ubicar la posicion del controlador de zoom
config_mapa();

function downloadUrl(url, callback)
{
var request = window.ActiveXObject ?
new ActiveXObject('Microsoft.XMLHTTP') :
new XMLHttpRequest;

request.onreadystatechange = function() {
if (request.readyState == 4) {
request.onreadystatechange = doNothing;
callback(request, request.status);
//onsole.log(downloadUrl(url,callback));
setTimeout(function(){
        downloadUrl(url,callback);
        people.length = 0;

    }, 15000);
   }
};

request.open('GET', url, true);
request.send(null);


}

function doNothing(){

}

function config_mapa(){


 downloadUrl('controladores/datosXml.php', function(data)
 {
   var xml = data.responseXML;
   //window.alert('xml tiene un valor: ' +xml);
   var markers = xml.documentElement.getElementsByTagName('marker');

   if (!ejecucionXml) {
     //console.log('entro');
     mis_marcadores.clearLayers();
     misAutos.length = 0;
   }
   //console.log(!ejecucionXml);


   Array.prototype.forEach.call(markers, function(markerElem)
   {

    var  nombre = markerElem.getAttribute('nombre');
    var  tipo = markerElem.getAttribute('tipo');
    var  serie = markerElem.getAttribute('serie');
    var  fecha = markerElem.getAttribute('fecha');
    var  velocidad = markerElem.getAttribute('speed');
    var icono = markerElem.getAttribute('icono');


     var point = L.latLng([
         parseFloat(markerElem.getAttribute('lat')),
         parseFloat(markerElem.getAttribute('lng'))]);

//console.log(point);

var w ={

      name: nombre,
      latLng: point,
      id: serie,
      velocidad: velocidad,
      fecha: fecha

};

people.push(w)



var markerIcon = L.icon({

    iconUrl: 'vista/dist/img/marcadores/' + icono,

  //  shadowUrl: '.png',

  //  iconSize:     [38, 95], // size of the icon
  //  shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [16,35], // point of the icon which will correspond to marker's location
  //  shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [0, -35] // point from which the popup should open relative to the iconAnchor
});



//marker5 = L.Marker.movingMarker(mi_ruta,10000,{autostart: true},{icon : myIcon}).addTo(mapaEventos);

//console.log('vista/dist/img/marcadores/' + icono );
if (!ejecucionXml) {
//console.log('entro');

  if (tipo === 1) {
  myMarker = L.Marker.movingMarker([point],[],{icon: markerIcon,iconAngle: 90, serie: serie,tipo:tipo, nombre: nombre,riseOnHover: true}).bindPopup('<br><h4 align= center>'+nombre+'</h4><hr/><p><strong>velocidad: </strong>'+velocidad+' Km/h </br><strong>ultimo registro: </strong></br>'+fecha+'</br><strong>estado:</strong></p>').addTo(mis_marcadores);
  }
  myMarker = L.Marker.movingMarker([point],[],{icon: markerIcon, serie: serie,tipo:tipo, nombre: nombre,riseOnHover: true}).bindPopup('<br><h4 align= center>'+nombre+'</h4><hr/><p><strong>velocidad: </strong>'+velocidad+' Km/h </br><strong>ultimo registro: </strong></br>'+fecha+'</br><strong>estado:</strong></p>').addTo(mis_marcadores);
//console.log(L.Marker.prototype);
//console.log(myMarker);
misAutos.push(myMarker);
}

//console.log(w);
//console.log(myMarker._latlng);
//console.log(people.length);

//console.log(w);
//var prueba_iconos = document.getElementById('.leaflet-marker-icon');
//var prueba2_iconos = document.getElementById(options.icon);
//console.log(prueba_iconos);
//moveTo(latlng, duration);
//var marker4 = L.Marker.movingMarker([[10.375740208531, -75.47475191124]],2000,{autostart: true,loop: false},{icon: markerIcon}).addTo(mis_marcadores);

map.on("click", function(e) {
  //console.log(misAutos[3]._latlng.lat);
  //console.log(misAutos[3]._latlng.lng);
  //var myInitialBearing = geo.bearing(misAutos[3]._latlng.lat,misAutos[3]._latlng.lng,e.latlng.lat,e.latlng.lng);


  //misAutos[3].options.rotationAngle = 45;

//  console.log(misAutos[3].options);
  //misAutos[3].update();
//  misAutos[3].setIconAngle(myInitialBearing);

//  bearing(misAutos[3]._latlng.lat,misAutos[3]._latlng.lng,e.latlng.lat,e.latlng.lng);*/
//   console.log(e.latlng.lat);
  // console.log(e.latlng.lng);
   //bearing : function (lat1,lng1,lat2,lng2)
  //console.log(misAutos[3]);
  //marker4.moveTo(e.latlng, 5000);
  //console.log(marker4);
});



myMarker.on('dblclick', function(e) {
  //console.log(myMarker.getLatLng());
  var target = e.target;

//console.log(target);
        map.flyTo(target.getLatLng(), 15);
        setTimeout(function(){
            map.flyTo(target.getLatLng(), 14);
        }, 8000);


  //map.setView(myMarker.getLatLng(), 16);
  //  $(myMarker._icon).addClass('selectedMarker');
  //console.log(misAutos);
  //myMarker.moveTo(41.011, 28.986,3000);
  //myMarker.moveTo(latlng, 4000);
//  console.log(myMarker._zIndex);
 //myMarker.bringToFront();
  //myMarker.bringToFront();
});
//console.log(prueba2_iconos);
//console.log(misAutos);



      //map.setView([cities]);
      //museums.add(myMarker);
       //map.addLayer(myMarker);
      // map.setCenterWithLayer(museums, 90, 90 );
     //var informacion = mapfit.PlaceInfo();

     //myMarker.setPlaceInfo(informacion);
     //if (tipo != 1) {
     //myIcon.setIconUrl('sports');// fijar la categoria
   //}else {
    // myIcon.setIconUrl('auto');// fijar la categoria
   //}


/*




                                           ACA VA EL LOGARITMO PARA INGRESO Y EGRESO DE GEOCERCAS





*/


    //museums.add(myMarker);
     //map.addLayer(myMarker);
    // map.setCenterWithLayer(museums, 90, 90 );



    //var point = turf.point([1, 2]);
    //console.log(circulo);

    //turf.booleanWithin(point, line);
/*
    people.push =(
     {
       name:nombre,
       type:tipo,
       latLng:[41.011, 28.986],
       id:serie
     });
*/




   });


if (people.length == misAutos.length) {

  for (var i = 0; i <people.length; i++) {
//console.log(people[i].latLng.lat);
    //console.log(misAutos[i].options.rotationAngle);

     //rotationAngle: 0;

    if (!misAutos[i]._latlng.equals(people[i].latLng)) {
    //  console.log(misAutos[i]);
    ///  console.log(people[i]);

    var myInitialBearing = geo.bearing(misAutos[i]._latlng.lat,misAutos[i]._latlng.lng, people[i].latLng.lat,people[i].latLng.lng);
    //console.log(myInitialBearing);

    //misAutos[3].options.rotationAngle = 45;

  //  console.log(misAutos[3].options);
    //misAutos[3].update();
     misAutos[i].setIconAngle(myInitialBearing);

     misAutos[i].moveTo(people[i].latLng,5000);
     misAutos[i].on('end', function() {
            animarMarker();

     });

     //_rotate();

     //marker5.getPopup().setContent("<b>velocidad: </b>" + geo.properties.speed[lineIndex] + " km/h<br><b>tiempo: </b>" +geo.properties.time[lineIndex] + "");

    }

    misAutos[i].getPopup().setContent('<br><h4 align= center>'+people[i].name+'</h4><hr/><p><strong>velocidad: </strong>'+people[i].velocidad+' Km/h </br><strong>ultimo registro: </strong></br>'+people[i].fecha+'</br><strong>estado:</strong></p>');

    //misAutos[i].options.rotationAngle = misAutos[i].options.rotationAngle + 15;


//console.log(misAutos[i].options.rotationAngle);
  }
}else {
  location.reload();
}

/////////////////////////////////////////////////// GEOCERCAS

misAutos.forEach(autos => {
  var nombre = autos.options.nombre;
  //console.log(nombre);
  var punto = autos.toGeoJSON();
//  console.log(punto);

var pt = turf.point(punto.geometry.coordinates,{name:nombre});// esta contiene todos los puntos en mi mapa


 for (var i = 0; i < circle_coords.length; i++) {

    var poly_circle = turf.polygon(circle_coords[i]);
    var cor = poly_circle.geometry.coordinates.geometry.coordinates;
    var rad = poly_circle.geometry.coordinates.properties.radius;
    var nom = poly_circle.geometry.coordinates.properties.popupContent.toString();
    var search2 = turf.circle(cor,rad,{units:'meters'});

    if (turf.booleanPointInPolygon(pt, search2)) {

      //var mensaje = '<b>' + pt.properties.name.toLowerCase() + '</b> ingreso a la geocerca ' + nom;
      //console.log('este es mi mensaje : ' + mensaje);


        setTimeout(function(){

          $.amaran({'content'   :{

            'message': '<b>' + pt.properties.name.toLowerCase() + '</b> ingreso a la geocerca ' + nom
          },
            'delay'     :5000,
        //    'sticky'        :true,
            'closeOnClick'  :false,
            'inEffect'  :'slideRight',
            'position'  :'bottom right'
        //    'closeButton'   :true
      });

      });
//cadena = cadena.toLowerCase();

      //console.log("El dispositivo: " + pt.properties.name + " ingreso a la geocerca: " + nom);
    };


 }




for (var i = 0; i < coords.length; i++) {
var poly = turf.polygon(coords[i]);
if (turf.booleanPointInPolygon(pt, poly.geometry.coordinates)) {



  setTimeout(function(){

    $.amaran({'content'   :{

      'message': '<b>' + pt.properties.name.toLowerCase() + '</b> ingreso a la geocerca ' + poly.geometry.coordinates.properties.popupContent.toString()
    },
      'delay'     :5000,
  //    'sticky'        :true,
      'closeOnClick'  :false,
      'inEffect'  :'slideRight',
      'position'  :'bottom right'
  //    'closeButton'   :true
});

});
 //console.log("El dispositivo: " + pt.properties.name + " ingreso a la geocerca: " + poly.geometry.coordinates.properties.popupContent.toString());
};
}



});


//var ll = misAutos[0].toGeoJSON();
//console.log(ll);
//var l = myMarker.toGeoJSON();
//console.log(l);

//console.log(l);
    //myMarker.setIcon(myIcon); //asignar icono al marcador










   map.on("click", function(e) {

     //misAutos[3].moveTo(e.latlng, 5000);
     //console.log(e.latlng);
     //2.3065056838291094, lng: -75.73974609375001
     //{ lat: 1.4939713066293239, lng: -75.19042968750001
    //   lat: 2.152813583128846, lng: -74.04785156250001

    /* console.log(misAutos[3]._latlng.lat);
     console.log(misAutos[3]._latlng.lng);
      misAutos[3].moveTo(e.latlng, 20000);
      console.log(e.latlng.lat);
      console.log(e.latlng.lng);
      bearing(misAutos[3]._latlng.lat,misAutos[3]._latlng.lng,e.latlng.lat,e.latlng.lng);*/
     //console.log(misAutos[3]);
     //marker4.moveTo(e.latlng, 5000);
     //console.log(marker4);
   });






   let group = L.layerGroup(),
   //console.log(group);
       list = document.getElementById('list')
       //console.log(group);

       // Loop through the data
    people.forEach(person => {
       let marker = L.marker(person.latLng, {
             title: person.name,
             riseOnHover: true
           });
          // console.log(mis);
//console.log(myMarker);

       // Add each marker to the group
       group.addLayer( marker);

       // Save the ID of the marker with it's data
       person.marker_id = group.getLayerId(marker);
     });

     // Add the group to the map
   //group.addTo(map);

   function onClick(data) {

     var myTimer;

     //var myTimer;
     //myStopFunction();
     let { marker_id } = data,
         marker = group.getLayer(marker_id);
    // map.flyTo(marker.getLatLng(), 16);

     map.panTo( marker.getLatLng() );
     map.flyTo(marker.getLatLng(), 16);

      myTimer = setTimeout(function(){


         map.flyTo(marker.getLatLng(), 15.5);

     }, 4000);


    function myStopFunction() {
 clearTimeout(myTimer);
}
   }





   if (!condicion) {
    cantidad_dispositivos =  people.length;

    document.getElementById("aca_va").textContent = cantidad_dispositivos;
     // Append list items
     people.forEach(person => {




       item = document.createElement('li');
//aca
       item.innerHTML = `<a href="#"><i class="fa fa-circle-o"></i>${person.name}</a>`;
       item.addEventListener('click', onClick.bind(null, person));
      // anterior.push(item);

          list.appendChild(item);

     });
    condicion  = true;
//item.replaceChild(elmnt, item.childNodes[0]);
   }else {
     $(list).empty();
     //var element = document.getElementById('list');
    //  element.parentNode.removeChild(element);
     people.forEach(person => {




       item = document.createElement('li');
//aca
       item.innerHTML = `<a href="#"><i class="fa fa-circle-o"></i>${person.name}</a>`;
       item.addEventListener('click', onClick.bind(null, person));
      // anterior.push(item);

          list.appendChild(item);

     });
     //list.appendChild(item);
     //console.log('ya se cargo');
   }


//animarMarker();

//rotar();

ejecucionXml = true;

 });



}




map.on('load',function(){
  map.invalidateSize();
  alert('ya cargo');
});


 function resize(){
   map.invalidateSize();
   //map.fitBounds([[3.4372201, -76.5224991], [3.5372201, -76.6224991]]);
 }



function b_i(){
  bar_izq = !bar_izq;
if (bar_izq === true && bar_der === true) {
 document.getElementById("barra-derecha").click();
}
}
function b_d(){
  bar_der = !bar_der;
  if (bar_der === true && bar_izq === true) {
  document.getElementById("barra-izquierda").click();
  }
}




function animarMarker(){
  var inferior = -3;
  var superior = 3;
  var resAleatorio;

misAutos.forEach(autos => {



var item = autos;


  if (item.options.tipo == 1) {
  //  p.length = 0;    //console.log(item._leaflet_id);
    //var resAleatorio = Math.floor((Math.random() * (superior - inferior + 1)) + inferior);

   _rotate();

  }



  function _rotate() {



  item.setIconAngle(angle);
  angle = (angle + 0.5) % 180;
  //if (angle < 44) {
    setTimeout(_rotate, 200);
  //}



   //setTimeout(_rotate, 200);
 }

});
//setTimeout(function(){
//        prueba5();
      //  people.length = 0;

//    }, 5000);

};






var geo = {
       /**
        * Calculate the bearing between two positions as a value from 0-360
        *
        * @param lat1 - The latitude of the first position
        * @param lng1 - The longitude of the first position
        * @param lat2 - The latitude of the second position
        * @param lng2 - The longitude of the second position
        *
        * @return int - The bearing between 0 and 360
        */
       bearing : function (lat1,lng1,lat2,lng2) {
           var dLon = this._toRad(lng2-lng1);
           var y = Math.sin(dLon) * Math.cos(this._toRad(lat2));
           var x = Math.cos(this._toRad(lat1))*Math.sin(this._toRad(lat2)) - Math.sin(this._toRad(lat1))*Math.cos(this._toRad(lat2))*Math.cos(dLon);
           var brng = this._toDeg(Math.atan2(y, x));
           return ((brng + 360) % 360);
       },

      /**
        * Since not all browsers implement this we have our own utility that will
        * convert from degrees into radians
        *
        * @param deg - The degrees to be converted into radians
        * @return radians
        */
       _toRad : function(deg) {
            return deg * Math.PI / 180;
       },

       /**
        * Since not all browsers implement this we have our own utility that will
        * convert from radians into degrees
        *
        * @param rad - The radians to be converted into degrees
        * @return degrees
        */
       _toDeg : function(rad) {
           return rad * 180 / Math.PI;
       },
   };

   /** Usage **/





	</script>



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
