<?php
//funcion de control de salida para leer limpiamente el xmlrpc_decode
ob_start('limpiar');
function limpiar($buffer){
    return trim($buffer);
}
session_start();

header("Content-type: text/xml");

include 'conexion.php';

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

$conn= new Conexion(); /*instacion clase conexion*/
// Seleccionar todas las filas en la tabla de marcadores



$query = "SELECT nombre,fk_tipo_dispo,serie,latitud,longitud,velocidad,fecha FROM  dispositivos,datos WHERE serie=serie_dispositivo AND serie='".$dispo=$_SESSION['serie_dispositivo']."' AND fecha BETWEEN '".$_SESSION['fecha_inicial']."' AND '".$_SESSION['fecha_final']."' AND id_usuario_fk='".$idUsuario=$_SESSION['identificador']."' AND estado_dispo = 1 ";
//"SELECT nombre,fk_tipo_dispo,serie,latitud,longitud,velocidad,fecha FROM  dispositivos,datos WHERE serie=serie_dispositivo AND serie='UBI03' AND fecha BETWEEN '2018-02-01' AND '2018-12-10' AND id_usuario_fk=3 AND estado_dispo = 1";
//"SELECT nombre,fk_tipo_dispo,serie,latitud,longitud,velocidad,UNIX_TIMESTAMP(fecha) FROM  dispositivos,datos WHERE serie=serie_dispositivo AND serie='UBI03' AND id_usuario_fk='".$idUsuario=$_SESSION['identificador']."' AND estado_dispo = 1 " ;
// originallll    $query = "SELECT nombre,fk_tipo_dispo,serie,latitud,longitud,velocidad,fecha FROM dispositivos,datos WHERE serie=serie_dispositivo AND id_usuario_fk='".$idUsuario=$_SESSION['identificador']."' AND estado_dispo = 1 " ;
//SELECT nombre,fk_tipo_dispo,serie,latitud,longitud,velocidad,max(fecha) FROM dispositivos,datos WHERE serie=serie_dispositivo AND id_usuario_fk=3 AND estado_dispo = 1 group by serie  order by fecha desc
//$result = mysql_query ( $ consulta );
$result=$conn->executeQuery($query);/*llama funcion de la clase conxeion*/


if (!$result ) {
 die ( ' Consulta inválida:' . mysql_error ());
}





// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'nombre="' . $row['nombre'] . '" ';
  echo 'tipo="' . $row['fk_tipo_dispo'] . '" ';
  echo 'serie="' . parseToXML($row['serie']) . '" ';
  echo 'lat="' . parseToXML($row['latitud']) . '" ';
  echo 'lng="' . $row['longitud'] . '" ';
  echo 'speed="' . $row['velocidad'] . '" ';

  echo 'fecha="' . $row['fecha'] . '" ';
  echo '/>';

  $ind = $ind + 1;
}

// End XML file
echo '</markers>';
ob_end_flush();//De esa manera eliminarías el o los espacios que están molestando.
?>
