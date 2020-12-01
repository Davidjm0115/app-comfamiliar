function confirmacion(e){
	if(confirm("¿Seguro desea eliminar este registro?")){
	return true;
	} else{

		e.preventDefault();
	}
}

let linkDelete = document.querySelectorAll(".eliminar");

for (var i=0; i< linkDelete.length; i++){
	
	linkDelete[i].addEventListener('click', confirmacion);
}