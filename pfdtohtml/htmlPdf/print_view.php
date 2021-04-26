<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
  <table class="titulo">
    <tr>
      <th class="cabezera"><h1>Factura</h1></th>
      <th> <img class="logo" src="img/logo.png" alt=""> </th>
   </tr>
  </table>
<?php if (isset($_POST)):?>
    <table class="tabla">
        <tr>
            <th>Comprador</th>
            <th>Producto</th>
            <th>Precio</th>
          </tr>
          <tr>
             <th><?= $_POST['nombre']; ?></th>
             <th><?= $_POST['producto']; ?></th>
             <th><?= $_POST['precio']; ?>€</th>
                
          </tr>      
    </table>
<?php endif; ?>
    
</body>
</html>