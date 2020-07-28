<?php
session_start();
date_default_timezone_set('Europe/Madrid');


$agenciaviajes = mysqli_connect("localhost", "root", "", "agenciadeviajes", 3306);
if (!$agenciaviajes) {
    # code...
    die("conexion fallida" . mysqli_connect_error());
} else {
    "Connected successfully";
}

mysqli_select_db($agenciaviajes, "viajes");
$datos = mysqli_prepare($agenciaviajes, "select titulo,precio,fecha_ida,fecha_vuelta,descripcion,disponibles,imagen from viajes where imagen=?");
$datos->bind_param("s", $_GET['imagen']);
$datos->execute();
$datos->bind_result($titulo, $precio, $fecha_ida, $fecha_vuelta, $descripcion, $disponibles, $imagen);
while ($datos->fetch()) {
    echo "<div class='row'>";
    echo "<div class='col-md-5'><img class='img-fluid' src='../public/img/destinos_" . $imagen . "_ln.jpg' /></div>";
    echo "<div class='col-md-7'>";
    echo "<h1>$titulo<p><i class='fas fa-calendar-alt'></i> $fecha_ida - $fecha_ida";
    echo " </p>";
    echo "<p><i class='fas fa-dollar-sign'></i> $precio</p>";
    echo "<p> <i class='fas fa-users'></i> $disponibles</p>";
    echo "</h1>";
    echo "<p> $descripcion.</p>";
    echo "</div>";
    echo "</div>";
}


session_destroy();
mysqli_close($agenciaviajes);
