<?php

	include 'historial.php';
	actualizar();
	
	include 'utilidades.php';

	//Obtener películas del API (swapi.co/api/films/) como array
	@$personas = json_decode(file_get_contents('https://swapi.co/api/people/'));

?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'cabecera.php'; ?>
	<title>The Swapi App - Personajes</title>
</head>
<body>

	<?php
		// Menú de navegación

		include 'navegacion.php';
		nav('personajes');
	?>

	<!-- Cuerpo -->
	<main class="container py-3 px-5">

		<!-- Título -->
		<section class="jumbotron text-center">
			<i class="fas fa-users fa-5x d-inline"></i><h1 class="display-3 d-inline"> Personajes</h1>
		</section>
		
		<!-- Personajes -->
		<div class="container">
			<ul class="list-group row">
				<?php
					// Obtener el nombre del personaje
					foreach($personas->results as $persona) { ?>
						<li class="list-group-item col-md-6 mx-auto"><?= $persona->name; ?></li>
					<?php } ?>
			</ul>
		</div>


	</main>

	<?php
		include 'pie_pagina.php';
		include 'scripts.php';
	?>

</body>
</html>