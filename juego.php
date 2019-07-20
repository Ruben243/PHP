<?php
session_start();

if (!isset($_SESSION["contador"]))
{
	$_SESSION["contador"] = 0;
	$_SESSION["objetivo"] = rand(1,5);
}
$mensaje = "";

if (isset($_REQUEST["num"]))
{
	$_SESSION["contador"] = $_SESSION["contador"] +1;
	$numero = $_REQUEST["num"];

	if ($numero == $_SESSION["objetivo"])
	{
		$mensaje = "ACERTASTE. Has usado ".$_SESSION["contador"]." intentos";
		session_destroy();
	}
	else if ($numero > $_SESSION["objetivo"])
	{
		$mensaje = "TE HAS PASADO. Llevas ".$_SESSION["contador"]." intentos";
	}
	else
	{
		$mensaje = "TE HAS QUEDADO CORTO. Llevas ".$_SESSION["contador"]." intentos";
	}
}
?>
<html>
<head>
</head>
<body>
<?php echo "<p>".$mensaje."</p>"; ?>
<p>Introduce un número del 1 al 5</p>
<form method="POST" action="">
<input id="num" name="num" value="" />
<input type="submit" value="Enviar" />
</form>
</body>
</html>