<!DOCTYPE html>
<html>
<head>
	<?php include 'cabecera.php'; ?>
	<title>The Swapi App</title>
</head>
<body>

	<?php
		// Menú de navegación
	
		include 'navegacion.php';
		nav('index');
	?>

	<!-- Cuerpo -->
	<main>
		<!-- ... -->
	</main>

	<!-- Pie de Página -->
	<footer></footer>

	<!-- Scripts -->

		<!-- AOS -->
		<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
		<script>
			AOS.init({once: true}); //Realizar las animaciones de aparición 1 única vez.
		</script>

	    <!-- JQuery -->
	    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

		<!-- Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<!-- LESS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js"></script>
</body>
</html>