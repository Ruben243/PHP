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
        <div class="row">
            <div class="col-md-5"><img class="img-fluid" src="../../../public/img/nosotros.jpg" alt="imagen de nosotros" /></div>
            <div class="col-md-7">
                <h1>Sobre Nosotros</h1>
                <blockquote>Lorem ipsum dolor sit amet consectetur adipisicing elit. </blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ullamcorper augue a tempor viverra.
                    Phasellus quis neque nec lorem feugiat vehicula ac non massa. Proin sed rhoncus risus. Quisque
                    fermentum nisl vel risus viverra dapibus. Donec eu lectus nunc. Fusce blandit auctor gravida. Sed
                    dapibus finibus condimentum. Aenean luctus pellentesque metus, at commodo odio egestas eget. Mauris
                    ut nisi fermentum, efficitur enim sed, fringilla sem. Cras posuere congue nisi sed iaculis. Mauris
                    tincidunt, sem ac mattis congue, orci tellus mollis eros, et ornare neque urna at risus. Orci varius
                    natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus luctus dapibus
                    purus.</p>
            </div>
        </div>
    </main>
    <div class="listado-iconos">
        <div class="container mt-5 py-5 text-center">
            <div class="row">
                <div class="col-md-4"><img class="img-fluid mb-4" src="../../../public/img/icono_seguridad.svg" />
                    <h2 class="mb-4">Seguridad</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
                </div>
                <div class="col-md-4"><img class="img-fluid mb-4" src="../../../public/img/icono_destinos.svg" />
                    <h2 class="mb-4">Mejores Destinos</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
                </div>
                <div class="col-md-4"><img class="img-fluid mb-4" src="../../../public/img/icono_precios.svg" />
                    <h2 class="mb-4">Mejor Precio</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
                </div>
            </div>
        </div>
    </div>

    <?php

    include("../includes/footer.php")
    ?>

</body>

</html>