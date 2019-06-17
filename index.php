<?php include 'historial.php'; actualizar(); ?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'cabecera.php'; ?>
	<title>The Swapi App</title>
</head>
<body>

	<?php
		// Menú de navegación

		include 'navegacion.php';
		nav('index');
	?>

	<!-- Cuerpo -->
	<main>
		<!-- Título -->
		<section class="jumbotron text-center text-white border-0 h-50" id="inicio">
			<h1>¡Bienvenido a la <span> Star Wars Swapi APP</span>!</h1>
		</section>
		<div class="container">
			<section class="jumbotron">
				<h3 class="display-3">Categorías</h3>

				<!-- Navegación Categorizada -->
				<div class="row justify-content-around">
					<div class="col border round"></div>
					<div class="col border round"></div>
					<div class="col border round"></div>
					<div class="col border round"></div>
				</div>
			</section>
		</div>
	</main>

	<?php
		include 'pie_pagina.php';
		include 'scripts.php';
	?>

</body>
</html>