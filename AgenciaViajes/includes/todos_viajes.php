<?php
session_start();
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

mysqli_select_db($agenciaviajes, "viajes");


$datos = mysqli_query($agenciaviajes, "select * from viajes");

while ($extra = $datos->fetch_array(MYSQLI_ASSOC)) {
    $_SESSION['imagen']= $extra['imagen'];
    echo "<div class='col-md-6 col-lg-4 mb-4'>";
    echo "<div class='card'><img class='img-fluid' src='../public/img/destinos_" . $extra['imagen'] . ".jpg'/>";
    echo "<div class='card-body'>";
    echo "<h2>" . $extra['titulo'] . "</h2>";
    echo "<p><i class='fas fa-calendar-alt'></i>" . $extra['fecha_ida'] . "-" . $extra['fecha_vuelta'] . "</p>";
    echo "<p><i class='fas fa-dollar-sign'></i>" . $extra['precio'] . "</p>";
    echo "<p>Praesent tincidunt ante at justo semper volutpat. Sed risus neque, scelerisque id dictum in placera";
    echo "</p><a class='btn btn-success btn-block' href='Viaje_indi.php?imagen=".$extra['imagen']."'>Mas Informacion</a>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
   
}

mysqli_close($agenciaviajes);
