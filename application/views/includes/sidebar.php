<?php if( $this->session->has_userdata('sesion') ): ?>

	<nav class="navbar navbar-dark bg-dark sticky-top py-0 navbar-expand-lg">

		<div class="mr-auto">
			<a href="#" data-activates="slide-out" class="btn p-3 button-collapsee"><i class="fa fa-bars fa-2x"></i></a>

			<a class="navbar-brand" href="#">
				<img src="<?= base_url('application') ?>/assets/logo-mdb-jquery-small.png" alt="logo">
			</a>
		</div>

		<!-- <div class="m-auto">
			<button type="button" id="date-picker-example" class="btn btn-sm btn-primary datepicker">
				<i class="fas fa-clock"></i>
			</button>
		</div> -->

		<div class="ml-auto mr-1">

			<?php if ( $user['role'] == 'profesor' ): ?>

				<?php if ( $url ): ?>
					<p class="navbar-text white-text">
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary btn-sm px-2" data-toggle="modal" data-target="#loadnotas">
							<i class="fas fa-upload mr-1"></i> Cargar Notas
						</button>
					</p>

				<?php elseif( $blank ): ?>

					<p class="navbar-text white-text">

					</p>

				<?php else: ?>
					<p class="navbar-text white-text">
						<?= anchor('https://docs.google.com/forms/u/0/d/1ljxTuDGYSjuElImNkafnqu1Vj3DgViMfrzCTV6hy2qY/edit?ntd=1&usp=forms_home&ths=true', '<i class="fas fa-pencil-alt mr-1"></i> Crear evaluación', ['target' => '_blank']) ?>
					</p>

				<?php endif ?>

			<?php else: ?>

					<p class="navbar-text white-text">
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary btn-sm px-2" data-toggle="modal" data-target="#search">
							<i class="fas fa-search mr-1"></i> Buscar clases
						</button>
					</p>

			<?php endif ?>

		</div>
	</nav>

	<div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Clases disponibles</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="row">

						<?php foreach ($materias as $m): ?>
							<div class="col-lg-4 mb-3">
								<div class="card hoverable">
									<img class="card-img-top img-fluid" style="height: 150px" src="<?= base_url('application/assets/').$m->imagen ?>" alt="Card image cap">
									<div class="card-body text-center">
										<h4 class="card-title"><?= $m->materia ?></h4>
										<p class="card-text">Sección <?= $m->seccion ?></p>
										<button class="btn btn-sm p-2 btn-primary add" data-idpersona="<?= $idpersona[0]->id_persona ?>" data-idseccion="<?= $m->id_seccion ?>">Añadir</button>
									</div>
								</div>
							</div>
						<?php endforeach ?>

					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Sidebar navigation -->
	<div id="slide-out" class="side-nav">
		<ul class="custom-scrollbar">
			<!-- Logo -->
			<li>
				<div class="logo-wrapper waves-light">
					<a href="#"><img src="<?= base_url('application') ?>/assets/logo-mdb-jquery-small.png" class="img-fluid flex-center"></a>
				</div>
			</li>
			<!--/. Logo -->
			<!--Social-->
			<li>
				<ul class="social text-left px-4">
					<li class="pb-1 pt-2"><i class="fas fa-calendar mr-2"></i><span id="date"></span></li>
					<li class="pt-1 pb-2"><i class="fas fa-clock mr-2"></i><span id="time"></span></li>
				</ul>
			</li>
			<!--/Social-->
			<!-- Side navigation links -->
			<li>
				<ul class="collapsible collapsible-accordion">
					<li>
						<?php if( $user['role'] == 'alumno' ): ?>

							<?= anchor('estudiante', '<i class="fas fa-home mr-3"></i> Inicio', 'class="waves-effect arrow-r collapsible-header"') ?>

							<?php elseif( $user['role'] == 'profesor' ): ?>

								<?= anchor('profesor', '<i class="fas fa-home mr-3"></i> Inicio', 'class="waves-effect arrow-r collapsible-header"') ?>

							<?php else: ?>

								<?= anchor('administrador', '<i class="fas fa-home mr-3"></i> Inicio', 'class="waves-effect arrow-r collapsible-header"') ?>
						<?php endif ?>
					</li>
					<li>
						<?= anchor('perfil', '<i class="fas fa-user mr-3"></i> Perfil', 'class="waves-effect arrow-r collapsible-header"') ?>
					</li>

					<?php if ($user['role'] == 'profesor'): ?>
						<li>
							<?= anchor('notas', '<i class="fas fa-star mr-3"></i>Notas', 'class="waves-effect arrow-r collapsible-header"') ?>
						</li>
					<?php endif ?>

					<li>
						<?= anchor('logout', '<i class="fas fa-power-off mr-3"></i> Cerrar sesión', 'class="waves-effect arrow-r collapsible-header"') ?>
					</li>
				</ul>
			</li>
			<!--/. Side navigation links -->
		</ul>
		<div class="sidenav-bg side-nav-dark"></div>
	</div>
	<!--/. Sidebar navigation -->

<?php endif ?>


<?php if (isset($materia)): ?>

	<!-- Modal para la carga de notas -->
	<div class="modal fade" id="loadnotas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Cargar Notas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="notesform">
					<div class="modal-body">

						<input type="hidden" name="seccion" id="seccion" value="<?= $seccion ?>">

						<div class="form-row">
							<div class="form-group col-lg-3">
								<label>Materia</label>
								<input type="text" readonly id="materia" value="<?= $materia ?>" name="materia" class="form-control">
							</div>
							<div class="form-group col-lg-3">
								<label for="evaluacion">Evaluación</label>
								<input type="text" id="evaluacion" required="" name="evaluacion" class="form-control">
							</div>
							<div class="form-group col-lg-4">
								<label for="alumno">Alumno</label>
								<select name="alumno" id="alumno" required="" class="custom-select browser-default">
									<option disabled selected>Selecciona a un alumno</option>
									<?php foreach ($alumnos as $alm): ?>
										<option><?= $alm->nombre.' '.$alm->apellido ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group col-lg-2">
								<label for="nota">Nota</label>
								<input type="number" id="nota" required="" name="nota" class="form-control" min="0" max="100">
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-sm">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endif ?>