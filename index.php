<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Spy Inc.</title>

	<!-- Loading third party fonts -->
	<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="fonts/novecento-font/novecento-font.css" rel="stylesheet">

	<!-- Loading main css file -->
	<link href="style.css" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

</head>


<body>
	<?php
		include 'Functions/functions.php';
		//Creo el objeto Spy con todo lo necesario
		use Classes\Spy;
		spl_autoload_register(function($class){
			require_once str_replace('\\', '/',$class) . '.php';
		 });
		$Spy = new Spy();
		$Spy->importAgents("agents.csv");
		$Spy->fillAgentsMissions("missions.csv");	
	?>
	<div id="site-content">

		<header class="site-header">
			<div class="container">
				<a href="index.html" id="branding">
					<img src="images/logo.png" alt="Company Name" class="logo">
					<div class="branding-copy">
						<h1 class="site-title">Spy Inc.</h1>
						<small class="site-description">We know everything...</small>
					</div>
				</a>

				<nav class="main-navigation">
					<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
					<ul class="menu">
						<li class="menu-item current-menu-item"><a href="index.html">Home</a></li>
						<li class="menu-item"><a href="about.html">About Us</a></li>
						<li class="menu-item"><a href="experience.html">Experience</a></li>
						<li class="menu-item"><a href="service.html">Service</a></li>
						<li class="menu-item"><a href="contact.html">Contact</a></li>
					</ul>
				</nav>
				<nav class="mobile-navigation"></nav>
			</div>
		</header> <!-- .site-header -->

		<main class="main-content">
			<div class="hero">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<figure><img src="dummy/lawyers@2x.jpg" alt=""></figure>
						</div>
						<div class="col-md-4">
							<div class="hero-content">
								<h1 class="hero-title">Undercover Agents</h1>
								<p>Please, select the status you wish to see from our agents. By default, Inactive status is shown:</p>
								<form action="index.php" method="post">
									<select name="status">
										<option value="Inactive" selected>Inactive</option>
										<option value="Active" >Active</option>
									</select>
									<button type="submit"><img src="images/arrow@2x.png" alt=""></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- .hero-slider -->

			<div class="fullwidth-block" data-bg-color="#111113">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<!-- Ternaria para en caso de que se envíe el formulario, aparezca el estado de los agentes según la opción elegida -->
							<h2><?php echo !isset($_POST["status"]) ? "Inactive" : $_POST["status"];?> agent's list</h2>
							<ul>
								<?php
									//Uso la funcion para crear la lista de enlaces según la opción seleccionada en el formulario
									createAgentList($Spy->getAgentsList(),!isset($_POST["status"]) ? "Inactive" : $_POST["status"]);
								?>
							</li></ul></div>
					</div> <!-- .row -->
				</div> <!-- .container -->
			</div> <!-- .fullwidth-block -->

		</main> <!-- .main-content -->

		<footer class="site-footer">
			<div class="container">
				<div class="subscribe-form">
					<form action="#">
						<label for="#">
							<span>Do you want to get news?</span>
							<span>Join our news letter</span>
						</label>
						<div class="control">
							<input type="text" placeholder="Enter your email to subscribe...">
							<button type="submit"><img src="images/icon-envelope.png" alt=""></button>
					</form>
				</div>
			</div>
			<div class="social-links">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-google-plus"></i></a>
				<a href="#"><i class="fa fa-pinterest"></i></a>
			</div>
			<div class="copy">
				<p>Copyright 2023 Spy Inc. Designed by Themeezy. All rights reserved.</p>
			</div>
	</div>
	</footer> <!-- .site-footer -->

	</div> <!-- #site-content -->



	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>

</body>

</html>