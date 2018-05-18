<?php 
require_once("class.user.php");
class Productos extends Conectar{
	public function agregar_productos(){
		$conectar = parent::conexion();
		parent::set_names();
		if(empty($_POST["nombre"]) and empty($_POST["stock"]) and empty($_POST["codigo"]) and empty($_POST["categoria"]) and empty($_POST["descripcion"])){
			header("Location: ../admin/agregar_producto.php?v=1");
			exit();
		}else{
			$id_usuario = $_SESSION["backend_id"];
			$sql = "call add_producto(?,?,?,?,?,?)";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1,$_POST["nombre"]);
			$sql->bindValue(2,$_POST["stock"]);
			$sql->bindValue(3,$_POST["codigo"]);
			$sql->bindValue(4,$_POST["categoria"]);
			$sql->bindValue(5,$_POST["descripcion"]);
			$sql->bindValue(6,$id_usuario);
			$sql->execute();
			$resultado = $sql->fetch(PDO::FETCH_ASSOC);
			if(!$resultado){
				header("Location: ../admin/agregar_producto.php?v=2");
				exit();
			}else{
				header("Location: ../admin/agregar_producto.php?v=1");
				exit();
			}
		}
	}

	public function producto_existente(){
		$conectar = parent::conexion();
		parent::set_names();
		$sql = "call consulta_producto(?)";
		$sql = $conectar->prepare($sql);
		$sql->bindValue(1,$nombre_producto);
		$sql->execute();
		$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
		if(sizeof($resultado)>=1){
			return false;
			header("Location: ../admin/agregar_producto.php?v=3");
			exit();
		}else{
			return true;
			exit();
		}
	}

	public function buscar_productos($nombre_producto){
		$conectar = parent::conexion();
		parent::set_names();
		$sql = "call consulta_producto(?)";
		$sql = $conectar->prepare($sql);
		$sql->bindValue(1,$nombre_producto);
		$sql->execute();
		return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
		exit();
	}

	public function buscar_eliminar_productos($nombre_producto){
		$conectar = parent::conexion();
		parent::set_names();
		$sql = "call buscar_eliminar_producto(?)";
		$sql = $conectar->prepare($sql);
		$sql->bindValue(1,$nombre_producto);
		$sql->execute();
		return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
		exit();
	}

	public function eliminar_producto($codigo_producto){
		$conectar = parent::conexion();
		parent::set_names();
		$sql = "call eliminar_producto(?)";
		$sql = $conectar->prepare($sql);
		$sql->bindValue(1,$codigo_producto);
		$sql->execute();
		return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
		exit();
	}

	public function reporte_productos($categoria){
		$conectar = parent::conexion();
		parent::set_names();
		$sql = "call reporte_producto(?)";
		$sql = $conectar->prepare($sql);
		$sql->bindValue(1,$categoria);
		$sql->execute();
		return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
		exit();
	}
}
?>