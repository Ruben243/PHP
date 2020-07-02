<?php 
include "encabezado.php";
include "funcionesJS.html";

$errores="";
if (isset($_REQUEST["texto"]))
{
	$texto = trim($_REQUEST["texto"]);
	if ($texto=="")
	{
			$errores.="ERROR. El texto no puede estar en blanco<br />";
	}
	
	if ($errores == ""){
		$conexionBD = new PDO($database,$userDB,$passDB); 
		$textoSQL = "INSERT INTO chat (idusuario,texto) VALUES (?,?)";
		$sentenciaSQL = $conexionBD->prepare($textoSQL);
		$idusuario=$_SESSION["idusuario"];
		$sentenciaSQL->bindParam(1,$idusuario);
		$sentenciaSQL->bindParam(2,$texto);
		$sentenciaSQL->execute();
		
	


	}
}


//echo "<form method='POST' action='insertarMensaje.php'>";
echo "<textarea name='texto' id='texto'></textarea>";
echo "<p>";
echo "<button type='submit' onclick='insertarMensaje()'>Enviar Mensaje</button>";
echo "</p>";
//echo "</form>";

echo "<div id='listaMensajes'>";
include "listaMensajes.php";
echo "</div>";


include "pie.php";

?>

<script language="javascript" type="text/javascript">

function insertarMensaje(){
 var tt=document.getElementById("texto").value;
 ajax=nuevoAjax();

var url ="insertarMensaje.php?texto="+tt;
ajax.open("GET",url,true);

ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			 ObtenerMensajes();
		}
	}
	ajax.send();

}


function ObtenerMensajes(){
	var cc = document.getElementById("listaMensajes");
	ajax=nuevoAjax();
	
	var url = "listaMensajes.php";
	ajax.open("GET",url,true);
	
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//cc.innerHTML = ajax.responseText;
			a=JSON.parse(ajax.responseText);
            cc.innerHTML=a.resultado;
			alert(a.numMensajes + " Mensajes recibidos");
		}
	}
	ajax.send();
}
ObtenerMensajes();
</script>