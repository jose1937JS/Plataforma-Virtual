<div class="container my-5">
	<div class="row">
		
		<?php foreach ($materias as $materia): ?>
			
			<div class="col-md-3 col-lg-3">
				<div class="card hoverable">
					<img class="card-img-top" src="<?= base_url('application') ?>/assets/29.jpg" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title"><a><?= $materia->materia ?></a></h4>
						<p class="card-text text-justify"><?= $materia->descripcion ?></p>
						<?= anchor("profesor/$materia->materia/$materia->seccion", 'Entrar', 'class="btn btn-primary"') ?>
					</div>
				</div>
			</div>

		<?php endforeach ?>
	
	</div>
</div>