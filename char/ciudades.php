<?php
$pais=$_REQUEST["codigo"];

	// Inicializo variables de configuración
		$database = "mysql:host=localhost;dbname=world";
		$userDB = "usuariophp";
		$passDB = "clavephp";
	    $conexionBD = new PDO($database,$userDB,$passDB); 
		$textoSQL = "SELECT  id,name FROM city  where countrycode=? order by name asc";
		$sentenciaSQL = $conexionBD->prepare($textoSQL);
        $sentenciaSQL->bindParam(1,$pais);
         $sentenciaSQL->execute();

		while ($ciudad = $sentenciaSQL->fetch()){
             echo "<option id='".$ciudad['id']."'>".$ciudad["name"]."</option>";
  

		}
     $sentenciaSQL=null;
     $conexionBD=null;


?>