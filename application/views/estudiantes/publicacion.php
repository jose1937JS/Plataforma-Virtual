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
						
						<?php elseif( preg_match("/(\.txt|\.doc|\.docx|\.xls|\.csv|\.odp|\.odg|\.ppxs|\.otp|\.ppt|\.xlxs|\.ods|\.sql|\.php|\.html|\.xml|\.css|\.js|\.py|\.cpp|\.java)$/", $publicacion[0]->archivo) ) : ?>

							<a href="<?= $publicacion[0]->publicacion ?>" target="_blank"><?= $publicacion[0]->publicacion ?></a>
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
							<p><?= $comentario->comentario ?></p>
							
							<?php if( $comentario->archivo != '' ): ?>
								<div class="view overlay zoom">
									<img style="max-width: 600px" class="img-fluid img-thumbnail" src='<?= base_url("application/third_party/").$comentario->archivo ?>'>
									<div class="mask flex-center waves-effect"></div>
								</div>
							<?php endif ?>
							
							<!-- acciones del comentario -->
							<div class="small mt-3">
								
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