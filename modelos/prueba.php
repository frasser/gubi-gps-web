
<?php


$serie = $_GET['serie'];
$lati = $_GET['lat'];
$longi = $_GET['lon'];

include_once 'controllers/conexion.php';



$conexion = mysqli_connect($db_host, $db_usuario, $db_contra);

  // condicion para manejo de erroress
  if (mysqli_connect_errno()) {
    echo "FALLO AL CONECTAR CON WEB SERVER";
    exit();
  }

mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");
mysqli_set_charset($conexion, "utf8");

$query = "INSERT INTO datos (id, fecha, serie, latitud, longitud, velocidad) VALUES (NULL, CURRENT_TIMESTAMP, '$serie', '$lati', '$longi', '1.00' )";

$resultSet = mysqli_query($conexion, $query);

if ($resultSet == false) {

  echo "Error al insertar datos";
}else {
  echo "Datos ingresados correctamente";
}
mysqli_close($conexion);



 ?>
