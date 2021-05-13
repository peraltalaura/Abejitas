<?php
	include("test_connect_db.php");
	$link=connectDataBase();
	session_start();
	
	$book=$_POST['bookID'];
	$kilos=$_POST['kilos'];
	$total=$_POST['total'];
	$metal=$_POST['metalID'];
	
	$id=$_SESSION['memberID'];
	
	$sql1="";
	$sql2="UPDATE booking SET kilos=kilos+$kilos, total=total+$total WHERE booking_id=$book";
	$sql3="INSERT INTO payment(description,total,member_id,pay_date) VALUES('production',-$total,$id,CURRENT_TIMESTAMP)";
	$sql4="UPDATE metalbin SET available=0, available_date=DATE_ADD(NOW(),INTERVAL 20 DAY) WHERE metalbin_id=$metal";
	$sql5="SELECT availability FROM metalbin WHERE metalbin_id=$metal";
	
	if($metal!=null && mysqli_fetch_array(mysqli_query($link,$sql5))>0){
		$sql1="INSERT INTO production(kilos,total,booking_id,metalbin_id,production_date) VALUES('$kilos',$total,$book,$metal,CURRENT_TIMESTAMP)";
		} else {
		$sql1="INSERT INTO production(kilos,total,booking_id,production_date) VALUES('$kilos',$total,$book,CURRENT_TIMESTAMP)";
	}
	if(mysqli_query($link,$sql1)&&mysqli_query($link,$sql2)&&mysqli_query($link,$sql3)&&mysqli_query($link,$sql4)){
		$id=$_SESSION['memberID'];
		header("Location:my_account.php ? insert=yes");
		} else {
		header("Location:my_account.php ? insert=no");
	}
	
	
?>