<!-- Importante en el navegador.php no metemos lo de session_start();
     porque este contenido a su vez ira dentro de paginas web, se incrustara dentro de ellas
     y por lo tanto ya tienen un session_start();
-->
<header id="cabecera">
	<nav>
		<div id="logo"><a href="principal.php"><i class="fab fa-dribbble"></i>TEAM ROCKET</a></div>
		<ul id="listaEnlaces">
			<li><a href="paginaPublica.php">Página pública</a></li>
			<li><a href="paginaPrivada.php">Página privada</a></li>
			<?php
			if(isset($_SESSION['id'])){
				echo "<li><a href='cerrarSesion.php'>Cerrar sesi&oacute;n</a></li>";
			}else{
                echo "<li><a href='formulario.php'>Iniciar sesi&oacute;n</a></li>";
			}
			?>
		</ul>
	</nav>
</header>