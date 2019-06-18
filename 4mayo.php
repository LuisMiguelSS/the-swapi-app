<?php

	include 'historial.php';
	actualizar();
	
	include 'utilidades.php';

	//Obtener películas del API (swapi.co/api/films/) como array
	@$peliculas = json_decode(file_get_contents('https://swapi.co/api/films/'),true);

?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'cabecera.php'; ?>
	<title>The Swapi App - May The Force Be With You</title>
</head>
<body>

	<?php
		// Menú de navegación

		include 'navegacion.php';
		nav('may4');
	?>

	<!-- Cuerpo -->
	<main class="container py-3 px-5">

		<!-- Título -->
		<section class="jumbotron text-center">
			<img src="assets/icons/darthvader.png" class="img-responsive" width="90"><h1 class="display-3 d-inline"> May 4<sup>th</sup></h1>
		</section>
		
			<?php mostrarError("Esta página todavía no está disponible, se irá actualizando con el tiempo.<br>¡Que la fuerza te acompañe!",true); ?>

	</main>

	<?php
		include 'pie_pagina.php';
		include 'scripts.php';
	?>
</body>
</html>