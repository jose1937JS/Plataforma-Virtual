<div class="container-fluid p-0">
	<div class="card mb-5  text-center jumbotron">
		<div class="card-body">


 			<?php if ( isset($publicaciones[0]) ): ?>
				<h1><?= $publicaciones[0]->materia.' - '.$publicaciones[0]->seccion ?></h1>
			
			<?php else: ?>
			
				<h1>No hay nada para mostrar.</h1>
			<?php endif ?>
		
		</div>
	</div>
</div>

<div class="container mb-5">
	<div class="row">
		<div class="col-9">

			<?php foreach ($publicaciones as $publicacion): ?>

				<div class="card hoverable mb-4">
					<div class="card-body p-3">
						<div class="small text-monospace">
							<!-- <div class="avatar float-left" style="width: 50px">
								<img src="<?= base_url('application') ?>/assets/img (28)-mini.jpg" alt="avatar" class="rounded-circle img-fluid">
							</div> -->
							<p class="pt-4"><?= $publicacion->nombre ?> <i><?= $publicacion->fecha ?></i></p>
						</div>
						<p class="mt-4"><?= $publicacion->publicacion ?></p>
						<div class="d-flex justify-content-end">
							<span class="small">4 comentarios.</span>
						</div>
					</div>
					
					<!-- <ul class="list-group">
						<li class="list-group-item">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, dolores!
						</li>
						<li class="list-group-item">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, dolores!
						</li>
					</ul> -->

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

			<?php if ( !isset($publicaciones[0]) ): ?>
				<div class="card">
					<div class="card-body">
						<h3 class="text-center">There isn't nothing to show. Be the first to create a new post by pressing the orange button.</h3>
					</div>
				</div>
			<?php endif ?>

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
								<?php var_dump($publicaciones[0]) ?>
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

<button class="btn-floating red" data-toggle="modal" data-target="#basicExampleModal">
  <i class="fas fa-plus"></i>
</button>

<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Crear Publicación</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				<?= form_open_multipart('publicar', ['class' => 'md-form']) ?>
					
					<input type="hidden" name="materia" value="<?= $materia ?>">
					<input type="hidden" name="seccion" value="<?= $seccion ?>">
					<input type="hidden" name="seccionid" value="<?= $seccionid ?>">
					<input type="hidden" name="personaid" value="<?= $publicaciones[0]->id_persona ?>">

					<div class="input-group">
						<i class="fas fa-pen prefix"></i>
						<textarea type="text" name="publicacion" id="pub" class="md-textarea form-control"></textarea>
						<label for="pub">Write down something!</label>
					</div>

					<div class="d-flex justify-content-end mt-4">
						<button type="submit" class="btn btn-primary p-2 ">
							<i class="fas fa-send mr-2"></i> publicar
						</button>
					</div>
				
				</form>

			</div>
		</div>
	</div>
</div>