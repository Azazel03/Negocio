<?php  
	require_once("../../modelo/class.conexion.php");

	if(isset($_SESSION["backend_id"])){
      if(isset($_POST["enviar"])){	
		  require_once("../../modelo/class.producto.php");
      $find = new Productos();
      $response = $find->buscar_eliminar_productos($_POST["codigo"]);
      }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="keywords" content="footer, address, phone, icons" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script type="text/javascript" src="../../filtros/js/validar_busqueda.js"></script>
	<script type="text/javascript" src="../../filtros/js/validar_eliminar.js"></script>
	<link rel="stylesheet" type="text/css" href="../style/menu_superior.css">
	<link rel="stylesheet" type="text/css" href="../style/footer.css">
	<link rel="stylesheet" type="text/css" href="../style/eliminar_producto.css">
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
    		<h3>Caracteristicas del Producto</h3>
    		<fieldset>
    			<label>Código de Producto</label>
      			<input placeholder="Nombre del Producto" type="text" tabindex="1" required autofocus name="codigo">
    		</fieldset>
    		<fieldset>
      		<button name="enviar" type="submit" id="contact-submit" onclick="busqueda(this.form.value,this.form.codigo.value)">Buscar</button>
    		</fieldset>
  		</form>
      <?php 
        if(isset($response)){
      ?>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Stock</th>
                <th scope="col">Código</th>
                <th scope="col">Categoria</th>
                <th scope="col">Descripción</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
            <?php for($i=0;$i<sizeof($response);$i++){?>
              <tr>
                  <td><?php echo $response[$i]["nombre_producto"]; ?></td>
                  <td><?php echo $response[$i]["stock_producto"]; ?></td>
                  <td><?php echo $response[$i]["codigo_producto"]; ?></td>
                  <td><?php echo $response[$i]["categoria_producto"]; ?></td>
                  <td><?php echo $response[$i]["descripcion_producto"]; ?></td>
                  <td><a href="<?php $find->eliminar_producto($response[$i]['codigo_producto']) ?>" name="eliminar" onclick="eliminar(this.form.value)">Eliminar</a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
      <?php    
        }
      ?>
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