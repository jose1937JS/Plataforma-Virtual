<div class="container my-5">
	<div class="row">
		<div class="col-9">

			<div class="card hoverable mb-4">
				<div class="card-body p-3">
					<div class="small text-monospace">
						<!-- <div class="avatar float-left" style="width: 50px">
							<img src="<?= base_url('application') ?>/assets/img (28)-mini.jpg" alt="avatar" class="rounded-circle img-fluid">
						</div> -->
						<p class="pt-4"><?= $publicacion[0]->nombre ?> <i><?= $publicacion[0]->fecha ?></i></p>
					</div>
					<p class="mt-4"><?= $publicacion[0]->publicacion ?></p>
					<div class="d-flex justify-content-end">
						<span class="small"><?= count($comentarios) ?> Comentarios.</span>
					</div>
				</div>
				
					
					<ul class="list-group">
						
						<?php foreach ($comentarios as $comentario): ?>
							<li class="list-group-item">
								<?= $comentario->comentario ?>
							</li>
						<?php endforeach ?>
					
					</ul>
				

				<div class="card-body py-0 border-top">
					<?= form_open("comentar", 'class="md-form"') ?>


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

		</div>

		<div class="col-3">
			<div class="card hoverable">
				<div class="card-body p-0">
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<h5 class="">Alumnos</h5>
							<p class="mb-2">14</p>
						</li>
						<li class="list-group-item">
							<h5 class="">Profesor</h5>
							<p class="mb-2">
								<?php var_dump($publicacion[0]) ?>
							</p>
						</li>
						<li class="list-group-item">
							<h5 class="">Otra</h5>
							<p class="mb-2">adipisicing elit. Illo, ea.</p>
						</li>
					</ul>
				</div>
			</div>

			<div class="card hoverable mt-4">
				<div class="card-body p-0">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><h5>Archivos</h5></li>
						<li class="list-group-item">
							<p class="mb-2">adipisicing elit. Illo, ea.</p>
						</li>
						<li class="list-group-item">
							<p class="mb-2">adipisicing elit. Illo, ea.</p>
						</li>
						<li class="list-group-item">
							<p class="mb-2">adipisicing elit. Illo, ea.</p>
						</li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</div>