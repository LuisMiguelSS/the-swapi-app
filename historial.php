<?php

	/**
	* Inicia o resume una sesión y seguidamente actualiza el historial del usuario.
	*/
	function actualizar() {

		session_start();

		// Comprobar si está establecida la variable historial en la sesión
		if(!isset($_SESSION['historial']) || empty($_SESSION['historial'])) {
			$_SESSION['historial'] = array();
		}

		// Obtener URL actual
		$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		// Añadir al historial
		array_push($_SESSION['historial'], $url);
	}

	/**
	* Esta función permite vaciar el contenido guardado
	* en la variable historial.
	*/
	function borrar() {

		session_start();
		
		//Eliminar PHPSESSID
		if ( isset($_COOKIE[session_name()]) )
			setcookie( session_name(), '', time()-3600, '/' );

		//Limpiar variables globales
		$_SESSION = array();

		//Borrar sesión del disco
		if (isset($_SESSION))
			session_destroy();
	}
	
?>