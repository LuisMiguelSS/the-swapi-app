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

		<!-- Categorías -->
		<div class="container">
			<div class="jumbotron text-center">
				<h3 class="display-3">Categorías</h3>
			</div>
		</div>
			<div class="d-flex row justify-content-around mx-5" id="categorias">

				<!-- Películas -->
				<div class="col-8 col-md-4 m-3 align-self-center">
					<a href="/peliculas/">
						<div class="card align-items-center">
							<img class="img-responsive" src="assets/star-wars-logo-circle.png">
							<h3>Películas</h3>
						</div>
					</a>
				</div>

				<!-- Personajes -->
				<div class="col-8 col-md-4 m-3 align-self-center">
					<a href="/personajes/">
						<div class="card align-items-center py-3">
							<img class="img-responsive" src="assets/characters.jpg">
							<h3>Personajes</h3>
						</div>
					</a>
				</div>

				<!-- Buscador -->
				<div class="col-8 col-md-4 m-3 align-self-center">
					<a href="/buscar/">
						<div class="card align-items-center py-3">
							<img class="img-responsive" src="assets/search.png">
							<h3>Buscador</h3>
						</div>
					</a>
				</div>

				<!-- May 4th -->
				<div class="col-8 col-md-4 m-3 align-self-center">
					<a href="/may4/">
						<div class="card align-items-center py-3">
							<img class="img-responsive" src="assets/may-the-force-be-with-you.png">
							<h3>May 4<sup>th</sup></h3>
						</div>
					</a>
				</div>

			</div>
	</main>

	<?php
		include 'pie_pagina.php';
		include 'scripts.php';
	?>

</body>
</html>