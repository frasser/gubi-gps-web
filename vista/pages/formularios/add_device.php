<?php
include ('../../../controladores/procesos.php');

//SESSION_START();
//$cant=$_SESSION['cantidad'];


$tp=$_SESSION['tipoUsuario'];

if ($tp == 1) {
  $tp='Administrador';
}

//validar si esta ingresando con sesion incorrecta
if (!$_SESSION) {
  header("location:../../../index.php");
}


if (isset($_POST['enviarD'])) {


  $serie=$_POST['serial'];
  if ($_POST['cat'] != null) {
    // code...
    $tipD=$_POST['cat'];
  }else {
    // code...
    $tipD = 1;
  }

  $nombre=$_POST['nombreD'];
  $imei=$_POST['imei'];
  $sim=$_POST['sim'];
  $fecha=$_POST['fechaD'];
  $idUsuario=$_SESSION['identificador'];
  if ($_POST['mi_ico'] !=null) {
    // code...
    $icono=$_POST['mi_ico'];



  }else {
    // code...
    $icono = 'default.png';
  }
//  $icono=$_POST['mi_ico'];

//echo "icono: " .$icono. " tipo: " .$tipD. " nombre: " .$nombre. " sim:  " .$sim. "";


guardarDispositivo($serie,$tipD,$nombre,$imei,$sim,$fecha,$idUsuario,$icono);
}

if (isset($_POST['enviarEd'])) {


  $ico=$_POST['mi_icoActualizado'];
  $tipD=$_POST['catActualizado'];
  $nombre=$_POST['nombreE'];
  $sim=$_POST['simE'];
  $id=$_POST['id_php'];



  UpdateDispositivo($id,$tipD,$nombre,$sim,$ico);

}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  if (isset($_POST['texto'])) {
    // code...
    //echo "texto = " .$_POST['texto'];
    $id=$_POST['texto'];
    echo "valores = " .$id;
    deleteDispositivo($id);
    //exit();/* Para que no siga imprimiendo el resto*/

  }

}


 ?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
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

  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="../../dist/css/skins/skin-greenn.min.css">

  <!--  formulario Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
  <!-- bootstrap datepicker -->
  <!--<link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">->


<link rel="stylesheet" href="../../dist/css/iconos.css">






  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


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
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="../../../principal.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>PS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Tracker</b>Gps</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" id="barra-izquierda" onclick="b_i();">
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
                    <!--    <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
            <a href="#" data-toggle="control-sidebar" onclick="b_d();" id="barra-derecha"><i class="fa fa-gears"></i></a>
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
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $_SESSION['usuario']; ?></a>
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



        <li class="treeview active">
		  <a href="#">
		    <i class="fa fa-edit"></i> <span>Registros</span>
		    <span class="pull-right-container">
		      <i class="fa fa-angle-left pull-right"></i>
		    </span>
		</a>
		<ul class="treeview-menu">
		  <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Dispositivos</a></li>
          <li><a href="add_user.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>

		</ul>
		</li>




		  <li class="treeview">
          <a href="#"><i class="fa fa-map"></i> <span>Opciones de mapa</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="geocercas.php"><i class="fa fa-circle-o"></i> Geocercas</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i> Rutas</a></li>
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
    <section class="content-header">
      <h1>
        Registros
        <small>Dispositivos Asociados</small>
      </h1>



    </section>

	<!-- Main content -->
    <section class="content">

	<div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
             <!-- <h3 class="box-title">DISPOSITIVOS ASOCIADOS</h3>-->
			 <button type="button" onclick="Nuevo();" class="btn btn-primary btn-md">
			  <i class="fa fa-plus-circle"></i>

			    <span class="glyphicon glyphicon-start" aria-hidden="true"></span>nuevo dispositivo</button>


            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th style="display: none;">ID</th>
                  <th>Serial</th>
                  <th>Tipo</th>
                  <th>Nombre</th>
                  <th>icono</th>
                  <th style="display: none;">Imei</th>
				          <th style="display: none;">Sim</th>
				          <th>Fecha Registro</th>
                  <th>Panel</th>

                </tr>

               <?php

               $dispositivos = mostrarDispositivos();
               $verificar = count($dispositivos);

               if ($verificar!=0) {
                 // code...
                 foreach ($dispositivos as $row) {

                   ?>
                   <tr>
                     <td style="display: none;"><?php print($row['id_dispositivo']); ?></td>
                     <td><?php print($row['serie_dispositivo']); ?></td>
                     <td><?php print($row['descripcion_tipo']); ?></td>
   				           <td><?php print($row['nombre']); ?></td>
                     <td style="display: none;"><?php print($row['icono']); ?></td>
                     <td><img src="../../dist/img/marcadores/<?php print($row['icono']); ?>" alt="" style="height:auto;"></td>
   				           <td style="display: none;"><?php print($row['numero_imei']); ?></td>
                     <td style="display: none;"><?php print($row['sim']); ?></td>
                     <td><?php print($row['fecha_registro']); ?></td>


   				          <td>

   				     <div class="btn-group">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Seleccione <span class="caret"></span>
                  </button>

   					   </button>
   					   <ul class="dropdown-menu" role="menu">
   					     <li><a onclick="Eliminar('<?php print($row['id_dispositivo']); ?>');">Desactivar</a></li>
   						 <li><a onclick="Editar('<?php print($row['id_dispositivo']); ?>','<?php print($row['serie_dispositivo']); ?>','<?php print($row['icono']); ?>',
                 '<?php print($row['nombre']); ?>','<?php print($row['sim']); ?>','<?php print($row['numero_imei']); ?>','<?php print($row['fk_tipo_dispo']); ?>');">Actualizar</a></li>
   						</ul>
   					  </div>

   				         </td>
                   </tr>


                  <?php
                 }
                  ?>
                  <tr>
                  <td></td>

                  </tr>
                  <tr>
<td></td>

                  </tr>
                  <tr>
<td></td>

                  </tr>
                  <tr>
<td></td>

                  </tr>

                  <?php







               }
               else {
                 echo "no se encuentran registros";
                // echo '<script language="javascript">Nuevo();</script>';
               //echo "<input type='button' value='Click' onload='Nuevo();'  onClick='Nuevo();' /><br>";
               echo "<script>";
                echo "  window.onload=function() {
  			$('#modal').modal({backdrop: 'static'});
  		}";
                echo "</script>";




               }
               ?>









              </table>
            </div>
            <!-- /.box-body -->
            <!-- box-footer -->
            <div class="box-footer">
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 140px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-footer -->




          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
      <!-- /.content -->

      <!-- contenido del cuadro de dialogo para validar que no hay dispositivos-->
      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Advertencia</h4>
            </div>
            <form role="form" action="" name="frmDialogo" method="post" >
              <div class="col-lg-12">
                <h4>Wow! parece que aun no tienes dispositivos <strong>UBI</strong> registrados.</h4>
                <h5>Preciona el siguiente boton</h5>

                <button type="button" onclick="Nuevo();" class="btn btn-primary btn-md" >
                  <span class="glyphicon glyphicon-start" aria-hidden="false"></span> Ingresar dispositivo
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
      <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Nuevo dispositivo</h4>
            </div>
            <form role="form" action="" name="frmDispositivo" method="post" >
              <input type="hidden" name = "mi_ico">
              <input type="hidden" name = "cat">
              <div class="col-lg-12">

                <div class="form-group">
                  <label>Codigo Serial</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-barcode"></i>
                    </div>
                  <input name="serial" class="form-control" placeholder="eje: UBI12O3O" onkeyup="this.value=this.value.toUpperCase()" required>
                </div>
                </div>
<!-------- desde aca ----------------->
<label>Tipo dispositivo</label>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-6">

                        <div class="input-group">
                          <div class="input-group-addon">
                        <!--    <i class="fa fa-map-pin"></i>-->
                        <div id="selected-icon-container">
                   </div>
                   			<img id="selected-icon" src="../../dist/img/marcadores/custom.png" style="height:21px;" >

                    </div>
                    <!--
                  <select class="form-control select2" id="tipo" name="tipoD"  style="width: 50%;">
                    <option  selected="selected">Seleccione</option>
                    <option value="1">Vehiculo</option>
                    <option value="2">Motocicleta</option>
                    <option value="3">Animal</option>
                    <option value="4">Persona</option>
                    <option value="5">Otro</option>

                  </select>-->
                  <div class="btn-group">
                     <button type="button" id="tipo"  class="btn btn-primary " >Icono <span class="caret"></span>
                     </button>



      					  </div>
                </div>
          <!--    </div>-->

<!------------------------------------------------------------------>
          <!--     <div class="col-lg-6">-->
<!--
                 <div id="sele" style="margin-top: 20px;">
             			<div id="selected-icon-container">
             </div>
             			<img id="selected-icon" src="../../dist/img/marcadores/default.png">

             				<input id="selected-icon-field" type="text"  />

             		</div>
-->

<!--min-height: 310px;-->





            </div>
            </div>
                </div>

                <!---- hasta acaaa ----------------------------------->

                <div class="form-group">
                  <label>Nombre de dispositivo</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-tag"></i>

                    </div>
                  <input name="nombreD" class="form-control" placeholder="eje: CHEVROLET SPARK ICU500" onkeyup="this.value=this.value.toUpperCase()"  required>
                </div>
                </div>

                <div class="form-group">
                  <label>Numero Imei</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-laptop"></i>
                    </div>
                  <input type="text" name="imei" class="form-control" data-inputmask="'mask': ['999-9999-9999-9999]', '']" data-mask required>
                  </div>
                </div>

                <div class="form-group">
                  <label>Numero Sim card</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-phone"></i>
                      </div>
                  <input type="text" name="sim" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask required>
                </div>
                </div>
                <input type="hidden"   name="fechaD">

          <!--      <div class="form-group" >
                  <label>Fecha registro:</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text"  id="datepicker" type="hidden" name="fechaD">
                  </div>
                  <!-- /.input group
                </div>-->



                <button type="submit" class="btn btn-primary btn-md" name="enviarD">
                  <span class="glyphicon glyphicon-start" aria-hidden="true"></span> Registrar dispositivo
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

      <!-- contenido del cuadro de dialogo para Editar-->
      <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Editar dispositivo</h4>
            </div>
            <form role="form" action="" name="frmEditarDispositivo" method="post" >
              <input type="hidden" name = "id_php">
              <input type="hidden" name = "mi_icoActualizado">
              <input type="hidden" name = "catActualizado">
              <div class="col-lg-12">

                <div class="form-group">
                  <label>Codigo Serial</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-barcode"></i>
                    </div>
                  <input name="serialE" class="form-control" placeholder="eje: UBI12O3O" onkeyup="this.value=this.value.toUpperCase()" disabled="disabled" required>
                </div>
                </div>

                  <label>Tipo dispositivo</label>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-6">

                          <div class="input-group">
                            <div class="input-group-addon">
                          <!--    <i class="fa fa-map-pin"></i>-->
                          <div id="selected-icon-containerEditar">
                     </div>
                           <img id="selected-iconEditar" src="../../dist/img/marcadores/" style="height:21px;" >

                      </div>
                    <div class="btn-group">
                       <button type="button" id="tipoEditar"  class="btn btn-primary " >Icono <span class="caret"></span>
                       </button>



                   </div>
                  </div>
              </div>
              </div>
                  </div>




                <div class="form-group">
                  <label>Nombre de dispositivo</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-tag"></i>

                    </div>
                  <input name="nombreE" class="form-control" placeholder="eje: CHEVROLET SPARK ICU500" onkeyup="this.value=this.value.toUpperCase()"  required>
                </div>
                </div>

                <div class="form-group">
                  <label>Numero Imei</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-laptop"></i>
                    </div>
                  <input type="text" name="imeiE" class="form-control" disabled="disabled" data-inputmask="'mask': ['999-9999-9999-9999]', '']" data-mask required>
                  </div>
                </div>

                <div class="form-group">
                  <label>Numero Sim card</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-phone"></i>
                      </div>
                  <input type="text" name="simE" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask required>
                </div>
                </div>






                <button type="submit" class="btn btn-primary btn-md" name="enviarEd">
                  <span class="glyphicon glyphicon-start" aria-hidden="true"></span> Guardar actualizacion
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

      <!-- /. cierre del contenido cuadro de dialogo Editar -->

      <!-- contenido del cuadro de dialogo para Editar-->
      <div class="modal fade" id="modalIconos" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Seleccione Icono</h4>
            </div>

          <!--    <div id="icons" style="width: 100%;overflow-x: auto;position:absolute;z-index:10;background-color:#ffffff;border: #ebebe0 1px solid;border-radius:5px 5px 5px 5px; margin: 2px 0 0 35px; " >-->
                <!--<select class="form-control select2"  name="tipoD"  style="width: 50%;">

                  <option value="1" selected="selected">Vehiculo</option>
                  <option value="2">Motocicleta</option>
                  <option value="3">Animal</option>
                  <option value="4">Persona</option>
                  <option value="5">Otro</option>

                </select>-->
                <!-- <h5 style="margin:10px;">Seleccione marcador</h5>-->
                 <div class="form-group"   >
                   <div class="input-group" style="margin: 45px;">
                     <div class="input-group-addon">
                   <!--    <i class="fa fa-map-pin"></i>-->
                   <div id="selected-icon-containerModal">
              </div>

                 <img id="selected-iconModal" src="../../dist/img/marcadores/custom.png" style="height:21px;" >
              </div>
                   <select class="form-control select2" id="categoria" name="categoria" style="width: 90%;">
                     <option selected="selected" value="1">Vehiculos</option>
                     <option value="2">Motocicleta</option>
                     <option value="3">Otro</option>
                   </select>



               </div>
             </div>
               <!--  <hr style="background-color: #003300;margin: 10px;"/>-->

           <section  id="contenido-carros" style="margin: 45px;" >
               <!--  <i class="iconbutton material-icons" style="{display: inline-block;background-image.src:(../../dist/img/coffee-Icon.png) no repeat; }" >juanpaaaa</i>
               --><img class="iconbutton material-icons" src="../../dist/img/marcadores/carroRayas.png" alt="Reply"></img>
               <img class="iconbutton material-icons" src="../../dist/img/marcadores/lux_map_topview.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/autoMixto.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/mustang.png" alt="Reply"></img>

              <img class="iconbutton material-icons" src="../../dist/img/marcadores/camionetaNegra.png" alt="Reply"></img>
              <img class="iconbutton material-icons" src="../../dist/img/marcadores/carro_blanco.png" alt="Reply"></img>
               <img class="iconbutton material-icons" src="../../dist/img/marcadores/camionetaNegra2.png" alt="Reply"></img>
               <img class="iconbutton material-icons" src="../../dist/img/marcadores/ambulance.png" alt="Reply"></img>
               <img class="iconbutton material-icons" src="../../dist/img/marcadores/ambulance2.png" alt="Reply"></img>

                <img class="iconbutton material-icons" src="../../dist/img/marcadores/carro_blanco.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/carroBlanco.png" alt="Reply"></img>
               <img class="iconbutton material-icons" src="../../dist/img/marcadores/autoAzul.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/autoRojo.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/autoVerde.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/camioneta.png" alt="Reply"></img>

                <img class="iconbutton material-icons" src="../../dist/img/marcadores/camionetaAzul.png" alt="Reply"></img>
               <img class="iconbutton material-icons" src="../../dist/img/marcadores/camionetaBlanca.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/camionetaBlanca2.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/camionetaCafe.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/camionetaMate.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/camionetaRoja.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/camionetaVino.png" alt="Reply"></img>

                <img class="iconbutton material-icons" src="../../dist/img/marcadores/bus.png" alt="Reply"></img>
               <img class="iconbutton material-icons" src="../../dist/img/marcadores/camionAmarillo.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/camionBlanco.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/camionBlanco2.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/camionVerde.png" alt="Reply"></img>

                <img class="iconbutton material-icons" src="../../dist/img/marcadores/mula.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/grua.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/grua2.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/grua3.png" alt="Reply"></img>

                <img class="iconbutton material-icons" src="../../dist/img/marcadores/convertibleBlanco.png" alt="Reply"></img>
               <img class="iconbutton material-icons" src="../../dist/img/marcadores/convertibleRojo.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/convertibleAzul.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/van.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/vanNegra.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/vanRoja.png" alt="Reply"></img>

                <img class="iconbutton material-icons" src="../../dist/img/marcadores/sparkAzul.png" alt="Reply"></img>
               <img class="iconbutton material-icons" src="../../dist/img/marcadores/sparkBlanco.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/sparkClaro.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/sparkNegro.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/sparkRojo.png" alt="Reply"></img>

                <img class="iconbutton material-icons" src="../../dist/img/marcadores/police.png" alt="Reply"></img>
               <img class="iconbutton material-icons" src="../../dist/img/marcadores/camionetaPolicia.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/police2.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/taxi.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/taxiBlanco.png" alt="Reply"></img>

               </section>




           <section  id="contenido-moto" style="margin: 45px;display: none;">
               <!--  <i class="iconbutton material-icons" style="{display: inline-block;background-image.src:(../../dist/img/coffee-Icon.png) no repeat; }" >juanpaaaa</i>
               --><img class="iconbutton material-icons" src="../../dist/img/marcadores/customHelmet2.png" alt="Reply"></img>
               <img class="iconbutton material-icons" src="../../dist/img/marcadores/customHelmet.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/customMoto.png" alt="Reply"></img>
                 <img class="iconbutton material-icons" src="../../dist/img/marcadores/customMoto2.png" alt="Reply"></img>
                 <img class="iconbutton material-icons" src="../../dist/img/marcadores/customMotor.png" alt="Reply"></img>
                  <img class="iconbutton material-icons" src="../../dist/img/marcadores/customMotorciclist.png" alt="Reply"></img>
                  <img class="iconbutton material-icons" src="../../dist/img/marcadores/customMotorcycle.png" alt="Reply"></img>

           </section>

           <section  id="contenido-otro" style="margin: 45px;display: none;"  >
               <!--  <i class="iconbutton material-icons" style="{display: inline-block;background-image.src:(../../dist/img/coffee-Icon.png) no repeat; }" >juanpaaaa</i>
               --><img class="iconbutton material-icons" src="../../dist/img/marcadores/customCicla.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/customCiclaPista.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/customDrone.png" alt="Reply"></img>
                 <img class="iconbutton material-icons" src="../../dist/img/marcadores/customDog.png" alt="Reply"></img>
                 <img class="iconbutton material-icons" src="../../dist/img/marcadores/customPrint.png" alt="Reply"></img>
               <img class="iconbutton material-icons" src="../../dist/img/marcadores/customCow.png" alt="Reply"></img>
                <img class="iconbutton material-icons" src="../../dist/img/marcadores/customHorse.png" alt="Reply"></img>
              <img class="iconbutton material-icons" src="../../dist/img/marcadores/customRider.png" alt="Reply"></img>

              <img class="iconbutton material-icons" src="../../dist/img/marcadores/yate.png" alt="Reply"></img>
            <img class="iconbutton material-icons" src="../../dist/img/marcadores/yetSky.png" alt="Reply"></img>
            <img class="iconbutton material-icons" src="../../dist/img/marcadores/bote.png" alt="Reply"></img>
             <img class="iconbutton material-icons" src="../../dist/img/marcadores/container.png" alt="Reply"></img>
           <img class="iconbutton material-icons" src="../../dist/img/marcadores/avion.png" alt="Reply"></img>

           </section>
             <!--	 <hr style="background-color: #003300;margin: 10px;"/>-->

                 <!--</div>-->
            <div class="modal-footer">
              <button  type="button" class="btn btn-primary btn-md" id="guardar_icono" data-dismiss="modal" >
                <span class="glyphicon glyphicon-start" aria-hidden="true"></span> Aceptar
              </button>
            <!--  <button type="submit" class="btn btn-primary btn-md" name="enviar">
                <span class="glyphicon glyphicon-check" aria-hidden="true"></span> Registrar
              </button>-->
              <!--<button type="button" class="btn btn-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i></button>-->
            </div>
          </div>
        </div>
      </div>

      <!-- /. cierre del contenido cuadro de dialogo Editar -->




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
<!-- bootstrap datepicker
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>-->


<!-- InputMask -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../../plugins/input-mask/jquery.inputmask.extensions.js"></script>



<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

var bar_izq = false;
var bar_der = false;
var selectedOption = 1;
var mom = moment();
var momento = mom.format('YYYY-MM-DD');
var u = null;
//console.log(momento.format('YYYY-MM-DD'));
function Nuevo() {

$('#modalNuevo').modal({backdrop: 'static'});
}




$(function () {

  //Money Euro // mascara de telefono
  $('[data-mask]').inputmask()
  document.frmDispositivo.fechaD.value = momento;
  //console.log(document.frmDispositivo.fechaD.value);


  //Date picker
  //$('#datepicker').datepicker({
  //  autoclose: true
//  })

})

function Editar(id,serie,iconoE,nombre,sim,imei,tipoDispo){
  idU = id;



document.frmEditarDispositivo.serialE.value = serie;
document.frmEditarDispositivo.nombreE.value = nombre;
document.frmEditarDispositivo.simE.value = sim;
document.frmEditarDispositivo.id_php.value = id;
document.frmEditarDispositivo.imeiE.value = imei;

var url = '<img src="../../dist/img/marcadores/' + iconoE + '" alt="sin imagen" style="height:21px;"></img>';

if (document.getElementById("selected-iconEditar")) {
 document.getElementById("selected-iconEditar").remove();

}
document.getElementById("selected-icon-containerEditar").innerHTML = url;

document.frmEditarDispositivo.mi_icoActualizado.value = iconoE;
document.frmEditarDispositivo.catActualizado.value = tipoDispo;




  $('#modalEditar').modal({backdrop: "static"});
}

function Eliminar(id){
  idU = id;

  swal({
  //  title: "Are you sure?",
    text: 'En realidad deseas desactivar este dispositivo?',
  //  icon: "warning",
    buttons: true,
    successMode: true,
     closeOnClickOutside: false,
  })
  .then((willDelete) => {
    if (willDelete) {
      $.ajax({
             url: "add_device.php",
             type: "POST",
             data: {texto:idU},
             success : function(json) {
                 console.log("success");
                 //console.log(json);
                 location.reload(true);
             },


         });

    }
    });


}

var swit;
var pru;
var mi_icono;
var anterior = $("#" + ('contenido-carros'));;



document.getElementById('tipo').addEventListener("click",function(e){
//  prueba();
  $('#modalIconos').modal({backdrop: 'static'});
});

document.getElementById('tipoEditar').addEventListener("click",function(e){
  $('#modalIconos').modal({backdrop: 'static'});
});

var select = document.getElementById('categoria');

select.addEventListener('change',function(){
selectedOption = select.value;
//console.log(selectedOption);

switch (selectedOption) {

  case '1':
    swit='contenido-carros';
    break;
    case '2':
    swit='contenido-moto';

      break;
      case '3':
        swit='contenido-otro';

        break;

  default:

}

//var u = document.getElementById("icons");
//var l = document.getElementsByTagName("")
//console.log(u);



var new_cat =  $("#" + (swit));



  //$('#' + $(swit).val()).show();
  //anterior.remove();
anterior.css('display','none');
new_cat.css('display','block');//show();
anterior = new_cat;


});

document.getElementById("modalIconos").addEventListener("click", function (e) {

  var target = e.target;
  var icono;

if (!target.classList.contains("form-control")) {
  if (target.classList.contains("iconbutton")) {
  //  document.getElementById("selected-icon").textContent = target.textContent;
	  //document.getElementById("src-icon").textContent = target.src;
  //  document.getElementById("selected-icon-field").value = target.textContent;

   pru = target.src;
var separador = "marcadores/";
var limite = 2;
var arregloDeSubCadenas = pru.split(separador,limite)


mi_icono = arregloDeSubCadenas[1];


 icono = pru;

 u = '<img src="' + icono + '" alt="sin imagen" style="height:21px;"></img>';
 //console.log(u);




 if (document.getElementById("selected-iconModal")) {

  document.getElementById("selected-iconModal").remove();
 }

 document.getElementById("selected-icon-containerModal").innerHTML = u;
  }
}
 //$("#selected-icon").html('<img src="' + icono + '" alt="Reply"></img>');
//console.log(icono);
});






/*
function prueba(){

  var x = document.getElementById("icons");
  if (x.style.display = "none") {
      x.style.display = "block";
  }
   else {

  x.style.display = "none";
}

}*/



document.getElementById("guardar_icono").addEventListener("click", function (e) {
  //console.log(" se va a cerrar");
  //var x = document.getElementById("modalIconos");
  //x.style.display = "none";
  document.frmDispositivo.mi_ico.value = mi_icono;
  document.frmDispositivo.cat.value = selectedOption;
  document.frmEditarDispositivo.catActualizado.value = selectedOption;
  document.frmEditarDispositivo.mi_icoActualizado.value = mi_icono;
  //console.log(document.frmDispositivo.fechaD.value);
  if (document.getElementById("selected-iconEditar")) {

   document.getElementById("selected-iconEditar").remove();
  }
  if (document.getElementById("selected-icon")) {
  	document.getElementById("selected-icon").remove();
    document.getElementById("selected-icon-container").innerHTML = u;
  }


  document.getElementById("selected-icon-containerEditar").innerHTML = u;

});


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

/*
$("#modalIconos").on("hidden.bs.modal", function () {
    // put your default event here

  //  document.frmDispositivo.mi_ico.value = mi_icono;
    document.frmDispositivo.cat.value = selectedOption;
  //  document.frmEditarDispositivo.catActualizado.value = selectedOption;

});
*/

</script>



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
