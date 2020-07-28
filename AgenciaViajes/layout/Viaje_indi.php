<!DOCTYPE html>
<html lang="en">

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
    date_default_timezone_set('Europe/Madrid');
    include("../includes/header.php")
    ?>
    <main class="container mt-5">
        <?php
        include("../includes/viaje_individual.php");

        ?>
    </main>
    <?php
    date_default_timezone_set('Europe/Madrid');
    include("../includes/footer.php")
    ?>


</body>

</html>