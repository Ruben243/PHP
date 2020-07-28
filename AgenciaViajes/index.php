<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&amp;family=Shadows+Into+Light&amp;display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../../../public/css/style.css">

  <title>Agencia de viajes</title>
</head>

<body class="home">
  <header>
    <div class="navegacion">
      <div class="container">
        <div class="row justify-content-center justify-content-md-between align-items-center py-4">
          <div class="col-6 col-md-4"><a href="index.php"><img class="img-fluid" src="../../../public/img/logo.svg" alt="Logo agencia de viajes" /></a></div>
          <div class="col-6 col-md-8">
            <nav class="nav justify-content-center justify-content-md-end">
              <a class="nav-link" href="/layout/Nosotros.php">Nosotros</a>
              <a class="nav-link" href="/layout/Viajes.php">Viajes</a>
              <a class="nav-link" href="/layout/Testimoniales.php">Testimoniales</a></nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="slider">
    <h1>Rio de Janeiro</h1><em>aventura</em>
  </div>
  <!--Sustituir este codigo html por una consulta html-->
  <main class="container mt-5">
    <h2 class="text-center mb-5">Sobre Nosotros</h2>
    <div class="row mb-5">
      <div class="col-md-6">
        <p>Praesent tincidunt ante at justo semper volutpat. Sed risus neque, scelerisque id dictum in, placerat
          non erat. </p>
        <p>Sed eget tellus eu mauris faucibus pharetra. Praesent vulputate diam ac diam dignissim, eu semper
          turpis gravida. Vestibulum tempor purus orci, vitae ullamcorper erat congue quis. Nullam dapibus dui
          a velit lacinia, eu cursus massa cursus. </p>
      </div>
      <div class="col-md-6"><img class="img-fluid" src="../../../public/img/inicio_nosotros.jpg" /></div>
    </div>
    <h2 class="text-center mb-5">Proximos Viajes </h2>
    <div class="row proximos-viajes">
      <?php
      require('includes/consulta_viajes.php');
      ?>
    </div>
  </main>
  <div class="descuento">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="contenido">
            <h3>5% de Descuento</h3>
            <p class="titulo">Viaje a Canada</p>
            <p class="fecha">20 de Marzo 2020 - 28 de Marzo de 2020</p>
            <p class="precio">$2,500€</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <h2 class="text-center my-5">Testimoniales</h2>
    <blockquote class="text-center">Lee Sobre Nuestros Clientes y sus Experiencias</blockquote>
    <div class="row testimoniales">
      <?php
      require('includes/testimonios.php');
      ?>


    </div>
  </div>
  <footer class="container py-5">
    <div class="row">
      <div class="col-md-6">
        <nav class="nav justify-content-center justify-content-md-start"> <a class="nav-link" href="/layout/Nosotros.php">Nosotros</a><a class="nav-link" href="/viajes">Viajes</a><a class="nav-link" href="/testimoniales">Testimoniales</a></nav>
      </div>
      <div class="col-md-6">
        <p class="copyright text-center-text-md-right">Todos los Derechos reservados <span>2020</span></p>
      </div>
    </div>
  </footer>
</body>

</html>