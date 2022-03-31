<?php

include ('../../../controladores/procesos.php');

$tp=$_SESSION['tipoUsuario'];
//$cant=$_SESSION['cantidad'];

if ($tp == 1) {
  $tp='Administrador';
}

//validar si esta ingresando con sesion incorrecta
if (!$_SESSION) {
  header("location:../../../index.php");
}


if(isset($_POST['enviar']))
{

$usuarios=$_POST['usua'];
$contra=$_POST['contra'];
//$tip=$_POST['2'];
$nombres=$_POST['nombres'];
$tip=$_POST['tipoU'];






guardarUsuarios($usuarios,$contra,$nombres,$tip);
}

if (isset($_POST['editar'])) {

$usuarios=$_POST['Edusua'];
$contra=$_POST['Edcontra'];
$nombres=$_POST['Ednombres'];
$id=$_POST['id_php'];
$tip=$_POST['Edtipo'];



UpdateUsuarios($id,$usuarios,$contra,$nombres,$tip);

}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  if (isset($_POST['texto'])) {
    // code...
    //echo "texto = " .$_POST['texto'];
    $id=$_POST['texto'];
    //echo "valoresda = " .$id;
    deleteUsuario($id);
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
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="../../dist/css/skins/skin-greenn.min.css">

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
 <script type="text/javascript" src="../../dist/js/ajax.js">



 </script>

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
            <a href="#" data-toggle="control-sidebar" id="barra-derecha" onclick="b_d();"><i class="fa fa-gears" ></i></a>
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
		  <li><a href="add_device.php"><i class="fa fa-circle-o"></i> Dispositivos</a></li>
          <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Usuarios</a></li>

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

			<li><a href="eventos.php"><i class="fa fa-circle-o"></i>Historial</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#"><i class="fa fa-book"></i> <span>Documentacion</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="ayuda.php"><i class="fa fa-circle-o"></i> Ayuda</a></li>

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
        <small>Usuarios del sistema</small>
      </h1>



    </section>

	<!-- Main content -->
    <section class="content container-fluid">

	<!------------------------------------------------------------------------------------------------------------------------------------------------------------
        | Your Page Content Here |
        -------------------------->
        <!-- Main row -->

	<div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <!--<h3 class="box-title">USUARIOS DEL SISTEMA</h3>-->
			  <button type="button"  onclick="Nuevo();" class="btn btn-primary btn-md">
			  <i class="fa fa-user-plus"></i>
			    <span class="glyphicon glyphicon-start" aria-hidden="true"></span>nuevo usuario</button>


<!--
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 140px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>-->

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" >
                <tr>
                  <th>Nombre</th>
                  <th style="display: none;">ID</th>
                  <th>User</th>
                  <th style="display: none;">Contraseña</th>
				          <th>Tipo</th>
                  <th style="display: none;">Status</th>
				          <th>Panel</th>

                </tr>

                <?php


                   //include ('../../../controladores/procesos.php');
                   $usuarios=mostrarUsuarios();
                   $verificar = count($usuarios);

                   if ($verificar!=0) {
                     // code...



				          /* $sql = "SELECT id, user, contra, tipo, nombre, status FROM usuarios";
                   $stmt = $con->prepare($sql);
                   $result = $stmt->execute();
                   $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);

*/


                   foreach ($usuarios as $row) {

                  ?>
                     <tr>
                       <td><?php print($row['nombre']);  ?></td>
                       <td style="display: none;"><?php print($row['id']); ?></td>
                       <td><?php print($row['user']);  ?></td>
                       <td style="display: none;"><?php print($row['contra']);  ?></td>
     				           <td><?php print($row['descripcion_tipo']);  ?></td>



                         <td style="display: none;"><span class="label label-success"><?php print(  $row['descri_status']);  ?></span></td>





     				           <td>
     				           <div class="btn-group">
     					            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Seleccione <span class="caret"></span>
                          </button>

     					          <ul class="dropdown-menu" role="menu">
     					            <li><a on onclick="Eliminar('<?php print($row['id']); ?>');">Eliminar</a></li>
     						          <li><a onclick="Editar('<?php print($row['id']); ?>','<?php print($row['user']);  ?>','<?php print($row['contra']);  ?>','<?php print($row['nombre']);  ?>','<?php print($row['descripcion_tipo']);  ?>');">Actualizar</a></li>
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
<td ></td>

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
                     echo "No se encuentran registros";
                     //echo '<script language="javascript">alert("juas");</script>';

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

      <!-- contenido del cuadro de dialogo para agregar usuarios-->
      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Nuevo Usuario</h4>
            </div>
            <form role="form" action="" name="frmUsuarios" method="post" >
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Nombres</label>
                  <input name="nombres" class="form-control" placeholder="Ingrese nombres de nuevo usuario" required>
                </div>

                <div class="form-group">
                  <label>User</label>
                  <input name="usua" class="form-control" placeholder="Ingrese nombre de usuario o nickname eje: @ubi" required>
                </div>

                <div class="form-group">
                  <label>Contraseña</label>
                  <input name="contra" class="form-control" placeholder="Ingrese password con minimo 6 caracteres" required>
                </div>

                <div class="form-group">
                  <label>Tipo usuario</label>
                  <select class="form-control select2" id="tipo" name="tipoU"  style="width: 50%;">
                    <option value="2" selected="selected">User</option>
                    <option value="1">Administrador</option>

                  </select>
                </div>

                <button type="submit" class="btn btn-primary btn-md" name="enviar">
                  <span class="glyphicon glyphicon-check" aria-hidden="true"></span> Registrar
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


      <!-- contenido del cuadro de dialogo para EDITAR usuarios-->
      <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Editar Usuario</h4>
            </div>
            <form role="form" action="" name="frmEditarUsuarios" method="post" >
              <input type="hidden" name = "id_php">
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Nombres</label>
                  <input name="Ednombres" class="form-control" placeholder="Ingrese nombres de nuevo usuario" required>
                </div>

                <div class="form-group">
                  <label>User</label>
                  <input name="Edusua" class="form-control" placeholder="Ingrese nombre de usuario o nickname eje: @ubi" required>
                </div>

                <div class="form-group">
                  <label>Contraseña</label>
                  <input name="Edcontra" class="form-control" placeholder="Ingrese password con minimo 6 caracteres" required>
                </div>

                <div class="form-group">
                  <label>Tipo usuario</label>
                  <select class="form-control select2" id="Edtipo" name="Edtipo"  style="width: 50%;">
                    <option value="2">Usuario</option>
                    <option value="1">Administrador</option>

                  </select>
                </div>
                <button type="submit" class="btn btn-primary btn-md" name="editar">
                  <span class="glyphicon glyphicon-check" aria-hidden="true"></span> Actualizar
                </button>



              </div>
            </form>
            <div class="modal-footer">

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

<script type="text/javascript">

//var idU;

var bar_izq = false;
var bar_der = false;

  function Nuevo(){

    document.frmUsuarios.nombres.value = "";
    document.frmUsuarios.usua.value = "";
    document.frmUsuarios.contra.value = "";
    document.frmUsuarios.tipo.value = 2;


    $('#modal').modal({backdrop: "static"});
  }

  function Editar(id,user,contra,nombre,tp){
    idU = id;
    var t = null;

    document.frmEditarUsuarios.Ednombres.value = nombre;
    document.frmEditarUsuarios.Edusua.value = user;
    document.frmEditarUsuarios.Edcontra.value = contra;
    document.frmEditarUsuarios.id_php.value = idU;

    if (tp == 'Usuario') {
      t = 2;

    }else if (tp == 'Admin') {
      t = 1;


    }

    document.frmEditarUsuarios.Edtipo.value=t;

    $('#modalEditar').modal({backdrop: "static"});
  }

  function Eliminar(id){
    idU = id;
    if (confirm("En realidad deseas eliminar este usuario?")) {

    //  $.post("add_user.php",{"texto":idU},function(respuesta){
      //			alert("ok");
      	//	});
        $.ajax({
               url: "add_user.php",
               type: "POST",
               data: {texto:idU},
               success : function(json) {
                   console.log("success");
                   //console.log(json);
                   location.reload(true);
               },


           });


     //document.frmEliminar.identificador.value = idU;

    }else {
      //sin accion
    }


  }

  function radio(){
    var elementos = document.getElementsByName('tipo');
    var tip;
    for(var i=0; i<elementos.length; i++) {
    if(elementos[i].checked){
      tip = elementos[i].value; break;}
  }
}

   function ShowSelected(){
     var cod = document.getElementById("tipo").value;
     document.getEle

     alert(cod);
     /*para obtener el texto
     var combo = document.getElementById("tipoU");
     var selected = combo.options[combo.selectedIndex].text;
     alert(selected);
     */
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


</script>




<!--<script src="vista/dist/js/mapa.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?AIzaSyBcUgd1rrJ_P_m2bFuSepcxb8FFw7zE2yU&callback=myMap"></script> <!--key  de api google maps -->





<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
