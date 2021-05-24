<?php
	//calls the function connectDataBase to make a connection to erlete_db, where the data is stored
	include("test_connect_db.php");
	$link=connectDataBase();
	//starts the session 
	session_start();
	//stores the given data in variables
	$nid=$_GET['nid'];
	//The SQL query to set the notification to seen and return the user to the account page with the variable not
	$sql="UPDATE notify SET seen = true WHERE notify_id = $nid";

	mysqli_query($link,$sql);
	header("Location:profile.php?account=not");
?>