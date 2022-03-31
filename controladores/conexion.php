<?php
 require_once 'confg.php';

 class Conexion
 {
 	protected $conexion;

 	public function __construct()
 	{
 	$this->conexion =new mysqli (DB_HOST, DB_USER, DB_PASS, DB_NAME);

 	if( $this->conexion->connect_errno)
 		{
 			echo " Fallo al conectar con web server: ". $this->conexion->connect_error;
 			return;
 		}
 	}

 	public function closeConexion(){
 		$this->conexion->close();}

 	public function executeQuery($sql){
 		$respuesta = $this->conexion->query($sql);
 		if(!$respuesta)
 		{
 			$solicitud = mysqli_errno($this->conexion);
 		}
 		$this->closeConexion();
 		return $respuesta;
 		}
 	}
 ?>
