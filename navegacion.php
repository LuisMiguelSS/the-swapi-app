
<?php

	function nav($pagina) {
		?>
			<!-- Navegación -->
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

				<!-- Menú Izquierdo -->
				<div class="navbar-collapse collapse w-100 dual-collapse2 order-1 order-md-0">
					<ul class="navbar-nav ml-auto text-center">
						<li class="nav-item <?= ($pagina == 'peliculas') ? 'active':'' ?>">
							<a class="nav-link" href="peliculas/">Películas</a>
						</li>
						<li class="nav-item <?= ($pagina == 'personajes') ? 'active':'' ?>">
							<a class="nav-link" href="personajes/">Personajes</a>
						</li>
					</ul>
				</div>

				<!-- Título -->
				<div class="mx-auto my-2 px-3 order-0 order-md-1 position-relative">
					<a class="site-logo navbar-brand mx-auto" href="/"><i class="fab fa-galactic-senate fa-2x"></i> The Star Wars App</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
						<span class="navbar-toggler-icon"></span>
					</button>
					<!-- Posible enlace de Inicio aquí -->
				</div>

				<!-- Menú Derecho -->
				<div class="navbar-collapse collapse w-100 dual-collapse2 order-2 order-md-2">
					<ul class="navbar-nav mr-auto text-center">
						<li class="nav-item <?= ($pagina == 'buscar') ? 'active':'' ?>">
							<a class="nav-link" href="buscar/">Buscar</a>
						</li>
						<li class="nav-item <?= ($pagina == 'may4') ? 'active':'' ?>">
							<a class="nav-link" href="may4/">May 4<sup>th</sup></a>
						</li>
					</ul>
				</div>
			</nav>

			<?php

	}