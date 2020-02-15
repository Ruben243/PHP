<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lectura de datos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<body>
    <section class="jumbotron text-center">
        <section class="container">
            <label for="nom" class="col-form-label">Nombre:</label>
            <input type="text" name="nom" id="nom" class="input">
        </section>
        <br>
        <button class="btn btn-primary" type="button" onClick="load(1)">ENVIAR</button>
        <br>
        <br>
        <h3>RESULTADOS BUSQUEDA</h3>
    </section>
    <section class="container">
        <table class='table' id="tabla" class="table-responsive table-bordered table table-hover">
            <thead class="thead-dark">
                <!--filas de encabezado -->
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                </tr>


                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                <!-- Latest compiled and minified JavaScript -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>

</html>

<script>
$(document).ready(function() {
    load(1);
});

function load(page) {


    var name = $('#nom').val();

    var parametros = {
        "action": "ajax",
        "page": page,
        "nom": name
    };

    $.ajax({
        url: "./funcion_tabla.php",
        data: parametros,
        success: function(data) {
            $("#tabla").html(data);
        }
    })
}
</script>