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
  header("location:../../../index.php");
}
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
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
if ($geo = $_POST['shape_db'])
  {

$datos=$geo;

guardarCercas($idUsu,$datos);

//var_dump($correo);

}
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
    echo "<script>";
     echo "  window.onload=function() {
    $('#modal_guia').modal({backdrop: 'static'});
    }";
     echo "</script>";

  array_push($var,$row['datos']);
  //$cant= $_SESSION['cantidad'];
  //print_r($var);
   }
}else {
//  echo "no se encuentran registros";
 // echo '<script language="javascript">Nuevo();</script>';
//echo "<input type='button' value='Click' onload='Nuevo();'  onClick='Nuevo();' /><br>";
echo "<script>";
 echo "  window.onload=function() {
$('#modal_geocercas').modal({backdrop: 'static'});
}";
 echo "</script>";



}

   //Guardo los datos de la BD en las variables de php
/*   $var1 = $row['datos'];
  echo "eureca!!!";
  echo $var1;
  print_r($var1);
  print_r($cercas);
  // code...*/



// Operaciones con la BD en función de los datos recibidos





  /*
  $json_string = mysql_real_escape_string( $json_string);
  $sql = sprintf("UPDATE mytable
    SET field_json = '$json_string'
    WHERE id = $userid");
$result = mysql_query($sql);
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

  <link rel="stylesheet"  href="../../dist/css/customPop.css">
  <link href="../../dist/css/modal.css" type="text/css" rel="stylesheet"> <!-- estilos de modal -->
<link href="../../dist/css/w3cSchoolSlider.css" type="text/css" rel="stylesheet"> <!-- estilos guia con slides -->


  <!--  formulario Select2 -->
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
   <link rel="stylesheet" href="../../../plugins/leaflet.pm-develop/leaflet.pm.css"/>

   <link rel="stylesheet" href="../../../plugins/leaflet-icon-pulse-master/dist/L.Icon.Pulse.css"/>

    <link rel="stylesheet" href="../../../plugins/Leaflet.EasyButton-master/src/easy-button.css"/>

    <link  rel="stylesheet" href="../../../plugins/Leaflet.CondensedAttribution-master/dist/leaflet-control-condended-attribution.css"/>




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

            <!--data-toggle="modal" data-target="#modal_geocercas" -->
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Geocercas</a></li>

			<li><a href="eventos.php"><i class="fa fa-circle-o"></i> Historial</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#"><i class="fa fa-book"></i> <span>Documentacion</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="ayuda.php"><i class="fa fa-circle-o"></i>Ayuda</a></li>

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
                <h3 class="box-title" >EDITOR DE GEOCERCAS</h3> <!-- aqui va el nombre deseado para la cabecera del mapa -->




              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-12 col-sm-8">
                    <div class="pad">



                      <!-- Map contiene el mapa de mapfit que sera creado aqui -->


                      <div class="popupCustom" id="editar" style="height: 520px;">
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

      <!-- contenido del cuadro de dialogo para validar que no hay dispositivos-->
      <div class="modal fade" id="modalNuevaGeo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" onclick="retirar();" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Caracteristicas</h4>
            </div>
            <form role="form" action="" name="frmDispositivo" method="post" >
              <div class="col-lg-12">

                <!--<div class="row">
                  <div class="col-md-6">-->

                <div class="form-group">
                  <label>Detalles</label>
                  <input name="descrip" class="form-control" placeholder="Ejemplo: zona vecindario" required>
                </div>
           <!-- /.form-group -->

                <div class="form-group">
                  <label>notificaciones</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Ambas</option>
                    <option>Entrada</option>
                    <option>Salida</option>


                  </select>
                </div>


                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">

                <!-- /.form-group -->
                <div class="form-group">
                  <label>Icono</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Por defecto</option>
                    <option>Hogar</option>
                    <option>Compañia</option>
                    <option>Edificio</option>
                    <option>Universidad</option>
                    <option>Parqueadero</option>
                  </select>
                </div>
                <!-- /.form-group -->
                <button type="submit" class="btn btn-success btn-md" name="guardar">
                  <span class="glyphicon glyphicon-check" aria-hidden="true"></span> Guardar
                </button>
                <button  onclick="retirar();"  data-dismiss="modal" class="btn btn-danger btn-md" name="salir">
                  <span class="fa fa-close" aria-hidden="true"></span> Cancelar
                </button>









              </div>
            </form>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>

      <!-- /. cierre del contenido cuadro de dialogo -->


      <!-- contenido del cuadro de dialogo para validar que no hay dispositivos-->
      <div class="modal fade" id="modal_geocercas" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button"  class="close" data-dismiss="modal"   aria-hidden="true">&times;</button>
              <h4 class="modal-title">Editor</h4>
            </div>
            <form role="form" action="" name="frmGeo" method="post" >
              <div class="col-lg-12">
                <h4>Bienvenido al <strong>editor de geocercas</strong> </h4>
                <h5>Ahora tienes a tu disposicion un panel de dibujo para realizar graficos en tu mapa.<br>
                selecciona entre diseño con poligonos o circunferencias para fijar cercas geograficas en tu ciudad<br>
                que permitan la gestion de notificaciones al ingresar o salir un dispositivo <strong>UBI</strong> de un determinado radio de distancia. </h5>

                <button type="button"  onclick="Dialogo_guia();" class="btn btn success btn-md" class="close" data-dismiss="modal" aria-hidden="true" >
                  <span class="glyphicon glyphicon-start" aria-hidden="true"></span> ¡Entendido!
                </button>


              </div>
            </form>
            <div class="modal-footer">
            <!--  <button type="submit" class="btn btn-primary btn-md" name="enviar">
                <span class="glyphicon glyphicon-check" aria-hidden="true"></span> Registrar
              </button>-->
              <!--<button type="button" class="btn btn-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i></button>-->
            </div>
          </div>
        </div>
      </div>

      <!-- /. cierre del contenido cuadro de dialogo -->


            <!-- contenido del cuadro de dialogo para validar que no hay dispositivos-->
            <div class="modal fade" id="modal_guia" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button"  onclick="resize();" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <!--  <h4 class="modal-title">Editor</h4>-->
                  </div>
                  <form role="form" action="" name="frmGuia" method="post" >


                    <div class="w3-content w3-display-container" style="max-width:800px">
                      <img class="mySlides" src="../../dist/img/gift/principalGeos.gif" style="width:100%;">
                      <div class="text" style="display: block; ">Selecciona una herramienta del panel.</div>
                      <img class="mySlides" src="../../dist/img/gift/polyGeos.gif" style="width:100%">
                      <div class="text" style="display: none;" >Realiza multiples puntos con poligono.</div>
                      <img class="mySlides" src="../../dist/img/gift/circuloGeos.gif" style="width:100%">
                      <div class="text" style="display: none; ">Pulsa y define el radio de distancia de una circunferencia.</div>
                      <img class="mySlides" src="../../dist/img/gift/eliminarGeos.gif" style="width:100%">
                      <div class="text" style="display: none;">Para eliminar, pulsa sobre la circunferencia o poligono que deseas remover.</div>

                      <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                        <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                        <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
                        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
                        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
                        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(4)"></span>
                      </div>
                    </div>

      <!--
                      <h2>Editor de geocercas</h2>
        <p></p>-->
<!--
        <div class="slideshow-container">

        <div class="mySlides fade">
          <div class="numbertext">1 / 4</div>
          <img src="../../dist/img/gift/principalGeos.gif" style="width:100%">
          <div class="text">Selecciona una herramienta del panel.</div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">2 / 4</div>
          <img src="../../dist/img/gift/polyGeos.gif" style="width:100%">
          <div class="text">Realiza multiples puntos con poligono.</div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">3 / 4</div>
          <img src="../../dist/img/gift/circuloGeos.gif" style="width:100%">
          <div class="text">Pulsa y define el radio de distancia de una circunferencia.</div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">4 / 4</div>
          <img src="../../dist/img/gift/eliminarGeos.gif" style="width:100%">
          <div class="text">Para eliminar, pulsa sobre la circunferencia o poligono que deseas remover.</div>
        </div>

        </div>

        <br>

        <div style="text-align:center">
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
        </div>
        --->


                    <div class="col-lg-12  text-center"><br>

                      <button type="button"  class="btn btn success btn-md " onclick="resize();" class="close" data-dismiss="modal" class="close" data-dismiss="modal" aria-hidden="true" >

                        <span class="glyphicon glyphicon-start" aria-hidden="true"></span> ¡Empezar a trazar!
                      </button>



                    </div>
                  </form>
                  <div class="modal-footer">
                  <!--  <button type="submit" class="btn btn-primary btn-md" name="enviar">
                      <span class="glyphicon glyphicon-check" aria-hidden="true"></span> Registrar
                    </button>-->
                    <!--<button type="button" class="btn btn-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i></button>-->
                  </div>
                </div>
              </div>
            </div>

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



<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>



<!--
<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"
 integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg=="
 crossorigin=""></script>-->

 <script src="../../leaflet/leaflet.js"></script>
<!-- SCRIPT PARA LIBRERIA DE LEAFLET, PARA HACER MAPAS DINAMICOS -->
<script  src="../../../plugins/leaflet.pm-develop/leaflet.pm.min.js"></script>

<script src="../../../plugins/leaflet-icon-pulse-master/dist/L.Icon.Pulse.js"></script>

<script src="../../../plugins/Leaflet.EasyButton-master/src/easy-button.js"></script>

<script  src="../../../plugins/Leaflet.CondensedAttribution-master/dist/leaflet-control-condended-attribution.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!--<script src="vista/dist/js/mapa.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?AIzaSyBcUgd1rrJ_P_m2bFuSepcxb8FFw7zE2yU&callback=myMap"></script> <!--key  de api google maps -->


<script type="text/javascript">


var centro = null;
var actual = null;
var co = [];
var slideIndex = 1;
var bar_izq = false;
var bar_der = false;


let geo = L.map('editar',{
  condensedAttributionControl: false // don't include default, as we are setting options below
}).setView([3.4372201, -76.5224991], 6);
//L.marker([51.50915, -0.096112], { pmIgnore: true }).addTo(map);
//var line = turf.lineString([[3.4372201, -76.5224991], [3.7372201, -78.5224991], [3.3372201, -70.5224991]]);
//var options = {units: 'miles'};

//var along = turf.along(line, 200, options);

var featureGroup = L.featureGroup().addTo(geo);
//var  drawItems = L.geoJson().addTo(geo);
var scheme = 'normal.day.grey';


var HERE_normalDay = L.tileLayer('https://{s}.{base}.maps.cit.api.here.com/maptile/2.1/{type}/{mapID}/{scheme}/{z}/{x}/{y}/{size}/{format}?app_id={app_id}&app_code={app_code}&lg={language}', {
 attribution: 'Map &copy; 1987-2014 <a href="http://developer.here.com">HERE</a>',
 subdomains: '1234',
 mapID: 'newest',
 app_id: 'bI8qS9hvczbJxOSBuMmg',
 app_code: 'Zl9ok_j17Xqr0x7ATtwDPA',
 base: 'base',
 maxZoom: 20,
 type: 'maptile',
 language: 'eng',
 format: 'png8',
 scheme : scheme,
 //scheme: 'normal.night.grey',
 size: '256'
}).addTo(geo);

L.control.condensedAttribution({
  emblem: '<div class="emblem-wrap"><img src="../../dist/img/marcadores/question-mark.png" class="img-circle" /></div>',
  prefix: '<a href="https://www.route360.net/" title="Travel time analysis by Motion Intelligence">route360&deg;</a> | <a href="http://leafletjs.com" title="A JS library for interactive maps">Leaflet</a>'
}).addTo(geo);

var bot_limpiar = L.easyButton('<img src="../../dist/img/clean.png">', function(btn, map){

  featureGroup.clearLayers();

});
var bot_guardar = L.easyButton('<img src="../../dist/img/save.png">', function(btn, map){


  var data = featureGroup.toGeoJSON();

  var shape_db = JSON.stringify(data, null, 2);


   console.log(shape_db);
if (data.features.length != 0  ) {


  swal({
  //  title: "Are you sure?",
    text: "Desea guardar?" ,
  //  icon: "warning",
    buttons: true,
    successMode: true,
    closeOnClickOutside: false,
  })
  .then((willDelete) => {
    if (willDelete) {
      var parametros = {
              "id" : 1,
              "mensaje" : "Esto es un mensaje enviado desde JS"
          };


        $.ajax({
            url: "geocercas.php",
            type: "POST",
            data: {shape_db: shape_db} ,
            success: function(data){
              console.log('se envio dato por ajax');
            }

          });

    }
  });

}else {
  //alert("no se ha generado ninguna figura en el mapa!")
  swal('no se ha generado ninguna figura en el mapa!', {
  buttons: false,
  icon: "warning",
  closeOnClickOutside: false,
  timer: 5000,
  });
}


});

bot_guardar.addTo(geo).setPosition('bottomright');
bot_limpiar.addTo(geo).setPosition('bottomright');
geo.zoomControl.setPosition ('topright'); /// linea para ubicar la posicion del controlador de zoom





//map.zoomControl.setPosition ('topright'); /// linea para ubicar la posicion del controlador de zoom

//geo.showUserLocation(); // permite ubicar posicion de usuario
geo.locate({setView : true, maxZoom: 17, enableHighAccuracy:true, timeout:15000}).on('locationfound',function(e){



var pulsingIcon = L.icon.pulse({iconSize:[20,20],color:'#960378'});
  var marker = L.marker([e.latitude, e.longitude],{icon: pulsingIcon}).bindPopup('Esta es tu ubicacion aproximada',{ closeButton: false }).addTo(geo);

  geo.pm.setPathOptions({
      weight:1,
      color: '#3388ff',
      fillColor: '#bacfe9',
      fillOpacity: 0.5,
  });



}).on('locationerror', function(e){

  console.log(e);
  //alert('No es posible encontrar su ubicación. Es posible que tenga que activar la geolocalización.');
  swal('No es posible encontrar su ubicación. \nEs posible que tenga que activar la geolocalización.', {
  buttons: false,
  icon: "warning",
  closeOnClickOutside: false,
  timer: 4000,
  });


});






//////////////////////////////////////////////////////////////////


  // listen to the center of a circle being added
geo.on('pm:drawstart', function(e) {
    var layer = e.workingLayer;
    var circle = e.workingLayer;

   var radios = null;

// este evento sirve para capturar los puntos de un polygono
    layer.on('pm:vertexadded', function(e) {

         co = layer.getLatLngs();
var a = layer.toGeoJSON();
L.extend(a.properties, layer.properies);
      //console.log(co);
    //  console.log(a);
      //alert(co);
    });





    // evento utilizado para obtener el centro de una circunferencia
    circle.on('pm:centerplaced', function(e) {

        centro = e.latlng;
        //alert(centro);
        //console.log(centro);
        //var b = circle.toGeoJSON();
        //L.extend(b.properties, circle.properies);
        //console.log(b);


        });

    });


        geo.on('pm:create', function(e) {
    e.shape; // the name of the shape being drawn (i.e. 'Circle')
  var layer =  e.layer; // the leaflet layer created
   feature = layer.feature = layer.feature || {};

  feature.type = feature.type || "Feature";
  var props = feature.properties = feature.properties || {};
var radio = null;
switch (e.shape) {
  case 'Circle':
  radio = layer.getRadius();

 props.radius = radio;
    break;
  default:

}
/*
if (e.shape === 'Circle') {
   radio = layer.getRadius();
  //console.log(radio);
  props.radius = radio;
}
*/
//props.desc = null;
props.icono = null;
props.tarea = null;
props.popupContent = null;

featureGroup.addLayer(layer);
addPopupA(layer);


});


geo.on('pm:remove', function(e) {

featureGroup.removeLayer(e.layer);


});



////////////////////////////////////////////////////////////////////////////////////////

var options = {
    position: 'topright', // toolbar position, options are 'topleft', 'topright', 'bottomleft', 'bottomright'
    drawMarker: false, // adds button to draw markers
    drawPolyline: false, // adds button to draw a polyline
    drawRectangle: false, // adds button to draw a rectangle
    drawPolygon: true, // adds button to draw a polygon
    drawCircle: true, // adds button to draw a cricle
    cutPolygon: false, // adds button to cut a hole in a polygon
    editMode: false, // adds button to toggle edit mode for all layers
    removalMode: true, // adds a button to remove layers
};
// add leaflet.pm controls to the map
geo.pm.addControls(options);


 function resize(){
   geo.invalidateSize();

 }


 //var coordenadasPoligono =  Array(); // arreglo que almacena coordenadas para poligono
var coords;

    function onMapClick(e) {
  //  alert( e.latlng.toString());

    //var valor = e.latlng;
    //coordenadasPoligono.push[e.latlng];
    //alert("tus coordenadas son :  " + coordenadasPoligono[0]);

  }

  function NuevaGeo() {

  $('#modalNuevaGeo').modal({backdrop: 'static'});
  }


    function retirar(){
      actual.remove();
    }



    function addPopupA(layer) {
      var container = $('<div style="width:200px"; />');
    container.html ('<span><b>Detalles</b></span><br/><input class="form-control" id="descri" type="text"/><br/><span><b>Notificaciones<b/></span><br/><select id="noti" class="form-control select2" style="width: 100%;">'+
          '<option selected="selected">Ambas</option>'+
          '<option>Entrada</option>'+
          '<option>Salida</option>'+
        '</select><br/>'+

          '<label>Icono</label>'+
          '<select id="ico" class="form-control select2" style="width: 100%;">'+
            '<option selected="selected">Ninguno</option>'+
            '<option>Hogar</option>'+
            '<option>Compañia</option>'+
            '<option>Edificio</option>'+
            '<option>Universidad</option>'+
            '<option>Parqueadero</option>'+
          '</select></br>'+

        '<input style="width:150px;height:30px;margin-left:25px"; type="button" class="can" id="outBtn" value="Cancelar" onclick="retirar();"/>') ;
	//var content = document.createElement("p");




container.on('keyup', function(){
  console.log('guardar');
  layer.feature.properties.popupContent = descri.value;
  //layer.feature.properties.icono = 2;
  //layer.feature.properties.tarea = 1;

});
/*
container.on('click', '.can', function(){
  console.log('se elimino la figura actual');
});*/

     /*document.getElementById("ok").addEventListener("click",function () {
    	actual.feature.properties.desc = a.descri.value;
      actual.feature.properties.icono = 2;
      actual.feature.properties.tarea = 1;
    });*/
    layer.on("popupopen", function () {
    	descri.value = layer.feature.properties.popupContent;
      container.focus();
    });
    layer.bindPopup(container[0],{ closeButton: false }).openPopup();

}




// restore
//L.geoJSON(JSON.parse(shape_for_db)).addTo(mymap);


function Dialogo() {

$('#modal_geocercas').modal({backdrop: 'static'});
}

function Dialogo_guia(){
  $('#modal_guia').modal({backdrop: 'static'});
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


showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var dotsText = document.getElementsByClassName("text");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
    dotsText[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";
  dotsText[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-white";
}




	</script>



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
