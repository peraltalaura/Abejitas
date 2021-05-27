<?php
	//calls the function connectDataBase to make a connection to erlete_db, where the data is stored
	include("test_connect_db.php");
	$link=connectDataBase();
	//starts the session 
	session_start();
	//stores the given data in variables
	$txt=$_POST['txt'];
	$id=$_SESSION['memberID'];
	//SQL query to insert in the comment table the information given
	$sql="INSERT INTO comment(comment_date, message, member_id) VALUES(CURRENT_TIMESTAMP,'$txt',$id)";
	//if the query is correct it returns the user to the forum page with the variable commented = yes
	if(mysqli_query($link,$sql)){
		$id=$_SESSION['memberID'];
		header("Location:forum.php?commented=yes");
		//if the query is incorrect it returns the user to the forum page with the variable commented = no
	} else {
		header("Location:forum.php?commented=no");
	}
	
?>
