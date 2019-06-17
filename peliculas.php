<?php

	include 'utilidades.php';

	//Obtener películas del API (swapi.co/api/films/) como array
	$peliculas = json_decode(file_get_contents('https://swapi.co/api/films/'),true);

?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'cabecera.php'; ?>
	<title>The Swapi App - Películas</title>
</head>
<body>

	<?php
		// Menú de navegación

		include 'navegacion.php';
		nav('peliculas');
	?>

	<!-- Cuerpo -->
	<main class="container py-3 px-5">
		<section class="jumbotron text-center">
			<i class="fas fa-film fa-5x d-inline"></i><h1 class="display-3 d-inline"> Películas</h1>
		</section>

		<div class="row justify-content-around">
			
			<?php foreach (ordenarPor($peliculas['results'],'episode_id') as $pelicula) { ?>
				<div class="col-12 col-md-4 my-2 mx-1 align-self-start">
					<div class="card">
						<div class="card-body">
							<h3 class="card-title"><?= $pelicula['title']; ?></h3>
							<h5 class="card-subtitle mb-2 text-muted">Episodio <?= representacionRomana($pelicula['episode_id']); ?></h5>

							<span class="text-body">(<?= date('j F, Y',strtotime($pelicula['release_date'])); ?>)</span>
							
							<hr />

							<!-- Sinopsis -->
							<a class="collapsed" data-toggle="collapse" href="#sinopsis<?= $pelicula['episode_id']; ?>" aria-expanded="false" aria-controls="sinopsis<?= $pelicula['episode_id']; ?>">
								Sinopsis <i class="fas fa-chevron-down"></i>
							</a>

							<a href="/peliculas/<?= $pelicula['episode_id']; ?>/" target="_blank">Ver detalles<sup><i class="fas fa-external-link-alt smaller-icon"></i></sup></a>

							<div class="collapse" id="sinopsis<?= $pelicula['episode_id']; ?>">
								<?= $pelicula['opening_crawl']; ?>
							</div>

						</div>
					</div>
				</div>
			<?php } ?>

		</div>


	</main>

	<?php
		include 'pie_pagina.php';
		include 'scripts.php';
	?>

</body>
</html>