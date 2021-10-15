<?php include 'includes/header.php';

// conectar a la db POO sentencias preparadas
$db = new mysqli('localhost:3306', 'ruben', 'Cuelebre243*', 'bienesRaices');

// crear query
$query = "Select titulo,precio,descripcion from propiedades";

// preparar query
$stmt = $db->prepare($query);

// lo ejecutamos
$stmt->execute();

// creamos la variables
$stmt->bind_result($titulo, $precio, $descripcion);

// asignamos el resultado yrecorremos elresultado
while ($stmt->fetch()) :
    var_dump($titulo);
    var_dump($precio);
    var_dump($descripcion);
endwhile;

include 'includes/footer.php';
