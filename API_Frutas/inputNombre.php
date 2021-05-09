<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>Frutas</title>
</head>
<body>
    


<main class="main">
    <form action="traerFruta.php" method="POST">
        <label for="names">Nombre de Fruta</label>
        <input list="names" type="text" id="input" name="fruta">
        <datalist id="names">


        </datalist>
        <input type="submit" value="Enviar">
   </form>

</main>


<?php

$url='https://www.fruityvice.com/api/fruit/all';

$names=file_get_contents($url);


?>

<script>
 const nombres=<?php echo $names?>;
let html="";

Object.entries(nombres).forEach(([key,nombre])=>{
    const {name}=nombre;
   html+=`<option value=${name}>`

});
document.querySelector('#names').innerHTML=html;



</script>
</body>
</html>