<?php
if (isset($_REQUEST['fruta']) && $_REQUEST['fruta']!="" ) { //Si existe la variable y no viene vacia
   $fruta=$_REQUEST['fruta']; //asignamos el valor a una variable

    $url='https://www.fruityvice.com/api/fruit/'.$fruta; //hacemos la consulta pasando la variable

    $fruits=json_decode(file_get_contents($url)); //obtenemos los resultados y los decodificamos
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
    echo'<h1>INTRODUCE UN TERMINO DE BUSQUEDA</h1>'; //en caso de que la variable venga vacia
}
?>



