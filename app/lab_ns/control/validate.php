<?php 

	session_start();

	date_default_timezone_set('America/Fortaleza');

	$validate = explode("/", $_SESSION["key_pass"]);
	$validate = $validate[1];

	if (!isset($_SESSION["key_pass"]) || $validate != date('Y-m-d')) {
		header("location: ../index.php");
	}

?>