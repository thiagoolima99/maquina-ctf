<?php 

	session_start();

	unset($_SESSION["key_pass"]);

	header("location: ../index.php");

?>