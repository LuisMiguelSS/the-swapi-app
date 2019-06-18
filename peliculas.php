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

							<!-- Información Básica -->
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
	
	<!-- Script Buscador de películas -->
	<script type="text/javascript">
		/**
		* Esta función permite visualizar aquello que se busque ocultando el resto
		* de elementos contenidos en el "contenedor" de películas.
		*/
		function buscarPelicula() {
			var buscador, valorBuscado, contenedor, lista, itemsResultado, i, texto;

				// Búsqueda
			    buscador = document.getElementById("buscadorPeliculas");
			    valorBuscado = buscador.value.toUpperCase();

			    //Situación en el DOM
			    contenedor = document.getElementById("contenedorPeliculas");
			    lista = contenedor.getElementsByClassName("pelicula");


			    // Iterar por los elementos contenidos en "lista"
			    for (i = 0; i < lista.length; i++) {
			        itemsResultado = lista[i].getElementsByTagName("h3")[0];
			        texto = itemsResultado.textContent || itemsResultado.innerText;

			        //Comprobar que coincida el texto con lo buscado
			        if (texto.toUpperCase().indexOf(valorBuscado) > -1)
			            lista[i].style.display = "";
			        else
			            lista[i].style.display = "none"; // ocultar elemento
			    }
		}
	</script>

</body>
</html>