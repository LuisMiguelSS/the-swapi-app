<?php

	include 'historial.php';
	actualizar();
	
	include 'utilidades.php';

	@$peliculas = json_decode(query_url(api_base_url() . 'films/'), true);//file_get_contents(api_base_url() . 'films/'),true);

?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'cabecera.php'; ?>
	<title>The Swapi App - Películas</title>
</head>
<body>

	<?php
		// Navigation Menu
		include 'navegacion.php';
		nav('peliculas');
	?>

	<!-- Body -->
	<main class="container py-3 px-5">

		<!-- Title -->
		<section class="jumbotron text-center">
			<i class="fas fa-film fa-5x d-inline"></i><h1 class="display-3 d-inline"> Películas</h1>
		</section>

		<!-- Searcher -->
		<div class="input-group my-2 mx-auto">
			<input type="text" class="form-control" id="buscadorPeliculas" onkeyup="buscarPelicula()" placeholder="Nombre de la película..." title="Introduce un título">
			<div class="input-group-append">
				<button class="btn btn-dark">Buscar</button>
			</div>
		</div>

		<!-- Film Miniatures -->
		<div class="row justify-content-around" id="contenedorPeliculas">
			
			<?php foreach (ordenarPor($peliculas['results'],'episode_id') as $pelicula) { ?>
				<div class="col-12 col-md-4 my-2 mx-1 align-self-start pelicula">
					<div class="card">
						<div class="card-body">

							<!-- Basic Info -->
							<h3 class="card-title"><?= $pelicula['title']; ?></h3>
							<h5 class="card-subtitle mb-2 text-muted d-inline">
								Episodio <?= to_roman_numerals($pelicula['episode_id']); ?> - <span class="text-body"><?= date('j F, Y',strtotime($pelicula['release_date'])); ?></span>
							</h5>
							
							<!-- Synopsis -->
							<a class="collapsed d-block" data-toggle="collapse" href="#sinopsis<?= rawurlencode($pelicula['episode_id']); ?>" aria-expanded="false" aria-controls="sinopsis<?= $pelicula['episode_id']; ?>">
								Sinopsis <i class="fas fa-chevron-down"></i>
							</a>
							<div class="collapse text-center" id="sinopsis<?= $pelicula['episode_id']; ?>">
								<?= nl2br($pelicula['opening_crawl']); ?>
							</div>

							<hr />

							<!-- View More -->
							<a href="/peliculas/<?= $pelicula['episode_id']; ?>/" target="_blank">
								Ver detalles <sup><i class="fas fa-external-link-alt smaller-icon"></i></sup>
							</a>


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

	<!-- Film Searcher -->
	<script type="text/javascript">
		function buscarPelicula() {
			var buscador, valorBuscado, contenedor, lista, itemsResultado, i, texto;

				// Search
			    buscador = document.getElementById("buscadorPeliculas");
			    valorBuscado = buscador.value.toUpperCase();

			    // Location at DOM
			    contenedor = document.getElementById("contenedorPeliculas");
			    lista = contenedor.getElementsByClassName("pelicula");


			    // Iterate over the DOM list
			    for (i = 0; i < lista.length; i++) {
			        itemsResultado = lista[i].getElementsByTagName("h3")[0];
			        texto = itemsResultado.textContent || itemsResultado.innerText;

			        // Check for coincidences in text
			        if (texto.toUpperCase().indexOf(valorBuscado) > -1)
			            lista[i].style.display = "";
			        else
			            lista[i].style.display = "none";
			    }
		}
	</script>

</body>
</html>