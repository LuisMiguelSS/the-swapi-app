<!-- Footer -->
<footer class="text-center py-3 bg-dark text-light">
	<a href="" data-toggle="modal" data-target="#historial">Ver historial</a>

	<!-- History -->
	<div class="modal fade" id="historial" tabindex="-1" role="dialog" aria-labelledby="historial" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">

			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-primary">Historial de visitas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<!-- History list of links -->
					<ul class="list-group">
						<?php foreach (array_reverse(filter_input_array($_SESSION['historial'])) as $enlace) { ?>
							
								<li class="list-group-item"><a class="text-secondary" href="<?= $enlace; ?>"><?= $enlace; ?></a></li>

						<?php } ?>
					</ul>



				</div>
				<div class="modal-footer">
					<form method="post" action="/borrar.php">
						<button type="submit" class="btn btn-default">Borrar</button>
					</form>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	© <?= date("Y"); ?> Copyright <a href="https://luismiguelsoto.com"> Luis Miguel Soto Sánchez</a>
</footer>