<?php

function obtenerServicios():array
{
    try {
        //importar conexion
        require "database.php";
        //escribir codigo sql
        $sql = "select * from servicios";
        $consulta = mysqli_query($db, $sql);
        //array para todos los resultado
        $servicios = [];

        $i = 0;

        //obtener resultados
        while ($row = mysqli_fetch_assoc($consulta)) {
            $servicios[$i]['id'] = $row['id'];
            $servicios[$i]['nombre'] = $row['nombre'];
            $servicios[$i]['precio'] = $row['precio'];
            $i++;
        }
      return $servicios;
    } catch (\Throwable $th) {
        var_dump($th);
    }
}
obtenerServicios();
