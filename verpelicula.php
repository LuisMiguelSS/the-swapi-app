<?php

	include 'historial.php';
	actualizar();

	//Comprobar que haya recibido un ID
	if(!isset($_GET['numero']) && empty($_GET['numero'])) {

		//Redirigir a la página principal
		header('/peliculas/');

	} else {

		include 'utilidades.php';

		//Obtener información de la película como Objeto
		@$pelicula = json_decode(file_get_contents('https://swapi.co/api/films/'.obtenerIDPeliculaSWAPI($_GET['numero'])));

	}

?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'cabecera.php'; ?>
	<title>The Swapi App - <?= $pelicula->title; ?></title>
</head>
<body>

	<?php
		// Menú de navegación

		include 'navegacion.php';
		nav('peliculas');
	?>

	<!-- Cuerpo -->
	<main class="container">
		<?php

			if ($pelicula == false) mostrarError("La película que se quiere buscar no existe.");
			else
				{
					?>

					<!-- Ficha de la Película -->
					<div id="fichaPelicula" class="my-4 p-3 d-flex flex-column d-flex justify-content-between border rounded border-secondary shadow-md">
						<section class="pb-3">
							<h1 class="d-inline"><?= $pelicula->title; ?></h1>
							<img class="img-thumbnail float-right d-block" src="<?= obtenerImagenPelicula($_GET['numero']); ?>" alt="<?= $pelicula->title; ?> poster">
							<h3 class="mb-2 text-muted">
								Episodio <?= representacionRomana($pelicula->episode_id); ?>
							
							</h3>
							<h4>Fecha de estreno: <?= $pelicula->release_date; ?></h4>

						</section>
						<section class="pb-3">
							<h3 class="mb-2 text-muted">Sinopsis</h3>
							<div class="card card-body"><?= $pelicula->opening_crawl; ?></div>
						</section>

						<section class="pb-3">
							<h3 class="mb-2 text-muted">Personajes</h3>
							
						</section>
						<section></section>
					</div>

					<?php
				}

		?>
	</main>

	<?php
		include 'pie_pagina.php';
		include 'scripts.php';
	?>

</body>
</html>