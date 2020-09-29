<?php

	require 'historial.php';
	actualizar();
	
	require 'utilidades.php';

?>

<!DOCTYPE html>
<html>
<head>
	<?php require 'cabecera.php'; ?>
	<title>The Swapi App - May The Force Be With You</title>
</head>
<body>

	<?php
		// Navigation menu

		require 'navegacion.php';
		nav('may4');
	?>

	<!-- Body -->
	<main class="container py-3 px-5">

		<!-- Title -->
		<section class="jumbotron text-center">
			<img src="assets/icons/darthvader.png" class="img-responsive" width="90"><h1 class="display-3 d-inline"> May 4<sup>th</sup></h1>
		</section>
		
			<?php mostrarError("Esta página todavía no está disponible, se irá actualizando con el tiempo.<br>¡Que la fuerza te acompañe!",true); ?>

	</main>

	<?php
		require 'pie_pagina.php';
		require 'scripts.php';
	?>
</body>
</html>