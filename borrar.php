<?php

	require 'historial.php';
	borrar();
	
	header('Location: ' . $_SERVER["HTTP_REFERER"] );
	exit;

?>