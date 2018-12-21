<div class="container my-5">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<table class="table table-sm table-hover" id="dt" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>NOMBRE COMPLETO</th>
								<th>MATERIA</th>
								<th>EVALUACION</th>
								<th>NOTA</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($notas as $nota): ?>
								<tr>
									<td><?= $nota->alumno ?></td>
									<td><?= $nota->materia ?></td>
									<td><?= $nota->evaluacion ?></td>
									<td><?= $nota->nota ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>	
		</div>
	</div>
</div>