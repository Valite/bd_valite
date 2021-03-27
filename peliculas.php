<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /login/login.php");
    exit;
}

// Include config file
require_once "/login/config.php";

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Guardar peliculas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="images/slipknot.png" rel="icon" type="image/png"/>
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.php" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">Peliculas</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="index.php">Inicio</a></li>
							<li><a href="peliculas.php">Todas las peliculas</a></li>
							<li><a href="peliculas.php">.</a></li>
							<li><a href="peliculas.php">..</a></li>
							<li><a href="peliculas.php">...</a></li>
							<li><a href="login/reset-password.php" class="btn btn-warning">Reset Your Password</a></li>
        					<li><a href="login/logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
						<section>
							<h2>Formulario</h2>
							<form method="post" action="#">
								<div class="row gtr-uniform">
									<div class="col-6 col-12-xsmall">
										<input type="text" name="nombre" id="nombre" value="" placeholder="Nombre Pelicula">
									</div>
									<div class="col-6 col-12-xsmall">
										<input type="number" name="duracion" id="duracion" value="" placeholder="Duracion">
										<input type="date" name="ano" id="ano" value="" placeholder="Año">
									</div>
									<div class="col-12">
										<select name="genero" id="genero">
											<option value=""> -Elige Género- </option>
											<option value="0">Thriller</option>
											<option value="1">Gangsters y Mafiosos</option>
											<option value="2">Cine Negro</option>
											<option value="3">Musical</option>
											<option value="4">Cine Bélico</option>
											<option value="5">Western</option>
											<option value="6">Terror</option>
											<option value="7">Ciencia Ficción</option>
											<option value="8">Aventuras</option>
											<option value="9">Acción</option>
											<option value="10">Humor</option>
											<option value="11">Animacion</option>
											<option value="12">Drama</option>
											<option value="13">Histórico</option>
											<option value="14">Fantástico</option>
										</select>
									</div>
									<h3>Visto</h3>
									<div class="col-4 col-12-small">
										<input type="radio" id="demo-priority-low" name="demo-priority" value="1" checked>
										<label for="demo-priority-low">Si</label>
									</div>
									<div class="col-4 col-12-small">
										<input type="radio" id="demo-priority-normal" name="demo-priority" value="0">
										<label for="demo-priority-normal">No</label>
									</div>
								</div>
									<div class="col-12">
										<ul class="actions">
											<li><input type="submit" value="Guardar en BD" class="primary" name="guardar"></li>
											<li><input type="reset" value="Reset"></li>
										</ul>
									</div>
								</div>
							</form>
						</section>
					</div>

					<!-- Footer -->
						<footer id="footer">
							<div class="inner">
								<section>
									<h2>Get in touch</h2>
									<form method="post" action="#">
										<div class="fields">
											<div class="field half">
												<input type="text" name="name" id="name" placeholder="Name" />
											</div>
											<div class="field half">
												<input type="email" name="email" id="email" placeholder="Email" />
											</div>
											<div class="field">
												<textarea name="message" id="message" placeholder="Message"></textarea>
											</div>
										</div>
										<ul class="actions">
											<li><input type="submit" value="Send" class="primary" /></li>
										</ul>
									</form>
								</section>
								<section>
									<h2>Follow</h2>
									<ul class="icons">
										<li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon brands style2 fa-dribbble"><span class="label">Dribbble</span></a></li>
										<li><a href="#" class="icon brands style2 fa-github"><span class="label">GitHub</span></a></li>
										<li><a href="#" class="icon brands style2 fa-500px"><span class="label">500px</span></a></li>
										<li><a href="#" class="icon solid style2 fa-phone"><span class="label">Phone</span></a></li>
										<li><a href="#" class="icon solid style2 fa-envelope"><span class="label">Email</span></a></li>
									</ul>
								</section>
								<ul class="copyright">
									<li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
								</ul>
							</div>
						</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
<?php
	if(isset($_POST['guardar'])){
		$nombre=$_POST["nombre"];
		$duracion=$_POST["duracion"];
		$ano=$_POST["ano"];
		$genero=$_POST["genero"];
		$visto=$_POST["demo-priority"];

		if (!$enlace->query("INSERT INTO PELICULAS(nombre,duracion,ano,visto,genero) VALUES('$nombre','$duracion','$ano','$visto','$genero')")) {
		echo "Falló la creación de la tabla: (" . $enlace->errno . ") " . $enlace->error;
		}
		/*echo "$nombre,$duracion,$ano,$genero,$visto";*/
	}
?>
