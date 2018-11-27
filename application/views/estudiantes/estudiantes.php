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
						<p class="card-text"><?= $materia->descripcion ?></p>
						<?= anchor("estudiante/$materia->materia/$materia->seccion", 'Entrar', 'class="btn btn-primary"') ?>
					</div>
				</div>
			</div>

		<?php endforeach ?>
	
	</div>
</div>

<!-- <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSe-AqloYzBy-EEojRb4iEHoC9tnhwqBH5v3Xm7XGhiJmxRoeg/viewform?embedded=true" width="640" height="1569" frameborder="0" marginheight="0" marginwidth="0">Cargando...</iframe> -->