<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PracticaClases</title>
</head>

<body>
    <?php

    require 'includes/app.php';

    use App\Alumno;
    use App\Profesor;
    use App\Cliente;

    $alumno = new Alumno();
    $profesor = new Profesor();
    $cliente = new Cliente();

    var_dump($alumno);
    var_dump($profesor);
    var_dump($cliente);

    ?>
</body>

</html>