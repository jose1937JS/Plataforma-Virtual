$(() => {

	$(".button-collapsee").sideNav()
	$('#dt').DataTable();
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

	$('.delpub').click((e) => {
		$('#idpub').val(e.target.dataset.id)
	})

	// ajax to add new notes
	$('#notesform').submit((e) => {
		e.preventDefault()

		$.ajax({
			method: 'post',
			url: 'http://127.0.0.1/Plataforma-Virtual/index.php/Profesores/addnotas',
			data: $('#notesform').serialize()
		})

		.done(data => {
			$('#materia').val('')
			$('#evaluacion').val('')
			$('#alumno').val('')
			$('#nota').val('')

			toastr.success('Nota cargada con éxito', '')
		})

		.fail(error => {
			console.log(error)
			toastr.error(error.statusText, 'Ha ocurrido un error')
		})

	})

	// ajax para registrar usuario nuevo
	$('#crearcuenta').submit((e) => {
		e.preventDefault()

		$.ajax({
			method : 'post',
			url    : 'http://127.0.0.1/Plataforma-Virtual/index.php/Profesores/crearcuenta',
			data   : {
				nombre   : $('#nombre').val(),
				apellido : $('#apellido').val(),
				correo   : $('#correo').val(),
				telefono : $('#telefono').val(),
				tipo     : $('#tipo').val(),
				usuario  : $('#usuario').val(),
				clave    : $('#clave').val()
			}
		})

		.done(data => {
			console.log(data)
			$('#nombre').val('')
			$('#apellido').val('')
			$('#correo').val('')
			$('#telefono').val('')
			$('#tipo').val('')
			$('#usuario').val('')
			$('#clave').val('')

			toastr.success('Usuario creado exitosamente', '')
		})

		.fail(error => {
			console.log(error)

			toastr.error(error.statusText, 'Ha ocurrido un error')
		})

	})

	//  ajax para añadir clase nueva al estudiante
	$('.add').click((e) => {

		$.ajax({
			method : 'post',
			url    : 'http://127.0.0.1/Plataforma-Virtual/index.php/Estudiantes/addclass',
			data   : $.param({ idseccion : e.target.dataset.idseccion, idpersona : e.target.dataset.idpersona }),
		})

		.done((success) => {
			$(e.target).parent().parent().parent().hide(1000)
			toastr.success('Materia añadida con éxito', '')

			setTimeout(() => {
				toastr.info('Recarga la página para ver los cambios.')
			}, 2000)
		})

		.fail((fail) => {
			console.log(fail)
			toastr.error(fail.statusText, 'Ha ocurrido un error')
		})
	})

	// reloj
	setInterval(() => {

		let time  = new Date(),
			dia   = time.getDate(),
			semn  = time.getDay(),
			mes   = time.getMonth(),
			anio  = time.getFullYear(),
			hora  = time.getHours(),
			min   = time.getMinutes(),
			seg   = time.getSeconds(),
			semd  = ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
			meses = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dec'];

			if (hora < 10) { hora = '0' + hora }
			if (min  < 10) { min  = '0' + min  }
			if (seg  < 10) { seg  = '0' + seg  }

			let fecha  = `${semd[semn]} ${dia} ${meses[mes]} de ${anio}`
			let tiempo = `${hora}:${min}:${seg}`

			$('#date').text(fecha)
			$('#time').text(tiempo)

	}, 1000)

})