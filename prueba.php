
<?php


$serie = $_GET['serie'];
$lati = $_GET['lat'];
$longi = $_GET['lon'];
//$velo = $_GET['vel'];

include 'controladores/conexion.php';
$conn= new Conexion();

$query = "INSERT INTO datos (id, fecha, serie, latitud, longitud, velocidad) VALUES (NULL, CURRENT_TIMESTAMP, '$serie', '$lati', '$longi', '1.00' )";

$result = $conn->executeQuery($query);
//mysqli_query($conexion, $query);

if ($result) {
  echo "Datos ingresados correctamente";
}else {
  echo "Error al insertar datos";
}
//mysqli_close($conexion);




 ?>
