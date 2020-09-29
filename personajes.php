<?php

	include 'historial.php';
	actualizar();
	
	include 'utilidades.php';

	@$personas = [];

	$page = 1;
	$url = api_base_url() . 'people/?page=';
	while (!@get_headers_query($url . strval($page)) || @get_headers_query($url . strval($page))[0] !== 'HTTP/1.1 404 Not Found') {
		array_push($personas, json_decode(file_get_contents(api_base_url() . 'people/?page=' . ++$page)));
	}

?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'cabecera.php'; ?>
	<title>The Swapi App - Personajes</title>
</head>
<body>

	<?php
		// Navigation Menu
		include 'navegacion.php';
		nav('personajes');
	?>

	<!-- Body -->
	<main class="container py-3 px-5">

		<!-- Title -->
		<section class="jumbotron text-center">
			<i class="fas fa-users fa-5x d-inline"></i><h1 class="display-3 d-inline"> Personajes</h1>
		</section>
		
		<!-- Characters -->
		<div class="container">
			<ul class="list-group row">
				<?php
					// Get the character's name
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