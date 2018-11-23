<div class="center-padre">		
	<div class="card">
		<div class="card-header text-center">
			Inicio de Sesión
		</div>
		<div class="card-body">
			<?= form_open('login/login') ?>
					
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text fas fa-address-card"></div>
					</div>
					<input type="text" class="form-control py-0" id="" placeholder="Username">
				</div >
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text fas key"></div>
					</div>
					<input type="text" class="form-control py-0" id="" placeholder="Contraseña">
				</div>

				<button class="btn btn-primary btn-sm" type="submit">Entrar</button>
			</form>
		</div>
	</div>
</div> 