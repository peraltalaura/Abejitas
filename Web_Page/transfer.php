<?php
	include("test_connect_db.php");
	$link=connectDataBase();
	session_start();
	
	$desc=$_POST['desc'];
	$date=$_POST['date'];
	$import=$_POST['import'];

	$id=$_SESSION['memberID'];
	
	$sql="INSERT INTO payment(description,total,pay_date,member_id) VALUES('$desc',$import,'$date',$id)";
	mysqli_query($link,$sql);
	if(mysqli_query($link,$sql)){
		$id=$_SESSION['memberID'];
		header("Location:my_account.php ? insert=yes");
	} else {
		header("Location:my_account.php ? insert=no");
	}
	
?>