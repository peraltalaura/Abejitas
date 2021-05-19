<?php
	include("test_connect_db.php");
	$link=connectDataBase();
	session_start();
	
	$id=$_GET['productid'];
	
	$sql="UPDATE metalbin SET available = true WHERE metalbin_id = (SELECT metalbin_id FROM production WHERE production_id = $id)";
	$sql2="UPDATE production SET production_date = null WHERE production_id = $id";
	mysqli_query($link,$sql);
	mysqli_query($link,$sql2);
	header("Location:profile.php?available=yes");
?>
