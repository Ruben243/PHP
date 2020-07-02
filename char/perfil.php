<?php
include "encabezado.php";

$errores="";
if (isset($_REQUEST["nombre"])){
	$nombre = trim($_REQUEST["nombre"]);
	$email = trim($_REQUEST["email"]);
	if ($nombre==""){
			$errores.="ERROR. El nombre no puede estar en blanco<br />";
	}
	if ($email==""){
			$errores.="ERROR. El eMail no puede estar en blanco<br />";
	}
	
	if ($errores == ""){
		$textoSQLFoto="";
		if (isset($_FILES["foto"])){
			$nombreFoto = "fotos/".$_FILES["foto"]["name"];
			move_uploaded_file($_FILES["foto"]["tmp_name"],$nombreFoto);
			$textoSQLFoto = ", foto=? ";
		}



		$conexionBD = new PDO($database,$userDB,$passDB); 
		$textoSQL = "UPDATE usuarios SET nombre=?,email=? ";
		$textoSQL .= $textoSQLFoto;
		$textoSQL .= " WHERE idusuario=?";
		$sentenciaSQL = $conexionBD->prepare($textoSQL);
		$sentenciaSQL->bindParam(1,$nombre);
		$sentenciaSQL->bindParam(2,$email);
		$idusuario=$_SESSION["idusuario"];
		if ($textoSQLFoto==""){
			$sentenciaSQL->bindParam(3,$idusuario);
		}
		else{
			$sentenciaSQL->bindParam(3,$nombreFoto);
			$sentenciaSQL->bindParam(4,$idusuario);
		}
		$sentenciaSQL->execute();
		if ($sentenciaSQL->rowCount()>0){
			echo "<p>Datos guardados correctamente</p>";
			$_SESSION["nombre"]=$nombre;
		}
		
		
		$sentenciaSQL=null;
		$conexionBD=null;


	}
}
       
echo "<div class='personal2'>";
echo "<p class='ERROR'>".$errores."</p>";
echo "<form class='chgProfile' method='POST' enctype='multipart/form-data' >";
echo"<p>";
echo "<label for='nombre' >Nombre de Usuario:</label>";
echo "<input name='nombre' id='nombre' value='".$_SESSION["nombre"]."' />";
echo"</p>";
echo"<p>";
echo "<label for='foto'>Foto de Perfil:</label>";
echo "<input name='foto' id='foto' value='' type='file' />";
echo"</p>";
echo"<p>";
echo "<label for='email'  >Email de Perfil:</label>";
echo "<input type='email' name='email' value='email'>";
echo"</p>";
echo"<p>";
echo "<input type='submit' value='Guardar Datos' />";
echo"</p>";
echo "</form>";
 echo "</div>";
include "pie.php";
?>