<?php 
	if(isset($_GET["v"])){
		switch($_GET["v"]){
			case "1";
			echo "
			<div class='alert alert-danger' role='alert'>
				<h4>Campos vacios, por favor complete los campos</h4>
			</div>";
			break;

			case "2";
			echo "
			<div class='alert alert-success' role='alert'>
				<h4>El producto ha sido agregado</h4>
			</div>";	
			break;

			case "3";
			echo "
			<div class='alert alert-danger' role='alert'>
				<h4>Producto ya existente</h4>
			</div>";	
			break;

			case "4";
			echo "
			<div class='alert alert-success' role='alert'>
				<h4>Producto editado</h4>
			</div>";	
			break;
		}
	}
?>