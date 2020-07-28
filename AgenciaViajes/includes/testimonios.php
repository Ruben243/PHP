<?php
//Establezco la zona horaria para que no me de problemas
date_default_timezone_set('Europe/Madrid');
//login de la base de datos
$agenciaviajes = mysqli_connect("localhost", "root", "", "agenciadeviajes", 3306);
if (!$agenciaviajes) {
    # code...
    die("conexion fallida" . mysqli_connect_error());
} else {
    "Connected successfully";
}

mysqli_select_db($agenciaviajes, "testimoniales");


$datos = mysqli_query($agenciaviajes, "select * from testimoniales LIMIT 3");

while ($extra = $datos->fetch_array(MYSQLI_ASSOC)) {
    echo "<div class='col-md-6 col-lg-4 mb-4'>";
    echo "<div class='card'>";
    echo "<div class='car body'>";
    echo " <blockquote class='blockquote'></blockquote>";
    echo "<p class='mb-0'>".$extra['mensaje']."</p>";
    echo "<footer class='blockquote-footer'>".$extra['nombre']."</footer>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

mysqli_close($agenciaviajes);
