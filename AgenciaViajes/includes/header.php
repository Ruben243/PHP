 <?php
    date_default_timezone_set('Europe/Madrid');

    function activada($current_page){
        $url_array = explode('/', $_SERVER['REQUEST_URI']);
        $url = end($url_array);
        if ($current_page == $url) {
            echo 'active';
        }
    }
    ?>
 <header>
     <div class="navegacion">
         <div class="container">
             <div class="row justify-content-center justify-content-md-between align-items-center py-4">
                 <div class="col-6 col-md-4">
                     <a href="../index.php"><img class="img-fluid" src="../../../public/img/logo.svg" alt="Logo agencia de viajes" /></a>
                 </div>
                 <div class="col-6 col-md-8">
                     <nav class="nav justify-content-center justify-content-md-end">
                         <a class="nav-link <?php activada('Nosotros.php') ?>" href="/layout/Nosotros.php">Nosotros</a>
                         <a class="nav-link <?php activada('Viajes.php') ?> " href="/layout/Viajes.php">Viajes</a>
                         <a class="nav-link <?php activada('Testimoniales.php') ?>" href="/layout/Testimoniales.php">Testimoniales</a>
                     </nav>
                 </div>
             </div>
         </div>
     </div>
 </header>