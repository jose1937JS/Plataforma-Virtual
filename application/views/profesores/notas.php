<div class="container my-5">
	<div class="row">
		
		<?php foreach ($materias as $materia): ?>

			<div class="col-lg-4">
				<div class="card card-cascade wider reverse">
					<div class="view view-cascade overlay">
						<img style="height: 200px" class="card-img-top img-fluid" src="<?= base_url('application/assets/').$materia->imagen ?>" alt="404">

						<?php if ($materia->materia == 'Orientacion y Convivencia'): ?>
							<?= anchor("notas/orientacion/$materia->seccion", '<div class="mask rgba-white-slight"></div>') ?>

						<?php elseif ($materia->materia == 'Ciencias Sociales'): ?>
							<?= anchor("notas/sociales/$materia->seccion", '<div class="mask rgba-white-slight"></div>') ?>

						<?php else: ?>
							<?= anchor("notas/$materia->materia/$materia->seccion", '<div class="mask rgba-white-slight"></div>') ?>

						<?php endif ?>

					</div>

					<div class="card-body card-body-cascade text-center">
						
						<?php if ($materia->materia == 'Orientacion y Convivencia'): ?>
							<?= anchor("notas/orientacion/$materia->seccion", "<h4 class='card-title'><strong>$materia->materia</strong></h4>") ?>

						<?php elseif ($materia->materia == 'Ciencias Sociales'): ?>
							<?= anchor("notas/sociales/$materia->seccion", "<h4 class='card-title'><strong>$materia->materia</strong></h4>") ?>

						<?php else: ?>
							<?= anchor("notas/$materia->materia/$materia->seccion", "<h4 class='card-title'><strong>$materia->materia</strong></h4>") ?>

						<?php endif ?>


						<p class="card-text"><?= $materia->descripcion ?></p>
					</div>
				</div>
			</div>
		<?php endforeach ?>

	</div>
</div>