<div class="container my-5">
	<div class="row">
		<div class="col">

			<?php foreach ($publicaciones as $publicacion): ?>

				<div class="card ">
					<div class="card-body p-3">
						<div class="small text-monospace">
							<!-- <div class="avatar float-left" style="width: 50px">
								<img src="<?= base_url('application') ?>/assets/img (28)-mini.jpg" alt="avatar" class="rounded-circle img-fluid">
							</div> -->
							<p class="pt-4"><?= $publicacion->nombre ?> el <?= $publicacion->fecha ?></p>
						</div>
						<p class="mt-4"><?= $publicacion->publicacion ?></p>
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

			<?php endforeach ?>

		</div>
	</div>
</div>


<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
	<a class="btn-floating btn-lg red">
		<i class="fas fa-envelope"></i>
	</a>

	<ul class="list-unstyled">
		<li><a class="btn-floating green"><i class="fas fa-envelope"></i></a></li>
		<li><a class="btn-floating blue"><i class="fas fa-shopping-cart"></i></a></li>
	</ul>
</div>