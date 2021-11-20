<?php
require "config/database.php";

$db = conectarDb();

$query = "SELECT * FROM heroku_9c8a66a1397d8af.proyectos";

$resultado = mysqli_query($db, $query);
if (!$resultado) {
?>
    <h2> EN MANTENIMIENTO. VOLVEREMOS EN BREVE</h2>";
<?php exit;
}
?>
<div class="row">
    <?php
    while ($trabajos = mysqli_fetch_assoc($resultado)) : ?>

        <div class="col-lg-6 <?php echo $trabajos['tipo'] ?>">
            <figure class="snip1321">
                <picture>
                    <source style=" width:100%;height: 100%; " loading="lazy" srcset="<?php echo $trabajos['urlWebp'] ?>" type="image/webp">
                    <img style=" width:100%;height: 100%; " loading="lazy " src="<?php echo $trabajos['imagen'] ?>" alt="imagen proyecto">
                </picture>
                <figcaption>
                    <!-- interior -->
                    <a href="<?php echo $trabajos['imagen'] ?>" data-lightbox="image-1 " data-title="Caption1"></a>
                    <h4><?php echo $trabajos['titulo'] ?></h4>
                    <span><a href="<?php echo $trabajos['url'] ?>" target="_blank" rel="noreferrer">Enlace al
                            proyecto</a></span>
                </figcaption>
            </figure>
        </div>


    <?php
    endwhile;
    ?>