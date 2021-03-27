<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login/login.php");
    exit;
}

// Include config file
require_once "login/config.php";

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Peliculas de </title>
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
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">Todas las Peliculas</span>
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
								<form method="post" action="#">
									<div class="row gtr-uniform">
										<div class="col-6 col-12-xsmall">
											<input type="text" name="nombre" id="nombre" value="" placeholder="Nombre Pelicula a Buscar">
										</div>
										<div class="col-12">
											<ul class="actions">
												<li><input type="submit" value="buscar" class="primary" name="buscar"></li>
												<li><input type="reset" value="Reset"></li>
											</ul>
										</div>
									</form>
							</section>
						<section>
							<table>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Duracion</th>
					<th>Año</th>
					<th>Genero</th>
					<th>Visto</th>
				</tr>
				<?php
				if(isset($_POST['buscar'])){
					$nombre=$_POST["nombre"];
				}

				  $consulta = "SELECT PELICULAS.id,PELICULAS.nombre,PELICULAS.duracion,PELICULAS.ano,GENEROS.nombre,VISTO.nombre
											FROM PELICULAS,VISTO,GENEROS
											WHERE GENEROS.id = PELICULAS.genero AND VISTO.id = PELICULAS.visto AND PELICULAS.nombre LIKE $nombre";
					$ejecutarConsulta = mysqli_query($enlace, $consulta);
					$verFilas = mysqli_num_rows($ejecutarConsulta);
					$fila = mysqli_fetch_array($ejecutarConsulta);

					if(!$ejecutarConsulta){
						echo"Error en la consulta";
					}else{
						if($verFilas<1){
							echo"<tr><td>Sin registros</td></tr>";
						}else{
							for($i=0; $i<=$fila; $i++){
								echo'
									<tr>
										<td>'.$fila[0].'</td>
										<td>'.$fila[1].'</td>
										<td>'.$fila[2].'</td>
										<td>'.$fila[3].'</td>
										<td>'.$fila[4].'</td>
										<td>'.$fila[5].'</td>
									</tr>
								';
								$fila = mysqli_fetch_array($ejecutarConsulta);
							}
						}
					}
				?>
			</table>
						</section>
					</div>
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
