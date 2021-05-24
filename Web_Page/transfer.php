<?php
	//calls the function connectDataBase to make a connection to erlete_db, where the data is stored
	include("test_connect_db.php");
	$link=connectDataBase();
	//starts the session 
	session_start();
	//stores the given data in variables
	$desc=$_POST['desc'];
	$import=$_POST['import'];
	$id=$_SESSION['memberID'];
	//The SQL query to insert a new payment done by the user 
	$sql="INSERT INTO payment(description,total,pay_date,member_id) VALUES('$desc',$import,CURRENT_TIMESTAMP,$id)";
	//if the query is correct it will return the user to the balance section of the profile page with the insert = yes variable
	if(mysqli_query($link,$sql)){
		$id=$_SESSION['memberID'];
		header("Location:profile.php?account=bal&insert=yes");
		//if the query is incorrect it will return the user to the balance section of the profile page with the insert = no variable
	} else {
		header("Location:profile.php?account=bal&insert=no");
	}
	
?>