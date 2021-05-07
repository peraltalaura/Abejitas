<?php
	session_start();
	unset($_SESSION['globaluser']);
	session_destroy();
	header('Location:home.php');
?>