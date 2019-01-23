<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>LICEO NACIONAL ESTADO MIRANDA</title>


		<link rel="stylesheet" href="<?= base_url('application') ?>/assets/bootstrap.min.css">
		<link rel="stylesheet" href="<?= base_url('application') ?>/assets/main.css">

		<script src="<?= base_url('application') ?>/assets/jquery-3.3.1.min.js"></script>
		<script src="<?= base_url('application') ?>/assets/compiled.1023.min75a0.js"></script>

		<link rel="stylesheet" href="<?= base_url('application') ?>/assets/fa/css/all.min.css">
  	</head>
<body>


	<header>
		<div class="container">
			<div>
				<img src="<?= base_url('application') ?>/assets/p1.jpg" height="50px">
					<span class="text1"><b>Bachillerato Mencion Ciencias</b>
				</span>
			</div>
			<!-- ESTRUCTURA DE NAVBAR -->
			<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand text-primary text1" href="#">Liceo Nacional Estado Miranda</a>
			  	<div class="collapse navbar-collapse" id="navbarNavDropdown">
				    <ul class="navbar-nav">
				      	<li class="nav-item active">
				        	<a class="nav-link" href="<?= base_url('') ?>">Liceo<span class="sr-only">(current)</span></a>
				      	</li>
					    <li class="nav-item">
					        <?= anchor('noticia', 'Eventos', ['class' => 'nav-link']) ?>
					    </li>
					    <li class="nav-item">
					        <?= anchor('proyecto', 'Noticias', ['class' => 'nav-link']) ?>
					    </li>
				    </ul>
			  	</div>
			</nav>
		</div>
	</header><br><br>




<section>
	<div class="container">
		<div class="row" style="background: grey;height: 70px;">
			<div class="col-md-12">
				<h2 class=" text-center mt-2 text1" style="color: black;">Liceo Mirada Motivando El Talento Natural</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5"><br><br><img src="<?= base_url('application') ?>/assets/p1.jpg" class="img-fluid img-thumbnail"></div>
			<div class="col-md-7">
				<h2 class=" text-center text2 mt-4">ExpoFeria Cientifica Liceo Miranda</h2><br>
				<article class="text2 text-justify">
					<b>Fecha:  Jueves 28 y Viernes 29 del 2018</b><br>
					<b>
						Hora: de 8:00 am a 1:00 pm <br>

						Lugar: Cancha Techada del platel <br>

					</b>
					<br>
					<b class="text-primary">Gestion Personal De Culto</b><br>
					<p class="text-left" style="color: grey;">
						Los Alumnos demostraran sus conocimientos a traves de dicha expoferia,
						exponiendo sus proyectos ante las Autoridades del plantel y los invitados
						de la Goberacion del Estado. </p>
						<blockquote´>Proyectos seran exhibidos con una creacion propia</blockquote>
						<cite>- Fernando Ortiz</cite>
						<hr>
						<ul class="text-primary">
							<li>Premio al 1° Lugar.  </li>
							<li>Premio al 2° Lugar.  </li>
							<li>Premio al 3° Lugar.</li>

						</ul>
						<br>
						<b>CELEBRACION</b>
						<p>
							 Nuestra institucion cumple su XXII Aniversario comprometidos con la
							 educación y el desarrollo de nuestra Venezuela y desde aquí colabora
							 para la formación de mejores jóvenes dispuestos a integrarse
							 a la evolución del país, capaces de obtener las más elevadas
							 metas con óptimos conocimientos adquiridos en la institución
						</p>
				</article>
			</div>
		</div>
	</div>
</section>
	<footer class="footer-distributed">

		<div class="footer-left">
			<a class="navbar-brand text1" style="color: black;" href="#">Liceo Nacional Estado Miranda</a>
			<p class="footer-links">
				<a href="#">Home</a>
				·
				<a href="#">Noticias</a>
				·
				<a href="#">Profesores</a>
				·
				<a href="#">Proyectos</a>
				·
				<a href="#">Acerca</a>
				·
				<a href="#">Contacto</a>
			</p>
			<p class="footer-company-name">Liceo Nacional Estado Miranda&copy; 2018</p>
		</div>
		<div class="footer-center">
			<div>
				<i class="fa fa-map-marker"></i>
				<p><span>2115, Calle Carreño, Turmero 2115, Municipio Santiago Mariño, Turmero</span>Venezuela. Aragua</span>
			</div>

			<div>
				<i class="fa fa-phone"></i>
				<p>+58 (244)417-94-14</p>
			</div>

			<div>
				<i class="fa fa-envelope"></i>
				<p><a href="mailto:support@company.com" style="color: black;">liceomiranda@gmail.com</a></p>
			</div>
		</div>
		<div class="footer-right">
			<p class="footer-company-about">
				<span>Acerca De Nosotros</span>
				Fue Fundada el 25 de Junio de 1995, bajo la tutela del Prof Domingo Molinari Amaral
				 y la Prof. Carmen de Molinari con la visión de Integrar y desarrollar al máximo las
				  capacidades y las cualidades de los estudiantes para su proceso de enseñanza y
				  aprendizaje.
			</p>

			<div class="footer-icons">

				<a href="#"><i class="fas fa-facebook"></i></a>
				<a href="#"><i class="fas fa-twitter"></i></a>
				<a href="#"><i class="fas fa-linkedin"></i></a>
				<a href="#"><i class="fas fa-github"></i></a>
			</div>
		</div>
	</footer>


</body>
</html>