<html lang="es">
<head>
    <meta charset="UTF-8" dir="ltr">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

$nombre_archivo = $_FILES['archivos'];
$directorio_definitivo = "C:/wamp/archivos";
echo "<p>".$nombre_archivo."</p>";
if (move_uploaded_file( $_FILES['archivos'], $directorio_definitivo)){
       echo "<p>El archivo ha sido cargado correctamente</p>";

    }else{
      echo "<p>error</p>";
    }
?>
</body>
</html>

