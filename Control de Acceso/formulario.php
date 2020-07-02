<?php
    session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="estilo.css" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>
<body>
	<?php
		include "navegador.php";
    ?>

	<div id="contenedor">
		<form action="inicioSesion.php" method="POST">
			<label for="user">Usuario: </label></br><input type="text" id="user" name="user"  style="color:white;"></br>
			<label for="contra">Contraseña: </label></br><input type="password" id="contra" name="pass" style="color:white;"></br>
			<button type="submit">Enviar</button>
		</form>
	</div>

</body>
</html>