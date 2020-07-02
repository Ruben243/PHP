<?php session_start();
	$success = isset($_SESSION["idusuario"]);

	// Inicializo variables de configuración
	$database = "mysql:host=localhost;dbname=curso";
	$userDB = "usuariophp";
	$passDB = "clavephp";
?>