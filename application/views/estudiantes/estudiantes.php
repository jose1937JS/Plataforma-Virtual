<!-- para repasar, quiwres un sistema de aula virtual, q tenga las siguientes caracteristicas: q maneje 
* materias
* secciones
* estudiantes
* profesores
* publicaciomes y comentarios
* subida de archivos
* examenes
* notas

matematica, fisica, quimica, ingles, biologia, geografia orientacion y convivencia ciencias sociales
 -->



<div class="container my-5">
	<div class="row">
		
		<?php foreach ($materias as $materia): ?>
			
			<div class="col-md-3 col-lg-3">
				<div class="card hoverable">
					<img class="card-img-top" src="<?= base_url('application') ?>/assets/29.jpg" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title"><a><?= $materia->materia ?></a></h4>
						<p class="card-text text-justify"><?= $materia->descripcion ?></p>
						

						<?php if( $user['role'] == 'alumno' ): ?>
							
							<?= anchor("estudiante/$materia->materia/$materia->seccion", 'Entrar', 'class="btn btn-primary"') ?>
						<?php else: ?>
						
							<?= anchor("profesor/$materia->materia/$materia->seccion", 'Entrar', 'class="btn btn-primary"') ?>
						<?php endif ?>
					
					</div>
				</div>
			</div>

		<?php endforeach ?>
	
	</div>
</div>

<button class="btn-floating red" data-toggle="modal" data-target="#AddClass">
  <i class="fas fa-plus"></i>
</button>

<div class="modal fade" id="AddClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Crear clase nueva.</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				<?= form_open_multipart('clasenueva', ['class' => 'md-form']) ?>
					
					<input type="hidden" name="materia" value="<?= $materia ?>">
					<input type="hidden" name="seccion" value="<?= $seccion ?>">
					<input type="hidden" name="seccionid" value="<?= $seccionid ?>">
					<input type="hidden" name="personaid" value="<?= $personaid[0]->id_persona ?>"> 

					<div class="input-group">
						<i class="fas fa-pen prefix"></i>
						<textarea type="text" name="publicacion" id="pub" class="md-textarea form-control"></textarea>
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

<!-- <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSe-AqloYzBy-EEojRb4iEHoC9tnhwqBH5v3Xm7XGhiJmxRoeg/viewform?embedded=true" width="640" height="1569" frameborder="0" marginheight="0" marginwidth="0">Cargando...</iframe> -->