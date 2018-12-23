
<div class="container my-5">
	<div class="row">
		<div class="col-9">

			<div class="card hoverable mb-4">
				<div class="card-body p-3">
					<div class="small text-monospace">
						<!-- <div class="avatar float-left" style="width: 50px">
							<img src="<?= base_url('application') ?>/assets/img (28)-mini.jpg" alt="avatar" class="rounded-circle img-fluid">
						</div> -->
						<div class="d-flex justify-content-between mt-4">
							<span class=" font-weight-bold"><?= $publicacion[0]->nombre.' '.$publicacion[0]->apellido ?> </span>
							<span><i><?= $publicacion[0]->fecha ?></i></span>
						</div>
					</div>

					<div class="mt-3">
						<?php if ( preg_match("/(\.png|\.jpg|\.jpeg|\.ico|\.gif)$/", $publicacion[0]->archivo) ): ?>

							<p class="mt-4"><?= $publicacion[0]->publicacion ?></p>
							<div class="view overlay zoom">
								<img style="max-width: 600px" src="<?= base_url('application/third_party/').$publicacion[0]->archivo ?>" alt="404">
							</div>

						<?php elseif( preg_match("/^(http:\/\/|https:\/\/)/", $publicacion[0]->publicacion) ): ?>

							<a href="<?= $publicacion[0]->publicacion ?>" target="_blank"><?= $publicacion[0]->publicacion ?></a>

						<?php elseif( preg_match('/(\.txt|\.pdf|\.doc|\.docx|\.xls|\.csv|\.odp|\.odg|\.ppxs|\.otp|\.ppt|\.xlsx|\.ods|\.sql|\.html|\.php|\.js|\.css|\.py|\.cpp|\.java)$/', $publicacion[0]->archivo)) : ?>

							<!-- <div class="embed-responsive z-depth-3">
								<embed class="embed-responsive-item" src="<?= base_url('application/third_party/').$publicacion[0]->archivo ?>" type="application/pdf" width="600" height="500"></embed>
							</div> -->
							<a href="<?= base_url('application/third_party/').$publicacion[0]->archivo ?>" target="_blank"><?= $publicacion[0]->archivo ?></a>

						<?php else: ?>
							<p><?= $publicacion[0]->publicacion ?></p>

						<?php endif ?>
					</div>


					<div class="d-flex justify-content-end mt-4">
						<span class="small"><?= count($comentarios) ?> Comentarios.</span>
					</div>
				</div>

				<ul class="list-group">

					<?php foreach( $comentarios as $comentario ): ?>

						<li class="list-group-item">
							<div class="d-flex justify-content-between small text-monospace">
								<p class="font-weight-bold"><?= $comentario->nombre.' '.$comentario->apellido ?></p>
								<p class="blue-grey-text"><?= $comentario->fecha ?></p>
							</div>

							<?php if ( preg_match("/(\.png|\.jpg|\.jpeg|\.ico|\.gif)$/", $comentario->archivo) ): ?>

								<p class="mt-4"><?= $comentario->comentario ?></p>
								<div class="view overlay zoom">
									<img style="max-width: 600px" src="<?= base_url('application/third_party/').$comentario->archivo ?>" alt="404">
								</div>

							<?php elseif( preg_match("/^(http:\/\/|https:\/\/)/", $comentario->comentario) ): ?>

								<a href="<?= $comentario->comentario ?>" target="_blank"><?= $comentario->comentario ?></a>

							<?php elseif( preg_match('/(\.txt|\.pdf|\.doc|\.docx|\.xls|\.csv|\.odp|\.odg|\.ppxs|\.otp|\.ppt|\.xlsx|\.ods|\.sql|\.html|\.php|\.js|\.css|\.py|\.cpp|\.java)$/', $comentario->archivo)) : ?>

								<!-- <div class="embed-responsive z-depth-3">
									<embed class="embed-responsive-item" src="<?= base_url('application/third_party/').$comentario->archivo ?>" type="application/pdf" width="600" height="500"></embed>
								</div> -->
								<a href="<?= base_url('application/third_party/').$comentario->archivo ?>" target="_blank"><?= $comentario->archivo ?></a>

							<?php else: ?>

								<p><?= $comentario->comentario ?></p>
							<?php endif ?>

							<!-- acciones del comentario -->
							<div class="small mt-4">

								<?php if ( $user['usuario'] == $comentario->usuario ): ?>

									<a href="#eliminar" class="del" data-id="<?= $comentario->id_comentario ?>" data-toggle="modal"><i class="fas fa-trash"></i> Eliminar</a>
									<a href="#editar" data-toggle="modal" data-id="<?= $comentario->id_comentario ?>" class="ml-3 edit"><i class="fas fa-edit"></i> Editar</a>

								<?php endif ?>
							</div>

						</li>
					<?php endforeach ?>

				</ul>

				<!-- Modal para editar -->
				<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Editar comentario</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<?= form_open('editcomment') ?>

								<input type="hidden" name="idcomentario" id="idcomentario">
								<input type="hidden" name="idpub" value="<?= $idpub ?>">

								<div class="modal-body">
									<div class="md-form">
										<input type="text" id="comment" name="comment" class="form-control" autofocus="">
										<label for="comment">Edita tu comentario</label>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
									<button type="submit" class="btn btn-primary btn-sm">Editar</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- MOdal para eliminar -->
				<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Eliminar comentario</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<?= form_open('eliminarcomment') ?>

								<input type="hidden" name="idcomentario" id="idcomment">
								<input type="hidden" name="idpub" value="<?= $idpub ?>">

								<div class="modal-body">
									<p>¿Está seguro que desea eliminar éste comentario?</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
									<button type="submit" class="btn btn-primary btn-sm">eliminar</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="card-body py-0 border-top">
					<?= form_open_multipart("comentar", 'class="md-form"') ?>

						<input type="hidden" name="publicacion" value="<?= $idpub ?>">
						<input type="hidden" name="persona" value="<?= $idpersona[0]->id_persona ?>">

						<div class="form-row mb-4">
							<div class="col">
								<input type="text" id="comment" name="comentario" class="form-control">
								<label for="comment">Escribe un comentario ...</label>
							</div>
						</div>
						<div class="row">
							<div class="col">

								<div class="d-flex justify-content-between">
									<div class="file-field">
										<a class="btn-floating btn-primary mt-0 float-left">
											<i class="fas fa-paperclip" aria-hidden="true"></i>
											<input type="file" name="archivo">
										</a>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text" placeholder="Upload your file">
										</div>
									</div>
									<div class="col-1">
										<button class="btn btn-sm btn-primary px-3" data-toggle="tooltip" title="Enviar respuesta">
											<i class="fas fa-paper-plane"></i>
										</button>
									</div>
								</div>
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
							<p class="mb-2">Cantidad total: <a href="#alumnos" data-toggle="modal"><?= count($alumnos) ?></a></p>
						</li>
						<li class="list-group-item">
							<h5 class="">Profesor</h5>
							<p class="small font-weight-bold">Nombre completo:</p>
							<p><?= $profesor[0]->nombre.' '.$profesor[0]->apellido ?></p>
							<p class="small font-weight-bold">Correo Electrónico:</p>
							<p><?= $profesor[0]->correo ?></p>
						</li>
						<li class="list-group-item"><h5>Archivos principales</h5></li>
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