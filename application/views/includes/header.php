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

<nav class="navbar navbar-dark bg-dark sticky-top py-0">
			
	<div class="mr-auto">
		<a href="#" data-activates="slide-out" class="btn p-3 button-collapsee"><i class="fa fa-bars fa-2x"></i></a>

		<a class="navbar-brand" href="#">
			<img src="<?= base_url('application') ?>/assets/google.svg" alt="lgoo"> Classroom
		</a>
	</div>

	<!-- <div class="m-auto">
		<button type="button" id="date-picker-example" class="btn btn-sm btn-primary datepicker">
			<i class="fas fa-clock"></i>
		</button>
	</div> -->
	
	<div class="ml-auto mr-1">
		<div class="avatar waves-effect waves-dark" style="width: 45px">
			<img src="<?= base_url('application') ?>/assets/img (28)-mini.jpg" alt="avatar" class="rounded-circle img-fluid">
		</div>
		
		<!-- <span class="navbar-text white-text">USER</span> -->
	</div>
</nav>


<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav fixed ">
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
			<ul class="social">
				<li><a href="#" class="icons-sm fb-ic"><i class="fab fa-facebook fa-2x mr-2"> </i></a></li>
				<li><a href="#" class="icons-sm pin-ic"><i class="fab fa-pinterest fa-2x mr-2"> </i></a></li>
				<li><a href="#" class="icons-sm gplus-ic"><i class="fab fa-google-plus fa-2x mr-2"> </i></a></li>
				<li><a href="#" class="icons-sm tw-ic"><i class="fab fa-twitter fa-2x mr-2"> </i></a></li>
			</ul>
		</li>
		<!--/Social-->
		<!-- Side navigation links -->
		<li>
			<ul class="collapsible collapsible-accordion">
				<li>
					<a class="collapsible-header waves-effect arrow-r">
						<i class="fa fa-chevron-right"></i> Submit blog
						<i class="fa fa-angle-down rotate-icon"></i>
					</a>
					<div class="collapsible-body">
						<ul>
							<li><a href="#" class="waves-effect">Submit listing</a></li>
							<li><a href="#" class="waves-effect">Registration form</a></li>
						</ul>
					</div>
				</li>
				<li>
					<a class="collapsible-header waves-effect arrow-r">
						<i class="fa fa-hand-pointer-o"></i> Instruction
						<i class="fa fa-angle-down rotate-icon"></i>
					</a>
					<div class="collapsible-body">
						<ul>
							<li><a href="#" class="waves-effect">For bloggers</a></li>
							<li><a href="#" class="waves-effect">For authors</a></li>
						</ul>
					</div>
				</li>
				<li>
					<a class="collapsible-header waves-effect arrow-r">
						<i class="fa fa-eye"></i> About
						<i class="fa fa-angle-down rotate-icon"></i>
					</a>
					<div class="collapsible-body">
						<ul>
							<li><a href="#" class="waves-effect">Introduction</a></li>
							<li><a href="#" class="waves-effect">Monthly meetings</a></li>
						</ul>
					</div>
				</li>
				<li>
					<a class="waves-effect arrow-r">
						<i class="fas fa-power-off mr-3"></i> Cerrar sesión
					</a>
				</li>
			</ul>
		</li>
		<!--/. Side navigation links -->
	</ul>
	<div class="sidenav-bg side-nav-dark"></div>
</div>
<!--/. Sidebar navigation -->