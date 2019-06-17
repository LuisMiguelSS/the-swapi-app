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

		<!-- Título -->
		<section class="jumbotron text-center">
			<i class="fas fa-film fa-5x d-inline"></i><h1 class="display-3 d-inline"> Películas</h1>
		</section>

		<!-- Buscador -->
		<div class="input-group my-2 mx-auto">
			<input type="text" class="form-control" id="buscadorPeliculas" onkeyup="buscarPelicula()" placeholder="Nombre de la película..." title="Introduce un título">
			<div class="input-group-append">
				<button class="btn btn-dark">Buscar</button>
			</div>
		</div>

		<!-- Películas Miniatura -->
		<div class="row justify-content-around" id="contenedorPeliculas">
			
			<?php foreach (ordenarPor($peliculas['results'],'episode_id') as $pelicula) { ?>
				<div class="col-12 col-md-4 my-2 mx-1 align-self-start pelicula">
					<div class="card">
						<div class="card-body">

							<h3 class="card-title"><?= $pelicula['title']; ?></h3>
							<h5 class="card-subtitle mb-2 text-muted d-inline">
								Episodio <?= representacionRomana($pelicula['episode_id']); ?> - <span class="text-body"><?= date('j F, Y',strtotime($pelicula['release_date'])); ?></span>
							</h5>
							
							<!-- Sinopsis -->
							<a class="collapsed d-block" data-toggle="collapse" href="#sinopsis<?= $pelicula['episode_id']; ?>" aria-expanded="false" aria-controls="sinopsis<?= $pelicula['episode_id']; ?>">
								Sinopsis <i class="fas fa-chevron-down"></i>
							</a>
							<div class="collapse text-center" id="sinopsis<?= $pelicula['episode_id']; ?>">
								<?= nl2br($pelicula['opening_crawl']); ?>
							</div>

							<hr />

							<!-- Ver más -->
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
	<!-- Script para buscar -->
	<script type="text/javascript">
		function buscarPelicula() {
			var entrada, filtro, contenedor, carta, h3, i, txtValue;
			    entrada = document.getElementById("buscadorPeliculas");
			    filtro = entrada.value.toUpperCase();
			    contenedor = document.getElementById("contenedorPeliculas");
			    carta = contenedor.getElementsByClassName("pelicula");


			    for (i = 0; i < carta.length; i++) {
			        h3 = carta[i].getElementsByTagName("h3")[0];
			        txtValue = h3.textContent || h3.innerText;
			        if (txtValue.toUpperCase().indexOf(filtro) > -1) {
			            carta[i].style.display = "";
			        } else {
			            carta[i].style.display = "none";
			        }
			    }
		}
	</script>

</body>
</html>