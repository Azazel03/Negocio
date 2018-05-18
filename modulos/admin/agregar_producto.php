<?php  
	require_once("../../modelo/class.conexion.php");

	if(isset($_SESSION["backend_id"])){	
		if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
			require_once("../../filtros/validar_producto.php");
			exit();
		}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="keywords" content="footer, address, phone, icons" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script type="text/javascript" src="../../filtros/js/validar_producto.js"></script>
	<link rel="stylesheet" type="text/css" href="../style/inicio.css">
	<link rel="stylesheet" type="text/css" href="../style/menu_superior.css">
	<link rel="stylesheet" type="text/css" href="../style/footer.css">
	<link rel="stylesheet" type="text/css" href="../style/agregar_producto.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
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
<div class="master-panel">
	<div class="container">  
		<?php 
			include("../../filtros/mensaje_proceso.php");
		?>
  		<form class="contact" action="" method="post">
    		<h3>Caracteristicas del Producto</h3>
    		<fieldset>
    			<label>Nombre</label>
      			<input placeholder="Nombre del Producto" type="text" tabindex="1" required autofocus name="nombre">
    		</fieldset>
    		<fieldset>
    			<label>Unidades</label>
      			<input placeholder="Cantidad del Producto" type="number" tabindex="2" required autofocus name="stock" min="1">
    		</fieldset>
    		<fieldset>
    			<label>Código</label>
      			<input placeholder="Código del Producto" type="text" tabindex="3" required autofocus name="codigo">
    		</fieldset>
    		<fieldset>
    			<label>Categoria</label>
      			<select tabindex="4" name="categoria" autofocus>
      				<option value="">Seleccioné una categoria</option>
      				<option value="vestuario">Vestuario</option>
      				<option value="alimento">Alimento</option>
      				<option value="electro">ElectroHogar</option>
      				<option value="juguete">Juguete</option>
      				<option value="herramienta">Herramienta</option>
      			</select>
    		</fieldset>
    		<fieldset>
    			<label>Descripción</label>
      			<textarea placeholder="Descripción del producto" tabindex="5" autofocus required name="descripcion"></textarea>
    		</fieldset>
    		<fieldset>
    			<input type="hidden" name="grabar" value="si">
      			<button name="enviar" type="submit" id="contact-submit" onclick="producto(this.form.value,this.form.nombre.value,this.form.stock.value,this.form.codigo.value,this.form.categoria.value,this.form.descripcion.value)">Agregar</button>
    		</fieldset>
  		</form>
	</div>
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