<?php  
  require_once("../../modelo/class.conexion.php");
  
  if(isset($_SESSION["backend_id"])){
    require_once("../../modelo/class.producto.php");
    $producto = new Productos();
    if(!empty($_POST["codigo_busqueda"])){
      $response = $producto->buscar_productos($_POST["codigo_busqueda"]);
      if(isset($response['id_productos'])){
        $id = $response['id_productos'];
      }
      if(isset($response['nombre_producto'])){
        $nombre = $response['nombre_producto'];
      }
      if(isset($response['stock_producto'])){
        $stock = $response['stock_producto'];
      }
      if(isset($response['codigo_producto'])){
        $codigo = $response['codigo_producto'];
      }
      if(isset($response['categoria_producto'])){
        $categoria = $response['categoria_producto'];
      }
      if(isset($response['descripcion_producto'])){
        $descripcion = $response['descripcion_producto'];
      }
    }
    #foreach($response as $valor){
      #$id = $valor['id_productos'];
      #$nombre = $valor['nombre_producto'];
      #$stock = $valor['stock_producto'];
      #$codigo = $valor['codigo_producto'];
      #$categoria = $valor['categoria_producto'];
      #$descripcion = $valor['descripcion_producto'];
    #}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="keywords" content="footer, address, phone, icons" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script type="text/javascript" src="../../filtros/js/validar_editar_producto.js"></script>
  <link rel="stylesheet" type="text/css" href="../style/inicio.css">
  <link rel="stylesheet" type="text/css" href="../style/menu_superior.css">
  <link rel="stylesheet" type="text/css" href="../style/footer.css">
  <link rel="stylesheet" type="text/css" href="../style/editar_producto.css">
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
      <form class="contact" action="prueba.php" method="post">
        <h3>Caracteristicas del Producto</h3>
        <fieldset>
          <label>Nombre</label>
            <input placeholder="Nombre del Producto" type="text" tabindex="2" required autofocus name="nombre" value="<?php echo $nombre; ?>">
        </fieldset>
        <fieldset>
          <label>Unidades</label>
            <input placeholder="Cantidad del Producto" type="number" tabindex="3" required name="stock" min="1" value="<?php echo $stock; ?>">
        </fieldset>
        <fieldset>
          <label>Código</label>
            <input placeholder="Código del Producto" type="text" tabindex="4" required name="codigo" value="<?php echo $codigo; ?>">
        </fieldset>
        <fieldset>
          <label>Categoria</label>
            <select tabindex="5" name="categoria">
              <?php if($categoria=="vestuario"){
              ?>
                <option value="">Seleccioné una categoria</option>
                <option value="vestuario" selected>Vestuario</option>
                <option value="alimento">Alimento</option>
                <option value="electro">ElectroHogar</option>
                <option value="juguete">Juguete</option>
                <option value="herramienta">Herramienta</option>
              <?php  
              }

              if($categoria=="alimento"){
              ?>
                <option value="">Seleccioné una categoria</option>
                <option value="vestuario">Vestuario</option>
                <option value="alimento" selected>Alimento</option>
                <option value="electro">ElectroHogar</option>
                <option value="juguete">Juguete</option>
                <option value="herramienta">Herramienta</option>
              <?php  
              }

              if($categoria=="electro"){
              ?>
                <option value="">Seleccioné una categoria</option>
                <option value="vestuario">Vestuario</option>
                <option value="alimento">Alimento</option>
                <option value="electro" selected>ElectroHogar</option>
                <option value="juguete">Juguete</option>
                <option value="herramienta">Herramienta</option>
              <?php  
              }

              if($categoria=="juguete"){
              ?>
                <option value="">Seleccioné una categoria</option>
                <option value="vestuario">Vestuario</option>
                <option value="alimento">Alimento</option>
                <option value="electro">ElectroHogar</option>
                <option value="juguete" selected>Juguete</option>
                <option value="herramienta">Herramienta</option>
              <?php  
              }

              if($categoria=="herramienta"){
              ?>
                <option value="">Seleccioné una categoria</option>
                <option value="vestuario">Vestuario</option>
                <option value="alimento">Alimento</option>
                <option value="electro">ElectroHogar</option>
                <option value="juguete">Juguete</option>
                <option value="herramienta" selected>Herramienta</option>
              <?php  
              }
              ?>
            </select>
        </fieldset>
        <fieldset>
          <label>Descripción</label>
            <textarea placeholder="Descripción del producto" tabindex="6" required name="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>
        <fieldset>
          <input type="hidden" name="id" value='<?php $id;?>'>
          <input type="hidden" name="editar" value="si">
          <button name="enviar" value ="editar" type="submit" id="contact-submit" >Editar</button>
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