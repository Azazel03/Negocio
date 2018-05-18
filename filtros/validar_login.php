<?php
function limpiar($valor){

	$eliminar=array("UNION","union","<script>","select","delete","update","drop","where","*","while"," ","1","'");
	$valor_filtrado=str_replace($eliminar, "", strtolower($valor));
	$valor_filtrado=ucfirst($valor_filtrado);
	return $valor_filtrado;
}
?>
