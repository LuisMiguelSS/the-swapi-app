<?php

	include 'historial.php';
	actualizar();
	
	include 'utilidades.php';

	@$peliculas = json_decode(file_get_contents(api_base_url() . 'films/'),true);

?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'cabecera.php'; ?>
	<title>The Swapi App - Buscador</title>
</head>
<body>

	<?php
		// Navigation menu

		include 'navegacion.php';
		nav('buscar');
	?>

	<!-- Body -->
	<main class="container py-3 px-5">

		<!-- Title -->
		<section class="jumbotron text-center">
			<i class="fas fa-search fa-5x d-inline"></i><h1 class="display-3 d-inline"> Buscador</h1>
		</section>

		<!-- Search bar -->
		<div class="input-group my-2 mx-auto">
			<input type="text" class="form-control" id="buscador" onkeyup="//buscarPelicula()" placeholder="¿Existen de verdad los Wookiees?" title="Introduce una rase o palabra" disabled="disabled">
			<div class="input-group-append">
				<button class="btn btn-dark">Buscar</button>
			</div>
		</div>

			<?php mostrarError("Esta página todavía no está disponible, se irá actualizando con el tiempo.",true); ?>

	</main>

	<?php
		include 'pie_pagina.php';
		include 'scripts.php';
	?>

	<!-- Film Searcher
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
	</script>-->

</body>
</html>