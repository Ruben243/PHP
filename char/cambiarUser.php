<?php
include "encabezado.php";
if(isset($_SESSION["idusuario"])){
        echo "<div class='personal'>";
		echo"<form method='post' action=''>";
		echo "<label>Cambiar usuario</label>";
		echo "<input type='text' name='user'>";
		echo "<br>";
		echo" <input type='submit'>";
		echo"</form>";
        echo "</div>";
        if(isset($_REQUEST['user'])){
	            $mensaje=''; 
		 	    $nameN=trim($_REQUEST['user']);

        if($nameN==''){
		      $mensaje.="El usuario no puede estar en blanco<br />";
		
		}
		if($nameN==$_SESSION['nombre']){
		
		   $mensaje.="El nuevo nombre es igual que el actual";
		
		
		}


				$mdb = new PDO("mysql:host=localhost;dbname=curso","usuariophp","clavephp");
				$sSQL = "UPDATE ``curso`.`usuarios` SET `nombre` = ?  WHERE `idusuario` = ?";
				$consulta = $mdb->prepare($sSQL);
				$idusuario=$_SESSION["idusuario"];
				$consulta->bindParam(1,$idusuario);
                $consulta->bindParam(2,$nameN);
	            $consulta->execute();
				
           if($consulta->rowCount()>0){
		   
		     $mensaje.="El nombre se a cambiado ";
		     $_SESSION["nombre"]=$nombre;
		   
		   }

              if(!$consulta->rowCount()>0){
			  $mensaje.="El usuario no se a cambiado ";
			 
			
			   } 

		   }

 
		
		
		}else{
		 echo"<p>registrese para cambiar el nombre</p>";
		
     

}







 include "pie.php";


?>