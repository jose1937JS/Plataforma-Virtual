<div class="center-padre">		
	<div class="card">
		<div class="card-header text-center">
			Inicio de Sesión
		</div>
		<div class="card-body">
			<?= form_open('login') ?>

				<?php if ( $this->session->flashdata('baduser') ): ?>
						
					<div class="alert alert-danger p-1" role="alert">
						<i class="fa fa-times mr-2 ml-1"></i><small><?= $this->session->flashdata('baduser') ?></small>
					</div>
					
				<?php elseif( $this->session->flashdata('badpass') ): ?>
					
					<div class="alert alert-danger p-1" role="alert">
						<i class="fa fa-times mr-2 ml-1"></i><small><?= $this->session->flashdata('badpass') ?></small>
					</div>

				<?php endif ?>

					
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text fas fa-user"></div>
					</div>
					<input type="text" class="form-control py-0" autofocus required placeholder="Username" name="usuario">
				</div >
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text fas fa-lock"></div>
					</div>
					<input type="text" class="form-control py-0" required placeholder="Contraseña" name="clave">
				</div>

				<button class="btn btn-primary btn-block my-3 p-2" type="submit">
					<i class="fas fa-sign mr-2"></i> Entrar
				</button>
			</form>
		</div>
	</div>
</div> 