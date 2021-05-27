<?php
	//calls the function connectDataBase to make a connection to erlete_db, where the data is stored
	include("test_connect_db.php");
	$link=connectDataBase();
	//starts the session 
	session_start();
	//stores the given data in variables
	
	$id=$_GET['productid'];
	//The SQL query to update the metalbin table and set the availability to true, then returns the user to the bookings section of the profile page 
	$sql="UPDATE metalbin SET available = true WHERE metalbin_id = (SELECT metalbin_id FROM production WHERE production_id = $id)";
	mysqli_query($link,$sql);
	header("Location:profile.php?account=book");
?>
