<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json;");

include_once '../config/Database.php';
include_once '../Class/Servicios.php';

$database = new Database();
$db = $database->getConnection();

$servicio = new Servicios($db);

$resultado = $servicio->leerTodos();
$longitud = count($resultado);
if ($longitud > 0) {

    foreach ($resultado as $row) {
        $resultadoLimpio[] = array(
            "id" => $row['id'],
            "nombre" => $row['nombre'],
            "precio" => $row['precio']

        );
    }

    http_response_code(200);
    echo json_encode($resultadoLimpio);
} else {
    http_response_code(404);
    echo json_encode(array("message" => " No hay Servicios"));
}
