<?php 
include "config.php";
if (!$success){
	header("location:prohibido.php");
}


$conexionBD = new PDO($database,$userDB,$passDB); 
$textoSQL = "SELECT fechahora,texto,nombre,foto FROM chat LEFT JOIN usuarios ON chat.idusuario=usuarios.idusuario ORDER BY fechahora DESC";
$sentenciaSQL = $conexionBD->prepare($textoSQL);
$sentenciaSQL->execute();
while ($mensaje = $sentenciaSQL->fetch())
{
	$resultado.= "<div class='claseModestoMensaje'>";
	$resultado.= "<div class='encabezadoMensaje'>";
	if (trim($mensaje["foto"])=="") 
		$resultado.=  "<img src=".$mensaje["foto"]." />";
	else
	$resultado.= "<img src='".$mensaje["foto"]."' />";
	$resultado.=  "<div class='nombreAutor'>".$mensaje["nombre"]."</div>";
	$resultado.=  "<div class='fechaMensaje'>".$mensaje["fechahora"]."</div>";
	$resultado.=  "</div>";
	$resultado.=  "<div class='textoMensaje'>".$mensaje["texto"]."</div>";
	$resultado.=  "</div>";
}
$sentenciaSQL=null;
$conexionBD=null;

$a["resultado"]=$resultado;
$a["error"]="No hay errores";
$a["numMensajes"]=$numMensajes;
$a["autor"]="ruben";

$myJson=json_encode($a);

echo $myJson;

?>