<?php
include "config.php";
if (!$success){
	header("location:prohibido.php");
}
$errores="";
if (isset($_REQUEST["texto"]))
{
	$texto = trim($_REQUEST["texto"]);
	if ($texto=="")
	{
			$errores.="ERROR. El texto no puede estar en blanco<br />";
	}
	
	if ($errores == "")
	{
		$conexionBD = new PDO($database,$userDB,$passDB); 
		$textoSQL = "INSERT INTO chat (idusuario,texto) VALUES (?,?)";
		$sentenciaSQL = $conexionBD->prepare($textoSQL);
		$idusuario=$_SESSION["idusuario"];
		$sentenciaSQL->bindParam(1,$idusuario);
		$sentenciaSQL->bindParam(2,$texto);
		$sentenciaSQL->execute();
		
		$sentenciaSQL=null;
		$conexionBD=null;

   include "pie.php";

	}
}




?>