<?php
if (isset($_REQUEST['fruta']) && $_REQUEST['fruta'] != "") { //Si existe la variable y no viene vacia
    $fruta = $_REQUEST['fruta']; //asignamos el valor a una variable

    $url = 'https://www.fruityvice.com/api/fruit/' . $fruta; //hacemos la consulta pasando la variable

    $fruits = json_decode(file_get_contents($url)); //obtenemos los resultados y los decodificamos
?>
    <div class="card">
        <p>Nombre: <?php echo $fruits->name ?></p>
        <p>Genero:<?php echo $fruits->genus ?></p>
        <p>Orden: <?php echo $fruits->order ?></p>
        <p>Familia:<?php $fruits->family ?></p>
        <p>Azucar: <?php echo $fruits->nutritions->sugar ?></p>
        <p>calorias:<?php echo $fruits->nutritions->calories ?></p>
        <p>Fat: <?php echo $fruits->nutritions->fat ?></p>
        <p>carboidratos:<?php echo $fruits->nutritions->carbohydrates ?></p>
    </div>

<?php
} else {
?>
    <h1>INTRODUCE UN TERMINO DE BUSQUEDA</h1>
<?php
}
?>