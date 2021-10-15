<?php include 'includes/header.php';

// conexion por pdo sin sentencias preparadas
$db = new PDO('mysql:host=localhost:3306;dbname=bienesRaices', 'ruben', 'Cuelebre243*');

$query = "select titulo from propiedades";

$stmt = $db->prepare($query);

$stmt->execute();

$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC); //trae todos los resultados,le pasamos por parametro omo queremos los resultados
// $resultado = $stmt->fetchColumn($titulo); trae los resultados de la columna que le pases

foreach ($resultado as $propiedad) {
    echo "<pre>";
    echo $propiedad['titulo'];
    echo "</pre>";
}



include 'includes/footer.php';
