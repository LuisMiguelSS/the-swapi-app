<?php

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
	<main>
		<?php

			if ($pelicula == false) mostrarError("La película que se quiere buscar no existe.");
			else
				{
					?>

					

					
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