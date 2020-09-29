<?php

	require 'historial.php';
	actualizar();

	//Comprobar que haya recibido un ID
	if(!isset($_GET['numero']) && empty($_GET['numero'])) {

		//Redirigir a la página principal
		header('/peliculas/');

	} else {

		require 'utilidades.php';

		//Ampliar tiempo de espera a 3 min, JSON puede tardar
		set_time_limit(180);

		//Obtener información de la película como Objeto
		@$pelicula = json_decode(query_url(api_base_url() . 'films/'.obtenerIDPeliculaSWAPI($_GET['numero'])));

	}

?>

<!DOCTYPE html>
<html>
<head>
	<?php require 'cabecera.php'; ?>
	<title>The Swapi App - <?= $pelicula->title; ?></title>
</head>
<body>

	<?php
		// Menú de navegación

		require 'navegacion.php';
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

						<!-- Información principal -->
						<section class="pb-3">
							<h1 class="d-inline"><?= $pelicula->title; ?></h1>
							<img class="img-thumbnail float-right d-block" src="<?= obtenerImagenPelicula($_GET['numero']); ?>" alt="<?= $pelicula->title; ?> poster">
							<h3 class="mb-2 text-muted">
								Episodio <?= to_roman_numerals($pelicula->episode_id); ?>
							
							</h3>
							<h4>Fecha de estreno: <?= date('l jS, F Y',strtotime($pelicula->release_date)); ?></h4>
						</section>

						<!-- Sinopsis -->
						<section class="pb-3">
							<h3 class="mb-2 text-muted">Sinopsis</h3>
							<div class="card card-body"><?= $pelicula->opening_crawl; ?></div>
						</section>

						<!-- Personajes -->
						<section class="pb-3">
							<h3 class="mb-2 text-muted">Personajes</h3>
							<div class="container">
								<ul class="list-group row">
									<?php

										// Obtener el nombre del personaje
										foreach($pelicula->characters as $enlace) {?>
											<li class="list-group-item col-md-6 mx-auto"><?= json_decode(file_get_contents($enlace))->name; ?></li>
									<?php } ?>
								</ul>
							</div>
							
						</section>
						<section>
							<h3 class="mb-2 text-muted">Planetas</h3>
							<p>La acción en esta película tiene lugar en estos planetas:</p>
							<div class="container">
								<ul class="list-group row">
									<?php

										// Obtener el nombre del personaje
										foreach($pelicula->planets as $enlace) {
											@$planeta = json_decode(file_get_contents($enlace));
											?>
											<li class="list-group-item col-md-6 mx-auto"><?= $planeta->name . ' con clima ' . obtenerClima($planeta->climate); ?></li>
									<?php } ?>
								</ul>
							</div>
						</section>
					</div>

					<?php
				}

		?>
	</main>

	<?php
		require 'pie_pagina.php';
		require 'scripts.php';
	?>

</body>
</html>