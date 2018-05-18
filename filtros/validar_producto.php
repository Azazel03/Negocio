<?php  
require_once("../../modelo/class.conexion.php");
if(empty($_POST["nombre"]) and empty($_POST["stock"]) and empty($_POST["codigo"]) and empty($_POST["categoria"]) and empty($_POST["descripcion"])){
	header("Location: ../modulos/admin/agregar_producto.php?v=1");
}else{
	require_once("../../modelo/class.producto.php");
	$producto = new Productos();
	$producto->producto_existente();
	if($producto==true){
		$producto->agregar_productos();
		exit();
	}else{
		echo "<script>alert('no se puede registrar producto')</script>";
	}
}
?>