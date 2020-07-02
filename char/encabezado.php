<?php include "config.php";
	
$success = isset($_SESSION["idusuario"]);
	// Inicializo variables de configuración
	$database = "mysql:host=localhost;dbname=curso";
	$userDB = "usuariophp";
	$passDB = "clavephp";


	$foto="";
	
	if ($success)
	{
		$fotoPerfil = "fotos/nophoto.png";
		$mdb = new PDO($database,$userDB,$passDB);
		$sSQL = "SELECT foto FROM usuarios WHERE idusuario=?";
		$consulta = $mdb->prepare($sSQL);
		$idusuario = $_SESSION["idusuario"];
		$consulta->bindParam(1,$idusuario);
		$consulta->execute();
		$fila=$consulta->fetch();
		if ($fila)
		{
			if ($fila["foto"]!="")
			{
				$fotoPerfil=$fila["foto"];
			}
		}
		$mdb = null;
		
		$opcionMenu = "<li><a href='/ruben/char/logout.php'>Cerrar Sesión</a></li>";
		$opcionMenu.="<li><a href='/ruben/char/cambiarUser.php'>Cambiar usuario</a></li>";
		$opcionMenu.="<li><a href='/ruben/char/perfil.php'>Perfil</a></li>";
		$fotoPerfil = "<div id='fotoUsuario'><img src='".$fotoPerfil."' /></div>";
		$saludo = "<div id='saludo'>".$_SESSION["nombre"]."</div>";
		
	}
	else {
		$opcionMenu = "<li><a href='/ruben/char/login.php'>Iniciar Sesión</a></li>";
		$saludo = "";
	}
	
	
	
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="mycss.css" />
</head>
<body>
<header>
<?php 
echo $fotoPerfil;
echo $saludo;
?>
<nav>
<ul>
<li><a href="index.php">Inicio</a></li>
<li><a href='/ruben/char/chat.php'>Chat</a></li>
<?php echo $opcionMenu ?>

</ul>
</nav>
</header>
<section>
