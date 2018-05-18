<?php  
require_once("../../modelo/class.conexion.php");
session_destroy();
header("Location: ../../index.php");
?>