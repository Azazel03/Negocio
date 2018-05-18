<?php  
require_once("../modelo/class.conexion.php");
require_once("../modelo/class.user.php");
if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
	$usuario = new Usuarios();
	$usuario->login();
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/login.css">
	<title>Market</title>
</head>
<body >
<div class="login-page">
  <div class="form">
    <form class="login-form" action="" method="post">
      <input type="text" name="user" placeholder="usuario"/>
      <input type="password" name="pass" placeholder="contraseña"/>
      <input type="hidden" name="grabar" value="si">
      <button>login</button>
    </form>
  </div>
</div>
</body>
</html>

