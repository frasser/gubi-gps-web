<?php
session_start();
//$idUsuario=$_SESSION['identificador'];
//echo "id de usuario es : " .$idUsuario;


include 'conexion.php';


$conn=new Conexion();

 if (isset($_POST["user"]) && isset($_POST["pass"])) {
   //$user = mysqli_real_escape_string(mysqli $conn, $_POST["user"]);
   //$pass = mysqli_real_escape_string(mysqli $conn,  $_POST["pass"]);
   $user =  $_POST["user"];
   $pass =  $_POST["pass"];

   // code...
   $query="SELECT * FROM usuarios WHERE (user='$user' OR nombre='$user') AND contra='$pass'";
   $res=$conn->executeQuery($query);
   $count = $res->num_rows;

   if ($count > 0) {
     // code...
     while ( $row = mysqli_fetch_object($res))
       {


            $_SESSION['logeado'] = true;
            $_SESSION['usuario'] = $row->nombre;
            $_SESSION['identificador'] = $row->id;
            $_SESSION['tipoUsuario'] = $row->tipo;
            $id=$_SESSION['identificador'];



 }
 echo "1";

}
}


/////////////// PROCESOS PARA CRUD DE USUARIOS ////////////////////////////////////////////////////////////////////////////////////////////////////////////

function mostrarUsuarios()
 {
    $conn= new Conexion(); /*instacion clase conexion*/

    $query=" SELECT  * FROM usuarios INNER JOIN tipo_usuarios on id_tipo=tipo INNER JOIN status on id_status=status_fk";
    //$query="SELECT * FROM cliente INNER JOIN ciudad on codigociudad = codciudadp "; /* para hacer un inner join donde me muestre laciudad en el listado de clientes*/
    $result=$conn->executeQuery($query);/*llama funcion de la clase conxeion*/
    if($result->num_rows > 0)
   {
         while($rows=$result->fetch_assoc())
       {
               $res[]=$rows; /*los resultados los convierte en arreglo*/
             }
             return $res; /*retorna el arreglo*/
       }
 }

 function guardarUsuarios($usuarios,$contra,$nombres,$tip)
   {

     $conn=new Conexion();
     $query="INSERT INTO usuarios (user,contra,tipo,nombre,status_fk) VALUES ('".$usuarios."','".$contra."','".$tip."','".$nombres."',2)";
     $result=$conn->executeQuery($query);
     if ($result)
     {
     echo "<script type='text/javascript'>alert('Datos actualizados con exito!');</script>";
     exit(header("location:add_user.php"));

   }
   else
   {
   echo "<h3>Se ha producido un error al guardar los datos</h3>";
   }
   }


   function UpdateUsuarios($id,$usuarios,$contra,$nombres,$tip)
   {
     $conn=new Conexion();
   $query="UPDATE usuarios SET user='".$usuarios."',contra='".$contra."',tipo='".$tip."',nombre='".$nombres."' WHERE id='".$id."' ";
   $result=$conn->executeQuery($query);
   if ($result)
    {
      echo "<script type='text/javascript'>alert('Datos actualizados con exito!');</script>";

      exit(header("location:add_user.php"));
   }
   else
   {
   echo "<script type='text/javascript'>alert('Se ha producido un error al intentar actualizar los datos');</script>";
   }
   }

   function deleteUsuario($id)
  {
   $conn=new Conexion();
     $query="DELETE  FROM usuarios WHERE id='".$id."' ";
   $result=$conn->executeQuery($query);

   if ($result)
       {

       //header("location:add_user.php");
      // $archivoActual = $_SERVER['add_user.php'];
      // header("refresh:5;url=" + $archivoActual );
       //exit();/* Para que no siga imprimiendo el resto*/

       echo "<script type='text/javascript'>alert('Usuario eliminado!');</script>";




     }

     else
     {
     echo "<script type='text/javascript'>alert('Se ha producido un error al eliminar los datos');</script>";

     }
  }



/////////////// PROCESOS PARA CRUD DE DISPOSITIVOS ////////////////////////////////////////////////////////////////////////////////////////////////////////////


   function mostrarDispositivos()
    {
      //$idUsuario=$_SESSION['identificador'];
      //echo "codigo es : "  .$idUsuario. "" ;
      //$GLOBALS['id'] = $GLOBALS['idUsuario'];
      //echo "valor en funcion es: " id;
       $conn= new Conexion(); /*instacion clase conexion*/

       $query=" SELECT  * FROM dispositivos INNER JOIN tipo_dispositivo on id_tipo=fk_tipo_dispo INNER JOIN status on id_status=estado_dispo WHERE id_usuario_fk = '".$idUsuario=$_SESSION['identificador']."' AND estado_dispo = 1 ";
       //$query="SELECT * FROM cliente INNER JOIN ciudad on codigociudad = codciudadp "; /* para hacer un inner join donde me muestre laciudad en el listado de clientes*/
       $result=$conn->executeQuery($query);/*llama funcion de la clase conxeion*/
       if($result->num_rows > 0)
      {
            while($rows=$result->fetch_assoc())
          {
                  $res[]=$rows; /*los resultados los convierte en arreglo*/
                }
                return $res; /*retorna el arreglo*/
          }
    }

    function guardarDispositivo($serie,$tipD,$nombre,$imei,$sim,$fecha,$idUsuario,$icono)
      {


        $conn=new Conexion();
        $query="INSERT INTO dispositivos (serie_dispositivo,fk_tipo_dispo,nombre,numero_imei,sim,estado_dispo,fecha_registro,id_usuario_fk,icono) VALUES ('".$serie."','".$tipD."','".$nombre."','".$imei."','".$sim."',1,'".$fecha."','".$idUsuario."','".$icono."')";
        $result=$conn->executeQuery($query);

        if ($result)
        {


        echo utf8_encode("<script>alert('Dispositivo registrado con exito!')</script>");
        exit(header("location:add_device.php"));


      }
      else
      {
      echo utf8_encode("<script>alert('Imposible registrar este dispositivo!.Verifique e ingrese nuevamente el numero de serie del dispositivo')</script>");
      }
      }



      function UpdateDispositivo($id,$tipD,$nombre,$sim,$ico)
      {
        $conn=new Conexion();
      $query="UPDATE dispositivos SET fk_tipo_dispo='".$tipD."',nombre='".$nombre."',sim='".$sim."',icono='".$ico."' WHERE id_dispositivo='".$id."' ";
      $result=$conn->executeQuery($query);
      if ($result)
       {
         echo utf8_encode("<script>alert('Datos actualizados con exito!')</script>");




        exit(header("location:add_device.php"));
      }
      else
      {
      echo utf8_encode("<script>alert('Error al intentar actualizar datos de dispositivo!')</script>");
      }
      }


      function deleteDispositivo($id)
     {
      $conn=new Conexion();
      $query="UPDATE dispositivos SET estado_dispo = 2  WHERE id_dispositivo='".$id."' ";
      $result=$conn->executeQuery($query);

      if ($result)
          {

          echo utf8_encode("<script>alert('El dispositivo ha sido eliminado de tu cuenta!')</script>");
          exit(header("location:add_device.php"));

        }

        else
        {
        echo "<script type='text/javascript'>alert('Se ha producido un error al desactivar dispositivo');</script>";

        }
     }

     function login ($usu, $clave)
     {



     	/*$query="SELECT * FROM usuarios WHERE user='$usu' AND contra='$clave'";
     	$res=$conn->executeQuery($query);
     	$count = $res->num_rows;
     	if($count> 0)
     	{
     		while ( $row = mysqli_fetch_object($res))
     		{
     			switch ($row->tipo){
     				case '1':

     			   $_SESSION['logeado'] = true;
     			   $_SESSION['usuario'] = $row->nombre;
     			   $_SESSION['identificador'] = $row->id;
             $_SESSION['tipoUsuario'] = $row->tipo;
             $id=$_SESSION['identificador'];

             header("Content-Type: text/html; charset=UTF-8;");
     			   echo utf8_encode("<script> alert('Datos ok')</script>");
             //echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Condición cumplida\", \"success\");});</script>";
     			   exit(header("location:principal.php"));

     			   break;
      /*
     			   case '2':
     			   $_SESSION['logeado'] = true;
     			   $_SESSION['usuario'] =$Usuario;
     			   $_SESSION['tiUsu']= $row->idempleado;
     			   echo utf8_encode("<script> alert('Datos ok')</script>");
     			   header("location:forms/menuusuario.php");
     			   break;

     			   default:
     			   # code...
     			   break;
             */
  /*   			}
     		}
     		return true;
     	}
     	else
     	{
     		echo utf8_encode("<script>alert('Usuario y Contraseña incorrecto')</script>");
         //echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Condición cumplida\", \"success\");});</script>";
     		return false;
     	}*/
     }



     /*function cantidad ($id){

     $conn=new Conexion();
     $query="SELECT count(id_dispositivo) FROM dispositivos WHERE id_usuario_fk = '".$id."' ";
     $result=$conn->executeQuery($query);
     foreach ($result as $row ) {
       // code...

     $_SESSION['cantidad'] = $row['count(id_dispositivo)'];
     //$cant= $_SESSION['cantidad'];

     }
   }*/


///////////////////////////////////////////////////////////////////

function guardarCercas($idUsu,$datos)
  {

    $conn=new Conexion();
    $query="INSERT INTO geos_json (user_id_fk, datos) VALUES ('".$idUsu."','".$datos."')";
    $result=$conn->executeQuery($query);
    if ($result)
    {
    echo "<script type='text/javascript'>alert('Geocerca guardada con exito!!');</script>";
    //header("location:geocercas.php");

  }
  else
  {
  echo "<h3>Se ha producido un error al guardar los datos</h3>";
  }
  }


  function mostrarCercas()
   {
      $conn= new Conexion(); /*instacion clase conexion*/

      $query=" SELECT  * FROM geos_json WHERE user_id_fk = '".$idUsuario=$_SESSION['identificador']."' ";
      //$query="SELECT * FROM cliente INNER JOIN ciudad on codigociudad = codciudadp "; /* para hacer un inner join donde me muestre laciudad en el listado de clientes*/
      $result=$conn->executeQuery($query);/*llama funcion de la clase conxeion*/
      if($result->num_rows > 0)
     {
           while($rows=$result->fetch_assoc())
         {
                 $res[]=$rows; /*los resultados los convierte en arreglo*/
               }
               return $res; /*retorna el arreglo*/
         }
   }




     function UpdateCercas($idUsu,$datos,$id)
     {
     $conn=new Conexion();
     $query="UPDATE geos_json SET datos='".$datos."' WHERE id_geos ='".$id."' AND user_id_fk ='".$idUsu."' ";
     $result=$conn->executeQuery($query);
     if ($result)
      {
        echo utf8_encode("<script>alert('Datos actualizados con exito!')</script>");

        //header("location:geocercas.php");
     }
     else
     {
     echo utf8_encode("<script>alert('Error al intentar actualizar datos de Geocercas!')</script>");
     }
     }




      function filtroEventos ($datos)
      {

       if(count($datos)> 0)
       {


              $_SESSION['fecha_inicial'] = $datos['fecha1'];
              $_SESSION['fecha_final'] = $datos['fecha2'];
              $_SESSION['serie_dispositivo'] = $datos['dispositivo'];





              echo utf8_encode("<script> alert('Datos ok')</script>");



       }
       else
       {
         echo utf8_encode("<script>alert('no hay datos')</script>");

       }
      }








 ?>
