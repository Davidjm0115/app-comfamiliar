function confirmacion(el, e){
	e.preventDefault();
	Swal.fire({
		title: 'Seguro desea devolver el prestamo?',
		showCancelButton: true,
		confirmButtonText: `Aceptar`,
		cancelButtonText: 'Cancelar',
		icon: 'error'
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Devuelto',
				confirmButtonText: `Ok`,
				icon: 'success'
			}).then((resultConfirmation) => {
				if (resultConfirmation.isConfirmed) {
					window.location = el.attr('href');
				}
			})
		}
	});
}
$(document).ready(function() {
	$(".eliminar").each(function (){
		let el = $(this);
		$(this).on('click', function (e){
			confirmacion(el, e)
		})
	});
});