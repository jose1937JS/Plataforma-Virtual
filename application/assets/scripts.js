$(() => {

	$(".button-collapsee").sideNav() 
	$('.datepicker').pickadate()
	$('[data-toggle="tooltip"]').tooltip()

	// ajax function that return a data to the modal
	$('.edit').click((e) => {

		$.ajax({
			method : 'post',
			url : 'http://127.0.0.1/Plataforma-Virtual/index.php/getdatamodal',
			data : $.param({ id : e.target.dataset.id }),
		})
		.done((data) => {
			$('#comment').val(data[0].comentario)
			$('#idcomentario').val(data[0].id_comentario)
		})
		.fail((error) => {
			console.log(error.responseText)
		})

	})

	$('.del').click((e) => {

		$('#idcomment').val(e.target.dataset.id)
	})
})