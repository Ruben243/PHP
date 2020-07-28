<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&amp;family=Shadows+Into+Light&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../../../public/css/style.css">

</head>

<body>
    <?php

    include("../includes/header.php")
    ?>
    <main class="container mt-5">
        <h1 class="text-center mb-5"> Testimoniales</h1>
        <div class="row">
            <div class="col-md-12">
                <blockquote class="text-center">Lee Sobre Nuestros Clientes y sus Experiencias</blockquote>
                <div class="row testimoniales">

                    <?php

                    include("../includes/testimonios_form.php");
                    ?>
                    <div class="col-md-12">
                        <h2 class="text-center">Agrega un Testimonio</h2>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form action="insertarTestimoniales.php" method="POST">
                                    <div class="form-group"><label for="nombre">Nombre </label><input class="form-control" id="nombre" type="text" placerholder="Tu Nombre" name="nombre" /></div>
                                    <div class="form-group"><label for="email">Email </label><input class="form-control" id="email" type="email" placerholder="Tu Email" name="email" /></div>
                                    <div class="form-group"><label for="mensaje">Mensaje</label><textarea class="form-control" id="mensaje" name="mensaje" rows="3" placerholder="Tu mensaje"></textarea></div>
                                    <input class="btn btn-success btn-block" type="submit" value="Agregar" />
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php

    include("../includes/footer.php")
    ?>

</body>

</html>