<div class="card ">
	<div class="card-body p-3">
		<div class="small text-monospace">
			<!-- <div class="avatar float-left" style="width: 50px">
				<img src="<?= base_url('application') ?>/assets/img (28)-mini.jpg" alt="avatar" class="rounded-circle img-fluid">
			</div> -->
			<p class="pt-4"><?= $publicacion->nombre ?> el <?= $publicacion->fecha ?></p>
		</div>
		<p class="mt-4"><?= $publicacion->publicacion ?></p>
		<div class="d-flex justify-content-end">
			<span class="small">4 comentarios.</span>
		</div>
	</div>
	<div class="card-body py-0 border-top">
		<?= form_open("comentar", 'class="md-form"') ?>

			<input type="hidden" name="materia" value="<?= $publicacion->materia ?>">
			<input type="hidden" name="seccion" value="<?= $publicacion->seccion ?>">

			<div class="form-row">
				<div class="col-11">
					<input type="text" id="comment" class="form-control">
					<label for="comment">Haz un comentario</label>
				</div>
				<div class="col-1">
					<button class="btn btn-sm btn-primary px-3" data-toggle="tooltip" title="Enviar respuesta">
						<i class="fas fa-paper-plane"></i>
					</button>
				</div>
			</div>
		</form>
	</div>
</div>