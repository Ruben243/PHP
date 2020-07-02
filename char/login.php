<?php
include "encabezado.php";

if (isset($_REQUEST["user"]))
{
	$user = strtolower($_REQUEST["user"]);
	$pass = $_REQUEST["pass"];
	$pass = hash("sha256",$pass);
	$mdb = new PDO("mysql:host=localhost;dbname=curso","usuariophp","clavephp");
	$sSQL = "SELECT idusuario,login,clave,nombre FROM usuarios WHERE login=? AND clave=? LIMIT 1";
	$consulta = $mdb->prepare($sSQL);
	$consulta->bindParam(1,$user);
	$consulta->bindParam(2,$pass);
	$consulta->execute();
	$fila=$consulta->fetch();
	
	if ($fila)
	{
		$_SESSION["idusuario"]=$fila["idusuario"];
		$_SESSION["nombre"]=$fila["nombre"];
		$success = true;
		echo "<p>Bienvenido, ".$_SESSION["nombre"]."</p>";
	}
	else
	{
		echo "<p class='ERROR'>Usuario o contraseña incorrectos</p>";
	}
	$mdb=null;
}
if ($success)
{
			header("location:/ruben/char/perfil.php");
}
else
{
	echo "<form class=\"loginForm\" method=\"POST\" action=\"\">";
	echo "<p>";
	echo "<label for=\"user\">Usuario:</label>";
	echo "<input name=\"user\" id=\"user\" value=\"\" />";
	echo "</p>";
	echo "<p>";
	echo "<label for=\"pass\">Contraseña:</label>";
	echo "<input type=\"password\" name=\"pass\" id=\"pass\" value=\"\" />";
	echo "</p>";
	echo "<p>";
	echo "<input type=\"submit\" value=\"Login\" />";
	echo "</p>";
	echo "</form>";
}

include "pie.php";

?>