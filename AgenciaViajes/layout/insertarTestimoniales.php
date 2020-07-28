<?php
date_default_timezone_set('Europe/Madrid');
//login de la base de datos

if (isset($_POST['nombre']) && $_POST['nombre'] != '' && isset($_POST['email']) && $_POST['email'] != '' && isset($_POST['mensaje']) && $_POST['mensaje'] != '') {

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];


    $agenciaviajes = mysqli_connect("localhost", "root", "", "agenciadeviajes", 3306);
    if (!$agenciaviajes) {
        # code...
        die("conexion fallida" . mysqli_connect_error());
    } else {
        "Connected successfully";
    }
    
    $sql = "INSERT INTO testimoniales (nombre,email,mensaje) VALUES ('$nombre','$email','$mensaje ')";
    mysqli_select_db($agenciaviajes, "testimoniales");
    $datos = mysqli_query($agenciaviajes,$sql);

     if ($datos==true) {
         # code...
         header( "refresh:1;url=Testimoniales.php" ); 


     }else{
        echo "ERROR";
        header( "refresh:1;url=Testimoniales.php" ); 


     }






} else {
    echo "Rellene todos lo campos";
}
