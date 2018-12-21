<div class="fondo">

<div class="center-padre">
	<div class="card hoverable">
		<div class="card-header text-center">
			<h4>Entrar al sistema</h4>
		</div>
		<div class="card-body">
			<?= form_open('login') ?>

				<?php if ( $this->session->flashdata('baduser') ): ?>

					<div class="alert alert-danger p-1" role="alert">
						<i class="fa fa-times mr-2 ml-1"></i><span><?= $this->session->flashdata('baduser') ?></span>
					</div>

				<?php elseif( $this->session->flashdata('badpass') ): ?>

					<div class="alert alert-danger p-1" role="alert">
						<i class="fa fa-times mr-2 ml-1"></i><span><?= $this->session->flashdata('badpass') ?></span>
					</div>

				<?php endif ?>


				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-user-circle"></i></div>
					</div>
					<input type="text" class="form-control py-0" autofocus required placeholder="Usuario" name="usuario">
				</div >
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-lock"></i></div>
					</div>
					<input type="password" class="form-control py-0" required placeholder="Contraseña" name="clave">
				</div>

				<p class="pt-3"><a href="#crearcuenta" data-toggle="modal">¿No tienes cuenta?</a></p>

				<button class="btn btn-primary btn-block my-3 p-2" type="submit">
					<i class="fas fa-sign mr-2"></i> Entrar
				</button>
			</form>
		</div>
	</div>
</div>

</div>

<div class="modal fade" id="crearcuenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Regístrate</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form id="crearcuenta">

				<div class="modal-body">
					<div class="form-row mb-2">
						<div class="col">
							<label for="nombre">Nombre</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text fas fa-user"></div>
								</div>
								<input type="text" name="nombre" id="nombre" class="form-control">
							</div>
						</div>

						<div class="col">
							<label for="apellido">Apellido</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text fas fa-user"></div>
								</div>
								<input type="text" name="apellido" id="apellido" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-row mb-2">
						<div class="col">
							<label for="correo">Correo electrónico</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text fas fa-envelope"></div>
								</div>
								<input type="email" name="correo" id="correo" class="form-control">
							</div>
						</div>

						<div class="col">
							<label for="telefono">Teléfono</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text fas fa-phone"></div>
								</div>
								<input type="text" name="telefono" id="telefono" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-row mb-2">
						<div class="col">
							<label for="usuario">Usuario</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-user-circle"></i></div>
								</div>
								<input type="text" name="usuario" id="usuario" class="form-control">
							</div>
						</div>

						<div class="col">
							<label for="clave">Clave</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text fas fa-lock"></div>
								</div>
								<input type="password" name="clave" id="clave" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="col">
							<label for="tipo">Tipo de cuenta</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text fas fa-star"></div>
								</div>
								<select name="tipo" id="tipo" class="browser-default custom-select">
									<option disabled selected>Selecciona el tipo de cuenta</option>
									<option value="alumno">Estudiante</option>
									<option value="profesor">Profesor</option>
								</select>
							</div>
						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="submit" class="btn px-3 btn-primary"><i class="fas fa-save mr-2"></i>Registrarse</button>
				</div>

			</form>

		</div>
	</div>
</div>
