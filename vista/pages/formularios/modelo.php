<?php
include ('../../../controladores/procesos.php');


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
  <link rel="stylesheet" href="../../dist/css/skins/skin-green.min.css">

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
    <a href="../../../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>PS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Tracker</b>Gps</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
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




          <!-- CONTENIDO DE LA CUENTA DE USUARIO, FOTO Y SALIR DE SESION  User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <!--<img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Compañia X</span>
            </a>


            <ul class="dropdown-menu">

              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  CPMPAÑOA X

                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="#">x</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="#">x</a>
                  </div>

                </div>
                <!-- /.row -->
              </li>






              <!----------------------------------------------------   Menu Footer ------------------------------------------------>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Cerrar sesion</a>
                </div>
              </li>
            </ul>
          </li>

          <!----------------------------------------------------------------------------------------------------------------------------------------------------->
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
          <p> Compañia x</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Usuario</a>
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


        <li class ="treeview">
		  <a href="#">
		    <i class="fa fa-map-marker"></i> <span>Ubicar Dispositivos <i class="label bg-green">2</i></span>
            <span class="pull-right-container">
		      <i class="fa fa-angle-left pull-right"></i>
		    </span>
		  </a>
		<ul class="treeview-menu">
		  <li class="dropdown-submenu"><a href="#"><i class="fa fa-circle-o"></i> Flotas</a></li>
		  <li class="dropdown-submenu"><a href="#"><i class="fa fa-car"></i> chevrolet spark RKH10B</a></li>
		  <li class="dropdown-submenu"><a href="#"><i class="fa fa-road"></i> kia picanto DZX500</a></li>

          <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Todos</a></li>
		</ul>
		</li>

		  <li class="treeview">
          <a href="#"><i class="fa fa-map"></i> <span>Personalizacion</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Tema</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Geocercas</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i> Rutas</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i> Eventos</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#"><i class="fa fa-book"></i> <span>Documentacion</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Tema</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Geocercas</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i> Eventos</a></li>
          </ul>
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
			 <button type="button" class="btn btn-primary btn-md">
			  <i class="fa fa-plus-circle"></i>

			    <span class="glyphicon glyphicon-start" aria-hidden="true"></span>nuevo dispositivo</button>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Serial</th>
                  <th>Tipo</th>
                  <th>Nombre</th>
                  <th>Imei</th>
				          <th>Sim</th>
				          <th>Fecha Registro</th>
                  <th>Estado</th>
                  <th>Panel</th>

                </tr>

               <?php

               $dispositivos = mostrarDispositivos();




                ?>


                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
				  <td>183</td>
				  <td>vehiculo</td>
                  <td>Bacon ipsum dolor .</td>
                  <td>vehiculo</td>
                          <td>Bacon ipsum dolor .</td>

				  <td>

				     <div class="btn-group">
               <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Seleccione <span class="caret"></span>
               </button>

					   </button>
					   <ul class="dropdown-menu" role="menu">
					     <li><a>Eliminar</a></li>
						 <li><a>Actualizar</a></li>
						</ul>
					  </div>

				  </td>
                </tr>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
      <!-- /.content -->
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
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
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





<!--<script src="../../dist/js/mapa.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?AIzaSyBcUgd1rrJ_P_m2bFuSepcxb8FFw7zE2yU&callback=myMap"></script> <!--key  de api google maps -->





<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
