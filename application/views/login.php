<div class="center-padre">		
	<div class="card">
		<div class="card-header text-center">
			Inicio de Sesión
		</div>
		<div class="card-body">
			<?= form_open('login') ?>

				<?php if ( $this->session->has_userdata('baduser') || $this->session->has_userdata('badpass') ): ?>
						
					<div class="alert alert-danger p-1" role="alert">
						<i class="fa fa-times mr-2 ml-1"></i><small><?= $this->session->flashdata('baduser'); ?></small>
					</div>

				<?php endif ?>	
					
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text fas fa-address-card"></div>
					</div>
					<input type="text" class="form-control py-0" id="" placeholder="Username" name="usuario">
				</div >
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text fas key"></div>
					</div>
					<input type="text" class="form-control py-0" id="" placeholder="Contraseña" name="clave">
				</div>

				<button class="btn btn-primary btn-sm" type="submit">Entrar</button>
			</form>
		</div>
	</div>
</div> 