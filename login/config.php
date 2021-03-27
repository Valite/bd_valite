<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDeDatos="BD_PELICULAS";

	$enlace=mysqli_connect($servidor,$usuario,$clave,$baseDeDatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}
?>