<?php
    include('inputNombre.php');

if (isset($_POST['fruta']) && $_POST['fruta']!="" ) {
   $fruta=$_POST['fruta'];

    $url='https://www.fruityvice.com/api/fruit/'.$fruta;

    $fruits=json_decode(file_get_contents($url));
    echo '<div class="card">';
    echo '<p>Nombre: '.$fruits->name.'</p>';
    echo '<p>Genero: '.$fruits->genus.'</p>';
    echo '<p>Orden: '.$fruits->order.'</p>';
    echo '<p>Familia: '.$fruits->family.'</p>';
    echo '<p>Azucar: '.$fruits->nutritions->sugar.'</p>';
    echo '<p>calorias: '.$fruits->nutritions->calories.'</p>';
    echo '<p>Fat: '.$fruits->nutritions->fat.'</p>';
    echo '<p>carboidratos: '.$fruits->nutritions->carbohydrates.'</p>';
    echo '</div>';


}else{
    echo'<h1>INTRODUCE UN TERMINO DE BUSQUEDA</h1>';
}
?>



