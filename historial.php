<?php

	/**
	* Starts or resumes a session and updates the user's history.
	*/
	function actualizar() {

		session_start();

		// Check if the history is stored in he session.
		if(!isset($_SESSION['historial']) || empty($_SESSION['historial'])) {
			$_SESSION['historial'] = array();
		}

		// Get current URL
		$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		// Add URL to history
		array_push($_SESSION['historial'], $url);
	}

	/**
	* Deletes the history in the session.
	*/
	function borrar() {

		session_start();
		
		// Delete PHPSESSID
		if ( isset($_COOKIE[session_name()]) )
			setcookie( session_name(), '', time()-3600, '/' );

		// Clean Global variables
		$_SESSION = array();

		// Delete session from disk
		if (isset($_SESSION))
			session_destroy();
	}
	
?>