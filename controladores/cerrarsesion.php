<?php
session_start();
unset($_SESSION['usuario']);
unset($_SESSION['identificador']);
unset($_SESSION['tipoUsuario']);
session_destroy();
 header("location:../index.php");
 ?>
