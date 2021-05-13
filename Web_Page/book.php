<?php
	include("test_connect_db.php");
	$link=connectDataBase();
	session_start();
	
	$entry=$_POST['entry'];
	$exit=$_POST['exit'];
	$id=$_SESSION['memberID'];
	
	$sql="INSERT INTO booking(entrydate,exitdate,member_id,kilos,total) VALUES('$entry','$exit',$id,0,0)";
	
	if(mysqli_num_rows()){
		$id=$_SESSION['memberID'];
		header("Location:bookings.php ? insert=yes");
		} else {
		header("Location:bookings.php ? insert=no");
	}

?>