function reporte(formulario,categoria){
	if(categoria.length==0){
		alert("Campo vacio, complete el campo para reporte");
	}else{
		var ventana_confirmar = confirm("¿Seguro de buscar categoria para reporte?");
      	return ventana_confirmar;
	}
}