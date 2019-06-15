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

		<div class="row">
			
			<?php foreach (ordenarPor($peliculas['results'],'episode_id') as $pelicula) { ?>
				<div class="col-12 col-md-4">
					<div class="card">
						<div class="card-body">
							<h3 class="card-title"><?= $pelicula['title']; ?></h3>
							<h5 class="card-subtitle mb-2 text-muted">Episodio <?= representacionRomana($pelicula['episode_id']); ?></h5>
						</div>
					</div>
				</div> 
			<?php } ?>

		</div>
		<?php
			echo '<pre>';
			print_r($peliculas);
			echo '</pre>';

		?>


	</main>

	<?php
		include 'pie_pagina.php';
		include 'scripts.php';
	?>

</body>
</html>