<!-- para repasar, quiwres un sistema de aula virtual, q tenga las siguientes caracteristicas: q maneje
* materias
* secciones
* estudiantes
* profesores
* publicaciomes y comentarios
* subida de archivos
* examenes
* notas

matematica, fisica, quimica, ingles, biologia, geografia orientacion y convivencia ciencias sociales
 -->



<div class="container my-5">
	<div class="row">

		<?php if ( count($materias) > 0 ): ?>

			<?php foreach ($materias as $materia): ?>

				<div class="col-lg-4">
					<div class="card hoverable">
						<img class="card-img-top img-fluid" style="height: 200px" src="<?= base_url('application/assets/').$materia->imagen ?>" alt="Card image cap">
						<div class="card-body text-center">
							<h4 class="card-title"><a><?= $materia->materia ?></a></h4>
							<p class="card-text"><?= $materia->descripcion ?></p>

							<?php if( $user['role'] == 'alumno' ): ?>

								<?php if ($materia->materia == 'Orientacion y Convivencia'): ?>
									<?= anchor("estudiante/orientacion/$materia->seccion", 'Entrar', 'class="btn btn-primary btn-sm"') ?>

								<?php elseif($materia->materia == 'Ciencias Sociales'): ?>
									<?= anchor("estudiante/sociales/$materia->seccion", 'Entrar', 'class="btn btn-primary btn-sm"') ?>

								<?php else: ?>

									<?= anchor("estudiante/$materia->materia/$materia->seccion", 'Entrar', 'class="btn btn-primary btn-sm"') ?>
								<?php endif ?>

							<?php else: ?>

								<?php if ($materia->materia == 'Orientacion y Convivencia'): ?>
									<?= anchor("profesor/orientacion/$materia->seccion", 'Entrar', 'class="btn btn-primary btn-sm"') ?>

								<?php elseif($materia->materia == 'Ciencias Sociales'): ?>
									<?= anchor("profesor/sociales/$materia->seccion", 'Entrar', 'class="btn btn-primary btn-sm"') ?>

								<?php else: ?>

									<?= anchor("profesor/$materia->materia/$materia->seccion", 'Entrar', 'class="btn btn-primary btn-sm"') ?>
								<?php endif ?>
							<?php endif ?>

						</div>
					</div>
				</div>

			<?php endforeach ?>

		<?php else: ?>

			<?php if ($user['role'] == 'alumno'): ?>
				<div class="col">
					<div class="card">
						<div class="card-body">
							<h4>No estás en ninguna clase todavía. Presiona en el botón de arriba para inscribirte en una.</h4>
						</div>
					</div>
				</div>

			<?php else: ?>
				<div class="col">
					<div class="card">
						<div class="card-body">
							<h4>No tienes creada ninguna clase. Presiona en el botón de la esquina para crear una.</h4>
						</div>
					</div>
				</div>

			<?php endif ?>

		<?php endif ?>

	</div>
</div>

<?php if ( $user['role'] == 'profesor' ): ?>

	<button class="btn-floating red" data-toggle="modal" data-target="#AddClass">
		<i class="fas fa-plus"></i>
	</button>

	<div class="modal fade" id="AddClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Crear clase nueva.</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<?= form_open('clasenueva') ?>

						<input type="hidden" name="personaid" value="<?= $personaid[0]->id_persona ?>">

						<label for="materia">Materia</label>
						<select class="browser-default custom-select" name="materia" id="materia">
							<option selected disabled>Selecciona una materia</option>

							<?php foreach ($allmaterias as $materia): ?>
								<option value="<?= $materia->id_materia ?>"><?= $materia->materia ?></option>
							<?php endforeach ?>
						</select>

						<div class="form-group mt-3">
							<label for="seccion">Sección</label>
							<input type="text" class="form-control" id="seccion" name="seccion" >
						</div>

						<div class="d-flex justify-content-end mt-4">
							<button type="submit" class="btn btn-primary p-2 ">
								<i class="fas fa-send mr-2"></i> Crear clase
							</button>
						</div>

					</form>

				</div>
			</div>
		</div>
	</div>


<?php endif ?>

<!-- <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSe-AqloYzBy-EEojRb4iEHoC9tnhwqBH5v3Xm7XGhiJmxRoeg/viewform?embedded=true" width="640" height="1569" frameborder="0" marginheight="0" marginwidth="0">Cargando...</iframe> -->