<?php  
	require_once("../../modelo/class.conexion.php");

	if(isset($_SESSION["backend_id"])){	

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="keywords" content="footer, address, phone, icons" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="../style/inicio.css">
	<link rel="stylesheet" type="text/css" href="../style/menu_superior.css">
	<link rel="stylesheet" type="text/css" href="../style/menu_principal.css">
	<link rel="stylesheet" type="text/css" href="../style/footer.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Ferretería</title>
	<?php require_once("../style/bootstrap.php"); ?>
</head>
<body>
<header>
	<div class="imagen">
	<?php require_once("menu_superior.php"); ?>
</div>
</header>
<section>
	<div class="menu_principal">
		<?php require_once("menu_principal.php"); ?>
	</div>
</section>
<footer>
	<div class="footer-distributed">
		<?php require_once("footer.php"); ?>
	</div>
</footer>
</body>
</html>
<?php  
	}else{
		header("Location: ../login.php");
	}
?>