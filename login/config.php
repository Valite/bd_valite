<?php
	/*$servidor="localhost";*/
	$servidor="eu-cdbr-west-01.cleardb.com";
	/*$usuario="root";*/
	$usuario="b2e9d5b41af2da";
	/*$clave="";*/
	$clave="9f03ac44";
	/*$baseDeDatos="BD_PELICULAS";*/
	$baseDeDatos="heroku_1a05ed0c5d22f8f";

	$enlace=mysqli_connect($servidor,$usuario,$clave,$baseDeDatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}
?>