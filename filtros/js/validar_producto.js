function producto(formulario,nombre,stock,codigo,categoria,descripcion){
	if(nombre.length==0 || stock.length==0 || codigo.length==0 || categoria.length==0 || descripcion.length==0){
		alert("Campo vacio, complete todos los campos");
	}else{
		var ventana_confirmar = confirm("¿Seguro de registrar nuevo producto?");
      	return ventana_confirmar;
	}
}