<?php
	include("test_connect_db.php");
	$link=connectDataBase();
	session_start();
	
	$book=$_POST['bookID'];
	$kilos=$_POST['kilos'];
	$total=$_POST['total'];
	$metal=$_POST['metalID'];

	$id=$_SESSION['memberID'];
	
	$sql1="INSERT INTO production(kilos,total,booking_id,metalbin_id) VALUES('$kilos',$total,$book,$metal)";
	$sql2="UPDATE booking SET kilos=kilos+$kilos, total=total+$total WHERE booking_id=$book";
	$sql3="INSERT INTO payment(description,total,member_id) VALUES('production',-$total,$id)";
	$sql4="UPDATE metalbin SET available=0 WHERE metalbin_id=$metal";
	if(mysqli_query($link,$sql1)&&mysqli_query($link,$sql2)&&mysqli_query($link,$sql3)&&mysqli_query($link,$sql4)){
		$id=$_SESSION['memberID'];
		header("Location:my_account.php ? insert=yes");
	} else {
		header("Location:my_account.php ? insert=no");
	}
	
?>