<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio de Sesión</title>
	<link rel="stylesheet" href="<?= base_url('application') ?>/assets/mdb.min.css">
	<link rel="stylesheet" href="<?= base_url('application') ?>/assets/fa/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url('application') ?>/assets/estilos.css">
</head>
<body class=""> <!-- black-skin -->

<?php if( $this->session->has_userdata('sesion') ): ?>
				
	<nav class="navbar navbar-dark bg-dark sticky-top py-0 navbar-expand-lg">
				
		<div class="mr-auto">
			<a href="#" data-activates="slide-out" class="btn p-3 button-collapsee"><i class="fa fa-bars fa-2x"></i></a>

			<a class="navbar-brand" href="#">
				<img src="<?= base_url('application') ?>/assets/logo-mdb-jquery-small.png" alt="logo">
			</a>
		</div>

		<!-- <div class="m-auto">
			<button type="button" id="date-picker-example" class="btn btn-sm btn-primary datepicker">
				<i class="fas fa-clock"></i>
			</button>
		</div> -->
		
		<div class="ml-auto mr-1">
			
			<?php if ( $user['role'] == 'profesor' ): ?>
				
				<p class="navbar-text white-text"><?= anchor('https://docs.google.com/forms/u/0/d/1ljxTuDGYSjuElImNkafnqu1Vj3DgViMfrzCTV6hy2qY/edit?ntd=1&usp=forms_home&ths=true', '<i class="fas fa-pencil-alt mr-1"></i> Crear evaluación', ['target' => '_blank']) ?></p>
			<?php endif ?>
			
		</div>
	</nav>

	<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="#"><strong>Navbar</strong></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Profile</a>
					</li>
				</ul>
			</div>
		</div>
	</nav> -->

	<!-- Sidebar navigation -->
	<div id="slide-out" class="side-nav">
		<ul class="custom-scrollbar">
			<!-- Logo -->
			<li>
				<div class="logo-wrapper waves-light">
					<a href="#"><img src="<?= base_url('application') ?>/assets/logo-mdb-jquery-small.png" class="img-fluid flex-center"></a>
				</div>
			</li>
			<!--/. Logo -->
			<!--Social-->
			<li>
				<ul class="social text-center text-uppercase">
					<li><i class="fas fa-user mr-2"></i><?= $user['usuario'] ?></li>
				</ul>
			</li>
			<!--/Social-->
			<!-- Side navigation links -->
			<li>
				<ul class="collapsible collapsible-accordion">
					<li>
						<?php if( $user['role'] == 'alumno' ): ?>

							<?= anchor('estudiante', '<i class="fas fa-home mr-3"></i> Inicio', 'class="waves-effect arrow-r collapsible-header"') ?>
							
							<?php elseif( $user['role'] == 'profesor' ): ?>

								<?= anchor('profesor', '<i class="fas fa-home mr-3"></i> Inicio', 'class="waves-effect arrow-r collapsible-header"') ?>
						
							<?php else: ?>

								<?= anchor('administrador', '<i class="fas fa-home mr-3"></i> Inicio', 'class="waves-effect arrow-r collapsible-header"') ?>
						<?php endif ?>
					</li>
					<li>
						<?= anchor('perfil', '<i class="fas fa-user mr-3"></i> Perfil', 'class="waves-effect arrow-r collapsible-header"') ?>
					</li>
					<li>
						<?= anchor('administracion', '<i class="fas fa-star mr-3"></i> Administración', 'class="waves-effect arrow-r collapsible-header"') ?>
					</li>
					<li>
						<?= anchor('logout', '<i class="fas fa-power-off mr-3"></i> Cerrar sesión', 'class="waves-effect arrow-r collapsible-header"') ?>
					</li>
				</ul>
			</li>
			<!--/. Side navigation links -->
		</ul>
		<div class="sidenav-bg side-nav-dark"></div>
	</div>
	<!--/. Sidebar navigation -->

<?php endif ?>
