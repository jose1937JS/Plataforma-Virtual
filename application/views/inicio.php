<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LICEO NACIONAL ESTADO MIRANDA</title>
	<link rel="stylesheet" href="<?= base_url('application') ?>/assets/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('application') ?>/assets/main.css">

	<link rel="stylesheet" href="<?= base_url('application') ?>/assets/fa/css/all.min.css">
</head>

<body>
	<header>
		<div class="container">
			<div>
				<img src="<?= base_url('application') ?>/assets/p1.jpg" height="50px"><span class="text1"><b>Bachillerato Mencion Ciencias</b></span>
			</div>
			<!-- ESTRUCTURA DE NAVBAR -->
			<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand text-primary text1" href="#">LICEO NACIONAL ESTADO MIRANDA</a>
			  	<div class="collapse navbar-collapse" id="navbarNavDropdown">
				    <ul class="navbar-nav">
				      	<li class="nav-item active">
				        	<a class="nav-link" href="#">Liceo<span class="sr-only">(current)</span></a>
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
		<!-- CAROUSELL -->
		<div class="row">
			<div class="col-md-7 offset-md-1 ">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				  	<ol class="carousel-indicators">
				    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				  	</ol>
				  	<div class="carousel-inner">
				    <div class="carousel-item active">
				      	<img class="d-block w-100" src="<?= base_url('application') ?>/assets/p3.jpg" height="300px" alt="Second slide">
				      	<div class="carousel-caption d-inline-block">
						</div>
				    </div>
				    <div class="carousel-item">
				      	<img class="d-block w-100" src="<?= base_url('application') ?>/assets/p4.jpg"  height="300px" alt="Third slide">
				       	<div class="carousel-caption d-inline-block">
						    <h3 style="color: #1E8AE5"></h3>
						</div>
				    </div>
				    <div class="carousel-item">
				      	<img class="d-block w-100" src="<?= base_url('application') ?>/assets/p5.jpg"  height="300px" alt="Third slide">
				       	<div class="carousel-caption d-inline-block">
						</div>
				    </div>
				    <div class="carousel-item">
				      	<img class="d-block w-100" src="<?= base_url('application') ?>/assets/p6.JPG"  height="300px" alt="Third slide">
				       	<div class="carousel-caption d-inline-block">
						</div>
				    </div>

				  	</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					</a>
				</div>
			<!-- TEMAS DE INTERES- -->
			</div>
			<div class="col-md-3" style="background: #F2F2F2;">
				<p class="text1">Noticias Y Eventos</p>
				<ul class="Gra-2">
					<li>
						<a href="./noticias1.php">
							<span class="text2"> Liceo Miranda Vanguardia De Ciencia</span>
						</a><br>
						<small>2018</small>
						<hr>
					</li>
					<li>
						<a href="">
							<span class="text2">Programa De Estudios Superiores</span>
						</a><br>
						<small>2018</small>
						<hr>
					</li>
					<li>
						<a href="">
							<span class="text2">Profesores Dedicados A La Formacion</span>
						</a><br>
						<small>2018</small>
						<hr>
					</li>
					<li>
						<a href="">
							<span class="text2">Visitanos Y Conoce Nuestros Estudios</span>
						</a><br>
						<small>2018</small>
						<hr>
					</li>
				</ul>
			</div><br>
		</div>
		<!-- ENLACES DE NAVEGACION -->
		<div class="row">
			<div class="col-md-7 offset-md-1" style="margin-top: -100px;">
				<a>
					<img src="<?= base_url('application') ?>/assets/estudiantes.png" width="245px">
				</a>
				<a href="<?= site_url('inicio') ?>">
					<img src="<?= base_url('application') ?>/assets/entorno.png" width="245px">
				</a>
				<a style="margin-left: 8%;" href="http://www.me.gob.ve/index.php">
					<img src="<?= base_url('application') ?>/assets/educacion.png" width="17%;">
				</a>
			</div>
		</div>

		<div class="row" style="margin-top: -20px;">

			<div class="card col-md-2 offset-md-1 mr-2" style="background: #F2F2F2;">
		  		<img class="card-img-top" src="<?= base_url('application') ?>/assets/12.jpg" height="110px" alt="Card image cap">
			  	<div class="card-block">
			  		<h5 class="text1"><a href="./proyectos1.php">Artesenia General</a></h5>
			    	<p class="text2">Garantizando nuestros valores en la cultura de nuestrio pais</p>
			  	</div>
			</div>
			<div class="card col-md-2 mr-2">
			  	<img class="card-img-top" src="<?= base_url('application') ?>/assets/noticia2.jpg" height="110px" alt="Card image cap">
			  	<div class="card-block">
			  		<h5 class="text1"><a href="">Revista De Actividades</a></h5>
			    	<p class="text2">*23 de Julio Graduacion de la promo XXIII</p>
			  	</div>
			</div>
			<div class="card col-md-2 mr-2">
			  	<img class="card-img-top" src="<?= base_url('application') ?>/assets/15.jpg" height="110px" alt="Card image cap">
			  	<div class="card-block">
			  		<h5 class="text1"><a href="">Profesores Titulares</a></h5>
			    	<p class="text2">Profesionales de maxima calidad para la educacion de nuestros jovenes</p>
			  	</div>
			</div>
			<div class="card col-md-2">
			  	<img class="card-img-top" src="<?= base_url('application') ?>/assets/11.jpg" height="110px" alt="Card image cap">
			  	<div class="card-block">
			  		<h5 class="text1"><a href="">Areas Deportivas</a></h5>
			    	<p class="text2">Ultimas jornadas deportivas durante el periodo escolar 2017-2018</p>
			  	</div>
			</div>
			<div class="col-md-2">
				<h5 class="text1">Areas De Estudio</h5>
				<ul class="Gra-2">
					<li>
						<a href=""><img  height="44px" src="<?= base_url('application') ?>/assets/quimica2.png"></i></a>
						<small class="text-primary">Quimica</small>
					</li><br>
					<li>
						<a href=""><img  height="44px" src="<?= base_url('application') ?>/assets/computacion.png"></i></a>
						<small class="text-primary">Computacion</small>
					</li><br>
					<li>
						<a href=""><img  height="44px" src="<?= base_url('application') ?>/assets/fisica.png"></i></a>
						<small class="text-primary">Fisica</small>
					</li><br>
					<li>
						<a href=""><img  height="44px" src="<?= base_url('application') ?>/assets/matematica2.jpg"></i></a>
						<small class="text-primary">Matematica</small>
					</li>
				</ul>
			</div>
		<div class="row">
			<div class="col-md-7 offset-md-1"><br><br>
				<h5 class="text1"><b>Nuestros Valores Y Misiones</b></h5>
				<article>
					<p class="text-justify">
					Nuestra visión es Integrar y desarrollar al máximo las capacidades y las cualidades de los estudiantes para su proceso de enseñanza y aprendizaje. Implementando estrategias, métodos y técnicas necesarias para la comunidad-familia-liceo; como alternativa de participación comunitaria con la aplicación de los valores y principios filosóficos fundamentados en los legados de pensadores venezolanos el propósito de reafirmar los valores de amor y respeto, enseñados en el hogar, Así mismo tiene un pensum de estudio completo y de excelencia educativa
					</p>
				</article>
			</div>
			<div class="col-md-3 mt-2">
				<img src="<?= base_url('application') ?>/assets/p7.jpg" class="img-thumbnail">
			</div>
		</div>
	</section>
	<footer class="footer-distributed">

		<div class="footer-left">
			<a class="navbar-brand text1" style="color: black;" href="#">LICEO NACIONAL ESTADO MIRANDA</a>
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
		<div class="footer-center mt-5">
			<div class="">
				<i class="fas fa-map-marker"></i>
				<p><span>2115, Calle Carreño, Turmero 2115, Municipio Santiago Mariño, Turmero</span>Venezuela. Aragua</p>
			</div>

			<div>
				<i class="fas fa-phone"></i>
				<p>+58 (244)417-94-14</p>
			</div>

			<div>
				<i class="fas fa-envelope"></i>
				<p><a href="mailto:support@company.com" style="color: black;">liceomiranda@gmail.com</a></p>
			</div>
		</div>
		<div class="footer-right">
			<p class="footer-company-about">
				<span>Acerca De Nosotros</span>
				Fue Fundada el 25 de Junio de 1995, bajo la tutela del Prof Domingo Molinari Amaral y la Prof. Carmen de Molinari con la visión de Integrar y desarrollar al máximo las capacidades y las cualidades de los estudiantes para su proceso de enseñanza y aprendizaje.
			</p>

			<div class="footer-icons">

				<a href="#"><i class="fab fa-facebook"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-linkedin"></i></a>
				<a href="#"><i class="fab fa-github"></i></a>
			</div>
		</div>
	</footer>

	<script src="<?= base_url('application') ?>/assets/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url('application') ?>/assets/compiled.1023.min75a0.js"></script>
</body>
</html>