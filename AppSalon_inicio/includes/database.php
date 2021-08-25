<?php
$db=mysqli_connect('localhost','root','','appsalon');
if (!$db) {
    # code...
    echo "Error en la conexion";
    exit;
}else{
    //  echo "Conexion correcta";
}
