<?php  
	require_once("../../modelo/class.conexion.php");

	if(isset($_SESSION["backend_id"])){
		if(isset($_POST["reportes"]) and $_POST["reportes"]=="si"){
			require_once("../../filtros/print_pdf.php");
		}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="keywords" content="footer, address, phone, icons" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script type="text/javascript" src="../../filtros/js/validar_reporte.js"></script>
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
  		<form class="contact" action="" method="post">
    		<h3>Caracteristicas de los Productos</h3>
    	<fieldset>
          <label>Categoria</label>
            <select tabindex="1" name="categoria" required>
              <option value="">Seleccioné una categoria</option>
              <option value="vestuario">Vestuario</option>
              <option value="alimento">Alimento</option>
              <option value="electro">ElectroHogar</option>
              <option value="juguete">Juguete</option>
              <option value="herramienta">Herramienta</option>
            </select>
        </fieldset>
    	<fieldset>
    		<input type="hidden" name="reportes" value="si">
      		<button name="enviar" type="submit" id="contact-submit" onclick="reporte(this.form.value,this.form.categoria.value)">Generar Reporte</button>
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