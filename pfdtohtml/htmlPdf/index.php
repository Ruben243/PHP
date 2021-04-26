<?php
require_once __DIR__ . '/vendor/autoload.php';


if (isset($_POST['crear'])) {
    # code...
    $mpdf = new \Mpdf\Mpdf();
    // $style=file_get_contents('/css/style.css');
    // $mpdf->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
    ob_start();
    require 'print_view.php';
    $html=ob_get_clean();

    $mpdf->WriteHTML($html);
    $mpdf->Output();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body  class="body">
    <div class="formulario">
           <h1>Genera tu pdf</h1>
    <form action="" method="POST">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="producto" placeholder="producto">
        <input type="number" name="precio" placeholder="precio">

        <input type="submit" value="enviar" name="crear">

    </form> 
    </div>

</body>
</html>
