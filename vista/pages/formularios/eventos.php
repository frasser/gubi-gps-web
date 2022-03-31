<?php

include ('../../../controladores/procesos.php');


$tp=$_SESSION['tipoUsuario'];

$idUsu=$_SESSION['identificador'];
//$cant=$_SESSION['cantidad'];


if ($tp == 1) {
  $tp='Administrador';
}

//validar si esta ingresando con sesion incorrecta
if (!$_SESSION) {
  header("location:index.php");
}

//function fun(){
  //  echo "accion";
$dispositivos = mostrarDispositivos();
$verificar = count($dispositivos);
$var = array();
$json = json_encode($dispositivos);


/*if ($verificar != 0) {

  foreach ($dispositivos as $row ) {

  array_push($var,$row['nombre']);
  //array_push($var,$row['serie_dispositivo']);
  //$cant= $_SESSION['cantidad'];
  //print_r($var);


  }
}*/
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
if ($mi_consulta = $_POST['shape'])
  {

$datos=$mi_consulta;
$nombre_dispo = $datos['dispositivo'];
$fecha_ini = $datos['fecha1'];
$fecha_fin = $datos['fecha2'];
//print_r($datos['fecha2']);
//print(count($datos));
//if (count($datos)> 0) {
  //print('si hay datos');
  // code...
//}

//filtroEventos($nombre_dispo,$fecha_ini,$fecha_fin);
filtroEventos($datos);
//var_dump($correo);

}
}
/*'{
  "type": "FeatureCollection",
  "features": []
}';*/
/*if ($verificar != 0) {

print($verificar);
echo "<script>";
 echo "  window.onload=function() {rt();}";
 echo "</script>";
  /*foreach ($cercas as $row ) {
    echo "<script>";
     echo "  window.onload=function() {
    $('#modal_guia').modal({backdrop: 'static'});
    }";
     echo "</script>";

  array_push($var,$row['datos']);
  //$cant= $_SESSION['cantidad'];
  //print_r($var);
}*/
/*}else {
//  echo "no se encuentran registros";
 // echo '<script language="javascript">Nuevo();</script>';
//echo "<input type='button' value='Click' onload='Nuevo();'  onClick='Nuevo();' /><br>";
/*echo "<script>";
 echo "  window.onload=function() {
$('#modal_geocercas').modal({backdrop: 'static'});
}";
 echo "</script>";
*/
/*print('no hay');

}
}*/


/*
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  if (isset($_POST['texto'])) {
    // code...
    //echo "texto = " .$_POST['texto'];
    $pru=$_POST['texto'];
    echo "recibido = " .$pru;

    //exit();/* Para que no siga imprimiendo el resto*/

//  }
//echo "aca estoy";
//}











 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> UBI | Gps</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->

  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE2.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="../../dist/css/skins/skin-greenn.min.css">
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


<link rel="stylesheet" href="../../leaflet/leaflet.css"/>

<!--
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css"
  integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ=="
  crossorigin=""/>-->

   <!-- estilos de leaflet para barra de  edicion -->




    <link rel="stylesheet" href="../../../plugins/Leaflet.EasyButton-master/src/easy-button.css"/>

    <link  rel="stylesheet" href="../../../plugins/Leaflet.CondensedAttribution-master/dist/leaflet-control-condended-attribution.css"/>
    <link  rel="stylesheet" href="../../../plugins/Leaflet.Modal-master/dist/leaflet.modal.css"/>
    <link  rel="stylesheet" href="../../../plugins/flatpickr-master/flatpick.min.css"/>
    <!--<link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/dark.css"/>-->
    <!--<link  rel="stylesheet" href="../../../plugins/sweetalert-master/src/sweetalert.css"/>-->


    <style>
    .datetimeControl p {
        margin: 0;
        font-size: 16px;
    }
    .button2 {
      border-radius: 4px;

      border:1px solid gray;
      cursor: pointer;
text-align: center;
text-decoration: none;
outline: none;



box-shadow: 0 3px #999;
    }
    .button2:hover {background-color: #e6e6e6}

.button2:active {
  background-color: #e6e6e6;
  box-shadow: 0 5px #666;
  transform: translateY(1px);
}

.button:not(:last-child) {
  border-right: none; /* Prevent double borders */
}

.opacity{
  background-color:rgb(51, 51, 51);
 opacity:0.6;
 filter:alpha(opacity=60); /* IE < 9.0 */

}

.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 15px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #3e8e41;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #3e8e41;
  cursor: pointer;
}


  .my_polyline {
  stroke: #666633 ;
  fill: none;
  opacity: 0.5

}

.calendar-values {

    margin-top: 30px;
    margin-bottom: 30px;

}
.row {

    margin-right: -15px;
    margin-left: -15px;

}

.calendar-values .col {

    text-align: center;
    color: #888;

}
.col-xs-6, .col-sm-6, .col-md-6, .col-lg-6{

    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;

}
.calendar-values > .col-md-6 {

    border-right: 1px solid #eee;

}

.calendar-values .col .title {

    width: 100%;
    text-align: center;
    font-size: 15px;
    font-weight: bold;
    display: block;
    clear: both;
    text-transform: uppercase;

}
.calendar-values .col .value {

    width: 100%;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    display: block;
    clear: both;

}
.calendar-values .col .label {

    width: 100%;
    text-align: center;
    font-size: 14px;
    font-weight: bold;
    display: block;
    clear: both;
    text-transform: uppercase;
    color: #666;

}



  </style>


</head>
<!--
#003300 verde oscuro muy bueno

#00001a  azul
#666633  cafe oscuro
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
<body class="hold-transition skin-green sidebar-mini" >

<div class="wrapper" onclick="resize();"> <!-- esta linea ejecuta la reduccion o amplicacion del mapa -->

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="../../../principal.php" class="logo" onclick="resize();">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>PS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Tracker</b>Gps</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" id="barra-izquierda" onclick="b_i();"  >
        <span class="sr-only" >Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->


  <!--////////////////// cabecera de icono de mensajes-->


<!-- / inner menu: contains the messages -->
          <!-- /.messages-menu -->









          <!-- Notifications Menu -->

          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->



                <!-- Inner menu: contains the tasks -->

          </li>














          <!----------------------------------------------------------------------------------------------------------------------------------------------------->
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#"   data-toggle="control-sidebar" id="barra-derecha" onclick="b_d();"><i class="fa fa-gears"  ></i></a>
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
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
        <!-- Optionally, you can add icons to the links -->
        <li>
      <a href="../../../principal.php">
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
		  <li><a href="add_device.php"><i class="fa fa-circle-o"></i> Dispositivos</a></li>
          <li><a href="add_user.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>

		</ul>
		</li>




		  <li class="treeview active">
          <a href="#"><i class="fa fa-map"></i> <span>Opciones de mapa</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">

            <!--data-toggle="modal" data-target="#modal_mapaEventoscercas" -->
            <li><a href="geocercas.php"><i class="fa fa-circle-o"></i> Geocercas</a></li>

			<li class="active"><a href="#"><i class="fa fa-circle-o"></i> Eventos</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#"><i class="fa fa-book"></i> <span>Documentacion</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Ayuda</a></li>

          </ul>
        </li>
        <li>
         <a href="contacto.php">
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
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title" >Historial de eventos</h3> <!-- aqui va el nombre deseado para la cabecera del mapa -->




              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-12 col-sm-8">
                    <div class="pad">



                      <!-- Map contiene el mapa de mapfit que sera creado aqui -->


                      <div  id="map_eventos" style="height: 520px;margin-right: 5px;">
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

                <!--<div class="row">
                  <div class="col-md-12 col-sm-8">
                    <div class="pad">-->


                <!-------- mapa se cargara aca --------------------------------------------------------------------------->




              <!--      </div>
              <!--    </div>


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
                <!--</div>
                <!-- /.row -->


              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
      </section>
      <!-- /.content -->


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
            <a href="../../../controladores/cerrarsesion.php">
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
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>



<!--
<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"
 integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg=="
 crossorigin=""></script>-->

 <script src="../../leaflet/leaflet.js"></script>
<!-- SCRIPT PARA LIBRERIA DE LEAFLET, PARA HACER MAPAS DINAMICOS -->


<script src="../../../plugins/Leaflet.EasyButton-master/src/easy-button.js"></script>

<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>


<script  src="../../../plugins/Leaflet.CondensedAttribution-master/dist/leaflet-control-condended-attribution.js"></script>
<script  src="../../../plugins/Leaflet.MovingMarker-master/MovingMarker.js"></script>
<script  src="../../../plugins/LeafletPlayback-master/dist/LeafletPlayback.js"></script>
<script  src="../../../plugins/Leaflet.Modal-master/dist/Leaflet.Modal.js"></script>
<!--<script  src="../../../plugins/sweetalert-master/docs/assets/sweetalert/sweetalert.min.js"></script>-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script  src="../../../plugins/flatpickr-master/flatpickr.min.js"></script>
<script  src="../../../plugins/meses.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>-->



<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->



<!--<script src="vista/dist/js/mapa.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?AIzaSyBcUgd1rrJ_P_m2bFuSepcxb8FFw7zE2yU&callback=myMap"></script> <!--key  de api google maps -->


<script type="text/javascript">


//swal("Hello world!");

//let instance;
var fecha1;
var fecha2;
var my_details_in_json;
var bar_izq = false;
var bar_der = false;
var condiSlider = false;
var cordenadasCargadas ;
var condicional = false;
var js=<?php echo $verificar; ?>;
var dispos = <?php echo json_encode($json); ?>;
var mis_dispos = JSON.parse(dispos);
var serie ;
var nombre_dispo;
var condicional_modal = false;
var marker5;
var poli;
var bot_cambiar;
var toggle;





//var cor = [];

var nom;
//var seri;
//var fech = [];
var geo =  {
  type: 'Feature',
  geometry: {
    type: 'LineString',
    coordinates: []
  },
  properties: {
    title : '',
    "path_options" : { "color" : "red" },
    time: [],
    speed: [],
    altitude: []
  },
  bbox: []
  };

  var coords = geo.geometry.coordinates;
  var props = geo.properties;
  var time = props.time;
  var vel = props.speed;
//var geoJSON;
var t = 1;



var mi_valor;

//demoTracks = mtWashington;



let mapaEventos = L.map('map_eventos',{
  condensedAttributionControl: false // don't include default, as we are setting options below
}).setView([3.4372201,-76.5224991], 6);
//L.marker([51.50915, -0.096112], { pmIgnore: true }).addTo(map);
//var line = turf.lineString([[3.4372201, -76.5224991], [3.7372201, -78.5224991], [3.3372201, -70.5224991]]);
//var options = {units: 'miles'};

//var along = turf.along(line, 200, options);

var featureGroup = L.featureGroup().addTo(mapaEventos);
//var  drawItems = L.mapaEventosJson().addTo(mapaEventos);



var HERE_normalDay = L.tileLayer('https://{s}.{base}.maps.cit.api.here.com/maptile/2.1/{type}/{mapID}/{scheme}/{z}/{x}/{y}/{size}/{format}?app_id={app_id}&app_code={app_code}&lg={language}', {
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
label: 'Normal',
size: '256'
}).addTo(mapaEventos);




L.control.condensedAttribution({
  emblem: '<div class="emblem-wrap"><img src="../../dist/img/marcadores/question-mark.png" class="img-circle" /></div>',
  prefix: '<a href="https://www.route360.net/" title="Travel time analysis by Motion Intelligence">route360&deg;</a> | <a href="http://leafletjs.com" title="A JS library for interactive maps">Leaflet</a>'
}).addTo(mapaEventos);




mapaEventos.zoomControl.setPosition ('topright'); /// linea para ubicar la posicion del controlador de zoom
//accion();
/*var bot_cam = L.easyButton('<img src="../../dist/img/nut-icon.png">', function(btn, map){
abrirModal();
}).addTo(mapaEventos);
*/

//console.log(js);
if (js != 0){

abrirModal();

}else {
swal('no existen Dispositivos registrados!', {
buttons: false,
icon: "warning",
closeOnClickOutside: false,
timer: 5000,
});
}


 function resize(){
   mapaEventos.invalidateSize();

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


// =====================================================
// =============== Playback ============================
// =====================================================



// Playback options
var playbackOptions = {
    playControl: true,
    dateControl: true,
    sliderControl: true,
    sliderControlVel: false,
    popup:true,
    orientIcons:false,
    marker: function (featureData) {
                return {
                  //  icon: shipIcon

                    getPopup: function (feature) {
                        return "nombre" + feature.properties.title;


                    }
                };
            }
};





//t = L.Playback.Util.ParseGPX(geo);



/*{
    "type": "Feature",
    "geometry": {
      "type": "MultiPoint",
      "coordinates": cor,

    },
    "properties": {
      "title" : nom,
      "path_options" : { "color" : "blue" },
      "time": fech,

      "speed":vel,

      "altitude": [],
      "heading": [],
      "horizontal_accuracy": [],
      "vertical_accuracy": [],
      "raw": []
    },
    "bbox": []
  };*/





/////////////////////////////////////////////////////////////////////////////////////////

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

   }


};

request.open('GET', url, true);
request.send(null);

//console.log(geo);




}

function doNothing(){

}


function cargarXML(){
downloadUrl('../../../controladores/datosXmlEventos.php', function(data)
{
  var xml = data.responseXML;
  //window.alert('xml tiene un valor: ' +xml);
  var markers = xml.documentElement.getElementsByTagName('marker');


  Array.prototype.forEach.call(markers, function(markerElem)
  {
   var  nombre = markerElem.getAttribute('nombre');
   var  tipo = markerElem.getAttribute('tipo');
   var  serie = markerElem.getAttribute('serie');
   var  fecha = markerElem.getAttribute('fecha');
   var  velocidad = parseFloat(markerElem.getAttribute('speed'));


    var lat =  parseFloat(markerElem.getAttribute('lat'));
    var lon =  parseFloat(markerElem.getAttribute('lng'));


////////////////////////////////////////////////////////////
      /*  var coords = geo.geometry.coordinates;
        var props = geo.properties;
        var time = props.time;
        var vel = props.speed;*/
        //var name = props.title;
      //  var altitude = geojson.properties.altitude;

        coords.push([lat,lon]);
        time.push(fecha);
        vel.push(velocidad);
        props.title = nombre;
      //  altitude.push(ele);


      });



  //my_details_in_json = JSON.stringify(geo,null,2);
  //console.log(my_details_in_json);
               //console.log(my_details_in_json);
cordenadasCargadas = geo.geometry.coordinates;/*
condicional = !condicional;
/*enviar();
function enviar(callback){
	$.post("eventos.php", { dato: my_details_in_json }, function(data){

               callback(t);
	});
}*/


cargaEventos();

    });
  }

function cargaEventos(){
//  console.log(coords);
//console.log(condicional);
if (cordenadasCargadas.length > 0) {
   var mi_ruta = cordenadasCargadas;
   mapaEventos.fitBounds(mi_ruta);
   var myIcon = L.icon({
                           iconUrl: '../../dist/img/marcadores/customCar2.png',

     //  iconSize:     [36, 36], // size of the icon
       shadowSize:   [50, 64], // size of the shadow
       iconAnchor:   [22, 50], // point of the icon which will correspond to marker's location
       shadowAnchor: [4, 62],  // the same for the shadow
       popupAnchor:  [-3, -50] // point from which the popup should open relative to the iconAnchor

                       });
   //console.log(cordenadasCargadas.length);


   //console.log(JSON.stringify(mi_ruta,null,2));

   marker5 = L.Marker.movingMarker(mi_ruta,10000,{autostart: false,icon : myIcon}).addTo(mapaEventos);
console.log();
   var puntoInicial = L.circle(mi_ruta[0], {
    color: '#666633',
    fillColor: '#666633',
    fillOpacity: 0.5,
    opacity: 0.5,
    radius: 20
}).addTo(mapaEventos);

var puntoFinal = L.circle(mi_ruta[mi_ruta.length -1], {
    color: '#666633',
    fillColor: '#666633',
    fillOpacity: 0.5,
    opacity: 0.5,
    radius: 20
}).addTo(mapaEventos);


    bot_cambiar = L.easyButton('<img src="../../dist/img/nut-icon.png">', function(btn, map){
   abrirModal();
   openDatePicker();
   //uyuyu

   condicional_modal = true;


   });



    toggle = L.easyButton({
     states: [{
       stateName: 'repro',
       icon: '<img src="../../dist/img/play-sign.png">',
       title: 'reproducir',
       onClick: function(control) {
        control.state('pau');
        marker5.start();

        marker5.on('end', function() {
          marker5.getPopup().setContent("<b>velocidad: </b>" + geo.properties.speed[geo.properties.speed.length -1] + " km/h<br><b>tiempo: </b>" +geo.properties.time[geo.properties.time.length -1] + "");
          //'<b>' + geo.properties.title + '</b><br><center>presiona!   <img src="../../dist/img/play-sign.png"></center>'
          marker5.openPopup();

          setTimeout(function() {
              marker5.bindPopup('<b>punto final !</b>', {closeOnClick: false}).openPopup();
          }, 3000);
          setTimeout(function() {
              marker5.bindPopup('<b>' + geo.properties.title + '</b><br><center>presiona!   <img src="../../dist/img/play-sign.png"></center>', {closeOnClick: false}).openPopup();
             control.state('repro');
          }, 6000);


         //   marker5.bindPopup('<b>punto final !</b>', {closeOnClick: false})
           // .openPopup();

        });
/*
for (var i = 0; i < mi_ruta.length; i++) {
    marker5.addStation([i], 200);

    //console.log([i]);
}*/

          //marker5.closePopup();
        //  marker5.unbindPopup();







          //  marker5.closePopup();

        //  marker5.isRunning();







       }
     }, {
       icon: '<img src="../../dist/img/pause.png">',
       stateName: 'pau',
       onClick: function(control) {
       control.state('repro');
       marker5.pause();
         //console.log(marker5.getLatLng());
       marker5.bindPopup('<b>' + geo.properties.title + '</b><br><center>presiona!   <img src="../../dist/img/play-sign.png"></center>', {closeOnClick: false})
       .openPopup();




       },
       title: 'pausar'
     }]
   });
   toggle.addTo(mapaEventos).setPosition('bottomright');
   bot_cambiar.addTo(mapaEventos).setPosition('bottomright');




   marker5.on('start', function() {
     marker5.getPopup().setContent("<b>velocidad: </b>" + geo.properties.speed[0] + " km/h<br><b>tiempo: </b>" +geo.properties.time[0] + "");
     //'<b>' + geo.properties.title + '</b><br><center>presiona!   <img src="../../dist/img/play-sign.png"></center>'

     marker5.openPopup();
     //console.log('se esta moviendo');
     //mostrar_latlang();
   });








  poli = L.polyline(mi_ruta,{ className: 'my_polyline' }).addTo(mapaEventos);
       marker5.bindPopup('<b>' + geo.properties.title + '</b><br><center>presiona!   <img src="../../dist/img/play-sign.png"></center>', {closeOnClick: false});
       marker5.openPopup();










function mostrar_latlang(){


  if (marker5.isRunning()) {
    //console.log(contador_paradas);
    var k = marker5.getLatLng();
    //console.log(this._currentIndex);
    //console.log(geo);
    //console.log(this.pointIndex);
    //marker5.addStation(1, 2000);
    //  console.log(marker5.getLatLng());
    //  marker5.getPopup().setContent("<b>Loop: " + k + "</b>")
    //  marker5.openPopup();
  }


//  Object { lat: 3.4853784466930944, lng: -76.5278277688746 }
/*  if (marker5.getLatLng().equals([3.4853784466930944,-76.5278277688746])) {
      marker5.bindPopup('son iguales !');
      marker5.openPopup();
  }*/

setTimeout(function() {
  // Stop the animation
  mostrar_latlang();
}, 100);
}








}else {

  swal("No se encontraron registros para cargar de este dispositivo!.\nIntenta con otro rango de fechas", {
buttons: false,
icon: "warning",
closeOnClickOutside: false,
timer: 6000,
});
//  alert('No se encontraron registros para cargar de este dispositivo!.\nIntenta con otro rango de fechas');

  $('daterangepicker').remove();
  //$('flatpickr').remove();
  //instance.clear();

  serie = null;
  fecha1 = null;
  fecha2 = null;
  condicional_modal = false;
abrirModal();
openDatePicker();
//$("#daterange-btn").daterangepicker();
}




  //  L.DomEvent
    //.on(document.querySelector('.open-modal-custom'), 'click', function() {

  //  })

//mapaEventos.fitBounds(mi_ruta);
/*var tillicum = {
  "type": "Feature",
  "geometry": {
    "type": "lineString",
    "coordinates": [
      [
          -76.491099,
          3.48861
        ],
        [
          -76.546984,
          3.483693
        ],
        [
          -76.489434,
          3.473348
        ]
    ]
  },
  "properties": {
    "time": [
      //1369786338000,
      //1369786340000,
      //1369786342000
      //2018-06-20 15:07:10,
      //2018-11-14 10:47:03",
      //"2018-11-14 10:55:07"
      1529525230,
      1542210423,   //1542192423
      1542210907
    ],
    "speed": [
      40,
      1,
      70
    ],
    "altitude": [
      49,
      50,
      -10
    ],
    "heading": [
      0,
      0,
      0
    ],
    "horizontal_accuracy": [
      87,
      79,
      54

    ],
    "vertical_accuracy": [

    ],
    "raw": []
  },
  "bbox": [
    [
      -124.09386637,
      44.34348063
    ],
    [
      -124.09386637,
      44.56531305
    ],
    [
      -123.26148271,
      44.34348063
    ]
  ]
};


  playback = new L.Playback(mapaEventos, geo, null, playbackOptions);*/

};
  /*  function boton(){
    	enviar(function(t){
                    console.log(my_details_in_json);
                  });

    }*/

   //ejercer();

      //console.log(my_details_in_json);
    //var playback = new L.Playback(mapaEventos,geo, null, playbackOptions);
  //  var playback = new L.Playback(mapaEventos,my_details_in_json, null, playbackOptions);





    //var velo = playbackOptions.sliderControlVel;
    $('#bot').click(function(){
    //console.log('buttonClicked');

    condiSlider = !condiSlider;

    var playbackOptions = {

        sliderControlVel: condiSlider

    };

    if (playbackOptions.sliderControlVel) {
      //console.log(playbackOptions.sliderControlVel);
      playback = new L.Playback(mapaEventos, null, null, playbackOptions);
    }else {
      //console.log('remover');
      //console.log(playback);
      //console.log(playback.sliderControlVel);
      //console.log();
      $('#velocidad').hide();
      //mapaEventos.removeControl(playback.sliderControl);
    }

    //mapaEventos.removeControl(playbackOptions.sliderControlVel);

     //mapaEventos.removeControl(playbackOptions.sliderControlVel);
    });
    /*
    var slider = document.getElementById("sli");
    console.log(slider.value);
    var output = document.getElementById("velocidad");
    console.log(output);
    output.innerHTML = slider.value;

    slider.oninput = function() {
      output.innerHTML = this.value;
    }


    */




function abrirModal(){
  //var nombre;
  //for (var i = 0; i < dispos.length; i++) {
  //nombre = dispos[i];


  mapaEventos.fire('modal', {
    title: 'Filtro de busqueda',
    title2: 'seleccione rango de fecha',
    content1: '<div class="modal-header"><h5>PARAMETROS</h5></div>',
    contentFechas: '<div>fechas</div>',
    contentDispo: '<p><b style="font-size: 13px;">Seleccione Dispositivo</b></p><select class="form-control select2" style="max-height:117px; name="list" id="list"><option  selected="selected" value="default">Seleccione</option></select>',
    template: [//'<div class="modal-header"><h3>{title}</h3></div>',
    //  '<hr>',
      //'<div class="modal-body" id="aca">{content1}</div>',


      '<div class="input-group">',
                      '<div class="input-group-btn">',
                      '<button type="button" class="btn btn-primary btn-md pull-Left"  id="daterange-btn" >',
                      '<span></span>',
                      '<i class="fa fa-calendar">&nbsp;&nbsp;&nbsp;</i>',
                      '<i class="fa fa-caret-down"></i>',
                      '</button>',
                      '</div>',

                      '<input type="text" class="form-control flatpickr-input" id="entrada" name="entrada" readonly="readonly"  style="padding: 2px 5px;font-size: 13px;">',
                    '</div>',


      '<div class="calendar-values row">',
    '<div class="col col-md-6 start-date"> <span class="title">Fecha Inicial</span> <span class="value text-color" name="diaIni" id="diaIni" ></span> <span class="label text-color" name="mesIni" id="mesIni"></span><span name="anoIni" id="anoIni"><small><small></span> </div>',
    '<div class="col col-md-6 end-date"> <span class="title">Fecha Final</span>  <span class="value text-color" name="diaFin" id="diaFin" ></span> <span class="label text-color" name="mesFin" id="mesFin"></span><span name="anoFin" id="anoFin"><small><small></span> </div>',
  '</div>',
      '<div class="modal-body">{contentDispo}</div>',
      '<div class="modal-footer">',
      '<button class="btn btn-primary btn-md {OK_CLS}" id="ko">{okText}</button>',
      '<button class="btn btn-flat btn-md {CANCEL_CLS}">{cancelText}</button>',
      '</div>'
    ].join(''),

    okText: 'Ok',
    cancelText: 'Cancelar',
    OK_CLS: 'modal-ok',
    CANCEL_CLS: 'modal-cancel',

    width: 330,
    height:450,

    ///  width: 330,
  ///    height:500,

    onShow: function(evt) {
      var modal = evt.modal;
      L.DomEvent
        .on(modal._container.querySelector('.modal-ok'), 'click', function() {

          confirmar();



           //modal.closeModal();
          // mapaEventos.closeModal();


        })
        .on(modal._container.querySelector('.modal-cancel'), 'click', function() {
        //  alert('You pressed cancel');
        if (condicional_modal) {
          modal.hide();
        }

        //mapaEventos.closeModal();
      });
    }

  });


///<div  style="visibility: hidden;margin: 0;"><span id="link">${person.serie_dispositivo}</span></div>
//}
 //list = document.getElementById('list');
 //list.addClass('lista');
 // Append list items
 mis_dispos.forEach(person => {
   $("#list").append('<option value="' + person.serie_dispositivo + '">' + person.nombre + '</option>');


    });
    openDatePicker();
}





function openDatePicker(){

$("#daterange-btn").daterangepicker(
  {
   //autoUpdateInput: true,
   opens: "right",
   parentEl:"modal",
   //drops:"",
    ranges   : {
      'Hoy'       : [moment(), moment().add(1,'days')],
      'Ayer'   : [moment().subtract(1, 'days'), moment()],
      'Ultimos 7 dias' : [moment().subtract(6, 'days'), moment()],
      'Ultimos 30 dias': [moment().subtract(29, 'days'), moment()],
    //'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Mes pasado'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment().subtract(29, 'days'),
    endDate  : moment()

  },
  function (start, end) {
    //$('.flatpickr-input').val("");
    $("#entrada").val(start.format('MMMM D,YYYY') + '-' + end.format('MMMM D,YYYY'));
    $('.flatpickr-input').val(start.format('MMMM D,YYYY') + '-' + end.format('MMMM D,YYYY'));
    //  console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  //  $('.entrada').html(start.format('MMMM D,YYYY') + '-' + end.format('MMMM D,YYYY'))
    fecha1 = start.format('YYYY-MM-DD');
    fecha2 = end.format('YYYY-MM-DD');


    $('#diaIni').text(start.format('DD'));
    var month1 = dameMes(start.format('MM')) //x obtiene el valor 16
    $('#mesIni').text(month1.toString());
    $('#anoIni').text(start.format('YYYY'));
 ///////////////////////////////////////////////////////////////////////////////////////////////////
     $('#diaFin').text(end.format('DD'));
     var month2 = dameMes(end.format('MM')) //x obtiene el valor 16
     $('#mesFin').text(month2.toString());
     $('#anoFin').text(end.format('YYYY'));



  }
)
var select = document.getElementById('list');

select.addEventListener('change',function(){
  console.log('cambio');
serie = select.value;
nombre_dispo = select.options[select.selectedIndex].innerText;;


});
}

function openCalendar() {
instance =  flatpickr('#entrada', {
mode: "range",
minDate: "2018-12-10",
maxDate: "today",
dateFormat: "Y-m-d",
conjunction: " :: ",
clickOpens : false,
altInput: true,
altFormat: "F j, Y",

//ariaDateFormat : "M j, Y",
//  dateFormat:
onChange: function(selectedDates, dateStr, instance) {
//...
//console.log(dateStr);
//console.log(selectedDates);
//console.log('cambio');
},
onOpen: [
function(selectedDates, dateStr, instance){
    //...
    console.log('se abrio');



},
function(selectedDates, dateStr, instance){
    //...
}
],
onClose: function(selectedDates, dateStr, instance){
// ...
//console.log(selectedDates.length);
if (selectedDates.length > 1) {

 var pru = dateStr
 var separador = " - ";
 var limite = 2;
 var arregloDeSubCadenas = pru.split(separador,limite)
 fecha1 = arregloDeSubCadenas[0];
 fecha2 = arregloDeSubCadenas[1];


$('#diaIni').text(selectedDates[0].getUTCDate().toString());
var month1 = dameMes(selectedDates[0].getMonth()+1) //x obtiene el valor 16
$('#mesIni').text(month1.toString());
$('#anoIni').text(selectedDates[0].getFullYear().toString());
///////////////////////////////////////////////////////////////////////////////////////////////////
 $('#diaFin').text(selectedDates[1].getUTCDate().toString());
 var month2 = dameMes(selectedDates[1].getMonth()+1) //x obtiene el valor 16
 $('#mesFin').text(month2.toString());
 $('#anoFin').text(selectedDates[1].getFullYear().toString());

}




}
});

instance.open();
}








function confirmar(){

  console.log(fecha1);
  console.log(fecha2);
  console.log(serie);

  if (fecha1 != null && fecha2 !=null && serie !=null ) {


swal({
//  title: "Are you sure?",
  text: "Desea realizar consulta del dispositivo: " + nombre_dispo + '\nentre: ' + fecha1 + ' y ' + fecha2 + '. ?',
//  icon: "warning",
  buttons: true,
  successMode: true,
  closeOnClickOutside: false,
})
.then((willDelete) => {
  if (willDelete) {
  /*  swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });*/

          if (condicional_modal) {
            marker5.remove();
            poli.remove();
            coords.length=0;
            time.length=0;
            vel.length=0;
            props.title = null;
            cordenadasCargadas = null;
            bot_cambiar.remove();
            toggle.remove();
          }


          var parametros = {
                  "dispositivo" : serie,
                  "fecha1" : fecha1 ,
                  "fecha2": fecha2
              };
    //console.log(parametros);



            $.ajax({
            		url: "eventos.php",
            		type: "POST",
            		data: {shape: parametros} ,
                success: function(data){
                  console.log('se envio dato por ajax');
                  //mapaEventos.modal.destroy();
                  //modal.destroy();
                  mapaEventos.modal.hide();
                  $('daterangepicker').remove();
                  limpiar_campos();

                  cargarXML();

                }

            	});
  } else {
  //  swal("Ingrese rango de fecha y seleccione dispositivo!");
  //  serie = null;
  //  fecha1 = null;
  //  fecha2 = null;
  }
});


    //if (confirm("Se realizara consulta del dispositivo:" + nombre_dispo + '\nentre:' + fecha1 + ' y ' + fecha2 + '.\nconfirma?')) {



    // }
  }else {
    swal("Ingrese rango de fecha y seleccione dispositivo!", {
  buttons: false,
  timer: 4000,
});

  limpiar_campos();


  }

}




function limpiar_campos(){
  serie = null;
  fecha1 = null;
  fecha2 = null;
  $("#entrada").val("");
  $('.flatpickr-input').val("");
  $('#diaIni').text("");
  $('#mesIni').text("");
  $('#anoIni').text("");
   $('#diaFin').text("");
   $('#mesFin').text("");
   $('#anoFin').text("");
   $("#list").val("default").change();
}








	</script>



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
