<div class="container-fluid p-0" >
	<div class="card mb-5 text-center jumbotron bg" style="background-image: url(<?= base_url('application/assets/').$materia[0]->imagen ?>); ">
		<div class="card-body">

 			<h1 class="tbg"><?= $materia[0]->materia.' - '.$seccion ?></h1>

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
							<div class="d-flex justify-content-between mt-4">
								<span class="font-weight-bold"><?= $publicacion->nombre.' '.$publicacion->apellido ?></span>
								<span><i><?= $publicacion->fecha ?></i></span>
							</div>
						</div>

						<div class="mt-3">
							<?php if ( preg_match("/(\.png|\.jpg|\.jpeg|\.ico|\.gif)$/", $publicacion->archivo) ): ?>

								<div class="view overlay zoom">
									<img style="max-width: 600px" class="img-thumbnail" src="<?= base_url('application/third_party/').$publicacion->archivo ?>" alt="404">
								</div>

							<?php elseif( preg_match("/^(http:\/\/|https:\/\/)/", $publicacion->publicacion) ): ?>
								<a href="<?= $publicacion->publicacion ?>" target="_blank"><?= $publicacion->publicacion ?></a>

							<?php elseif( preg_match('/(\.txt|\.pdf|\.doc|\.docx|\.xls|\.csv|\.odp|\.odg|\.ppxs|\.otp|\.ppt|\.xlsx|\.ods|\.sql|\.html|\.php|\.js|\.css|\.py|\.cpp|\.java)$/', $publicacion->archivo)) : ?>

								<a href="<?= base_url('application/third_party/').$publicacion->archivo ?>" target="_blank"><?= $publicacion
								->archivo ?></a>

							<?php else: ?>

								<p><?= $publicacion->publicacion ?></p>
							<?php endif ?>
						</div>

						<div class="d-flex justify-content-end small mt-3">

							<?php if ( $user['usuario'] == $publicacion->usuario ): ?>

								<a href="#delpub" class="delpub mr-3" data-id="<?= $publicacion->id_publicacion ?>" data-toggle="modal"><i class="fas fa-trash"></i> Eliminar</a>

							<?php endif ?>

							<?= anchor("publicacion/$publicacion->id_publicacion", '<i class="fas fa-eye"></i> Ver publicacion') ?>

						</div>
					</div>

					<div class="card-body py-0 border-top">
						<?= form_open("comentar", 'class="md-form"') ?>

							<input type="hidden" name="materia" value="<?= $publicacion->materia ?>">
							<input type="hidden" name="seccion" value="<?= $publicacion->seccion ?>">
							<input type="hidden" name="persona" value="<?= $personaid[0]->id_persona ?>">
							<input type="hidden" name="publicacion" value="<?= $publicacion->id_publicacion ?>">

							<div class="form-row">
								<div class="col-11">
									<input type="text" id="comment" maxlength="255" required name="comentario" class="form-control">
									<label for="comment">Escribe tu comentario ...</label>
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
						<h3 class="text-center">There isn't nothing to show. Be the first to create a new post by pressing the orange button on below.</h3>
					</div>
				</div>
			<?php endif ?>

			<!-- MODAL PARA ELIMINAR PUBLICCION -->
			<div class="modal fade" id="delpub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Eliminar publicación</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?= form_open('eliminarpub') ?>

							<input type="hidden" name="idpub" id="idpub">
							<input type="hidden" name="materia" value="<?= $materia[0]->materia ?>">
							<input type="hidden" name="seccion" value="<?= $seccion ?>">

							<div class="modal-body">
								<p>¿Está seguro que desea eliminar ésta publicación?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-primary btn-sm">eliminar</button>
							</div>
						</form>
					</div>
				</div>
			</div>


		</div>

		<div class="col-3">
			<div class="card hoverable">
				<div class="card-body p-0">
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<h4 class="mb-3">Alumnos</h4>
							<p class="mb-2">Cantidad total: <a href="#alumnos" data-toggle="modal"><?= count($alumnos) ?></a></p>
						</li>
						<li class="list-group-item">
							<h4 class="mb-3">Profesor</h4>
							<p class="small font-weight-bold">Nombre completo:</p>
							<p><?= $profesor[0]->nombre.' '.$profesor[0]->apellido ?></p>
							<p class="small font-weight-bold">Correo Electrónico:</p>
							<p><?= $profesor[0]->correo ?></p>
						</li>
						<li class="list-group-item"><h4>Archivos principales</h4></li>

						<?php foreach ($files as $file): ?>
							<li class="list-group-item">
								<a target="_blank" href="<?= base_url('application/third_party/').$file->archivo ?>"><?= $file->archivo ?></a>
							</li>
						<?php endforeach ?>

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

					<input type="hidden" name="materia" value="<?= $materia[0]->materia ?>">
					<input type="hidden" name="seccion" value="<?= $seccion ?>">
					<input type="hidden" name="seccionid" value="<?= $seccionid ?>">
					<input type="hidden" name="personaid" value="<?= $personaid[0]->id_persona ?>">

					<div class="input-group">
						<i class="fas fa-pen prefix"></i>
						<textarea type="text" name="publicacion" required id="pub" maxlength="512" class="md-textarea form-control"></textarea>
						<label for="pub">Write down something!</label>
					</div>

					<div class="d-flex justify-content-between mt-5">

						<?php if( $user['role'] == 'profesor' ): ?>
							<div class="file-field">
								<a class="btn-floating mt-0 btn-primary float-left">
									<i class="fas fa-upload" aria-hidden="true"></i>
									<input type="file" name="file">
								</a>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text" placeholder="Upload your file">
								</div>
							</div>
						<?php endif ?>

						<button type="submit" class="btn btn-primary p-2 ">
							<i class="fas fa-send mr-2"></i> publicar
						</button>
					</div>

				</form>

			</div>
		</div>
	</div>
</div>


<!-- MODAL PARA LOS ALUMNOS -->

<div class="modal fade" id="alumnos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Alumnos inscritos.</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<table class="table table-sm table-hover table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Apellido</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($alumnos as $k => $a): ?>
							<tr>
								<td><?= $k + 1 ?></td>
								<td><?= $a->nombre ?></td>
								<td><?= $a->apellido ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>