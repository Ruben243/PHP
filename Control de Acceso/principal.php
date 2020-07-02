<?php
    session_start();
?>

<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="Author" content="">
		<meta name="Description" content="">
		<title>Página principal</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<link rel="stylesheet" href="estilo.css">
	</head>
	<body>
		<?php
		include "navegador.php";
		?>
		<section id="container">
			<img id="imgfoto" src="https://www.naturaselection.com/files/products/7899/gallery/23665-102443_04.jpg?date=99093906f4f71ed2af284681330f90e4" alt="imagen">
			<article id="texto">
				<h1>PÁGINA PRINCIPAL</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in ultricies mi. Nullam efficitur magna placerat erat rhoncus lacinia. Praesent eleifend venenatis augue, sed ultricies est cursus ac. Pellentesque lobortis fermentum odio ac sagittis. Nam ac lobortis sem, sit amet mattis elit. Aliquam mollis vehicula dignissim. Aenean lacus turpis, facilisis ut semper at, tincidunt at urna. Mauris tempus ornare ullamcorper. Nam fermentum lorem sit amet nulla condimentum, id gravida nibh ultrices. Sed mi libero, congue nec dignissim nec, porttitor a turpis. Mauris et metus in mauris volutpat interdum cursus at nunc.

				Mauris sed pharetra mauris. Etiam vitae consequat sapien. Ut posuere commodo lacinia. Aliquam erat volutpat. Quisque enim leo, lobortis at laoreet sed, eleifend non arcu. Vestibulum accumsan sit amet ligula sed ultricies. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis semper at lorem eu pellentesque.

				Etiam imperdiet neque nisi, id pellentesque dolor blandit sed. Etiam feugiat faucibus suscipit. Vestibulum metus nunc, bibendum eget turpis non, faucibus varius dui. Cras varius leo a erat pellentesque, nec consequat urna vestibulum. Nulla molestie arcu sed dolor bibendum malesuada. Aenean in nisi eu ligula malesuada commodo vel vitae nibh. In interdum elit enim, finibus aliquet metus commodo quis. Duis quis tellus a mi eleifend dictum.</p>
			</article>
		</section>
		<div id="boton">
            <?php
            if(isset($_SESSION['id'])){
                echo "<a id=\"btnSesion\" href=\"cerrarSesion.php\">CERRAR SESI&Oacute;N</a>";
            }else{
                echo "<a id=\"btnSesion\" href=\"formulario.php\">INICIAR SESI&Oacute;N</a>";
            }
            ?>
		</div>
	</body>
</html>