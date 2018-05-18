function busqueda(formulario,nombre){
	if(nombre.length==0){
		alert("Campo vacio, complete el campo para busqueda");
	}else{
		var ventana_confirmar = confirm("¿Seguro de buscar producto?");
      	return ventana_confirmar;
	}
}