<?php
$db=mysqli_connect('localhost','root','Cuelebre243*','appsalon');
if (!$db) {
    # code...
    echo "Error en la conexion";
    exit;
}else{
    //  echo "Conexion correcta";
}