<?php
include "encabezado.php";

echo "<p class='ERROR'>La página solicitada está en una zona privada. Inicie sesión para poder acceder a ella.</p>";
echo "<p>Ha solicitado la página:<br />";
//foreach($_SERVER as $a)
//	echo $a."<br />";
// echo $_SERVER["HTTP_REFERER"]."</p>";

include "pie.php";
?>