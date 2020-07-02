<html>
<head>
</head>
  <body>
  <script>

	function  cambioPais(a){
     clavePais=a[a.selectedIndex].value;
	 var cc=document.getElementById("city");
	 ajax=nuevoAjax();

	 var url="ciudades.php?codigo="+ clavePais;
	 ajax.open("GET",url,true);

	  ajax.onreadystatechange=function(){
		if (ajax.readyState==4) {
				 cc.innerHTML=ajax.responseText;
			}
		}
		ajax.send();

	}   
  
 
function nuevoAjax(){
	var xmlhttp=false;
 	try {
 		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
 	} catch (e) {
 		try {
 			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 		} catch (E) {
 			xmlhttp = false;
 		}
  	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
 		xmlhttp = new XMLHttpRequest();
	}
	
		return xmlhttp;
	}



  </script>
   <label for="paises">Paises</label>	
 	<select name="paises" id="country" onChange="cambioPais(this);">
	  <?php
	   	// Inicializo variables de configuración
		$database = "mysql:host=localhost;dbname=world";
		$userDB = "usuariophp";
		$passDB = "clavephp";
	    $conexionBD = new PDO($database,$userDB,$passDB); 
		$textoSQL = "SELECT code,Name FROM world.country order by name asc";
		$sentenciaSQL = $conexionBD->prepare($textoSQL);
		$sentenciaSQL->execute();

		while ($mensaje = $sentenciaSQL->fetch()){
               echo "<option value='".$mensaje['code']."'>".$mensaje["Name"]."</option>";

		}
	
	  
	  $sentenciaSQL=null;
     $conexionBD=null;
	  ?>
	</select>
	
 <select name="ciudades" id="city">
 	
</select>


 </body>

</html>