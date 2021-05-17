<?php
	include("test_connect_db.php");
	$link=connectDataBase();
	session_start();
	
	$nid=$_GET['nid'];
	
	$sql="UPDATE notify SET seen = true WHERE notify_id = $nid";

	mysqli_query($link,$sql);
	header("Location:my_account.php");
?>