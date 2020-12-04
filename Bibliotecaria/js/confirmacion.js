function confirmacion(el, e){
	e.preventDefault();
	Swal.fire({
		title: 'Seguro desea eliminar este registro?',
		showCancelButton: true,
		confirmButtonText: `Eliminar`,
		cancelButtonText: 'Cancelar',
		icon: 'error'
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: 'Eliminado',
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