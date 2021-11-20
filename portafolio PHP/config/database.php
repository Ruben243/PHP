<?php

function conectarDb(): mysqli {
    $db = new mysqli('', '', '', '');

    if (!$db) {
        echo "Fallo al conectar a la base de datos";
        exit;
    }
    return $db;
}
