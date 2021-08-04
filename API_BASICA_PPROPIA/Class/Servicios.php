<?php
class Servicios{
    public function __construct($db){
        $this->conexion = $db;
    }


    function leerTodos(){
        $sql = $this->conexion->prepare("select * from servicios");
        $sql->execute();
        $resultado = $sql->fetchall();
        return $resultado;
    }

}
