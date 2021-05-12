<?php
	include("test_connect_db.php");
	$link=connectDataBase();
	session_start();
	
	$user=$_POST['uname'];
	$surname=$_POST['usurname'];
	$email=$_POST['mail'];
	$birth=$_POST['birth'];
	$city=$_POST['city'];
	$post=$_POST['post'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$id=$_SESSION['memberID'];
	
	$sql="UPDATE member SET name='$user', surname='$surname', email='$email', birthdate='$birth', city='$city', address='$address', phone=$phone WHERE member_id=$id";
	mysqli_query($link,$sql);
	if(mysqli_query($link,$sql)){
		$id=$_SESSION['memberID'];
		header("Location:my_account.php ? update=yes");
	} else {
		header("Location:my_account.php ? update=no");
	}
	
?>