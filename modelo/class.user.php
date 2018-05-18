<?php  
class Usuarios extends Conectar{
	public function login(){
		$conectar=parent::conexion();
		parent::set_names();

		if(empty($_POST["user"]) and empty($_POST["pass"])){
			header("Location: ../index.php");
			exit();
		}else{
			require_once("../filtros/validar_login.php");
			$pass = sha1(md5($_POST["pass"]));
			$user = limpiar($_POST["user"]);
			$sql = "call login(?,?)";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $user);
			$sql->bindValue(2, $pass);
			$sql->execute();
			$resultado=$sql->fetch(PDO::FETCH_ASSOC);

			if(is_array($resultado)==true and count($resultado)>=1){
				$_SESSION["backend_id"]=$resultado["id_usuario"];
				header("Location: ../modulos/admin/inicio.php");
				exit();
			}else{
				header("Location: ../index.php");
				exit();
			} 
		}
	}
}
?>