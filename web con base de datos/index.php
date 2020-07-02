<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="formato.css">
    <title>Busqueda</title>
</head>

<body>
    <?php
    include ("cabezera.php");
    ?>
    
    <form action="" method="post">
        <section>
          <label for="iniciar">Iniciar busqueda</label>
          <input type="text" name="iniciar" id="iniciar">
            <button type="submit">Enviar</button>
        </section>


    </form>

 <?php
 $inicio=$_REQUEST['iniciar'];
 
 if(isset($inicio)){
 $servername ="localhost";
 $database = "pivones";
 $username = "root";
 $password = "";
 $conn = mysqli_connect($servername,$username,$password,$database);

 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }

 
 	
$consulta = "SELECT * FROM pivones";
$resultado = mysqli_query($conn,$consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");
echo "<table borde='2'>";
    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>pelo</th>";
    echo "<th>tetona</th>";
    echo "</tr>";

    while ($columna = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>" . $columna['nombre'] . "</td><td>" . $columna['pelo'] . "</td><td>.$columna[tetona].</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($conn);
 }
?>



</body>

</html>