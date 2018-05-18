<?php  
require_once("../../modelo/class.producto.php");
$find = new Productos();
$response = $find->buscar_productos($_POST["nombre"]);
exit();
?>