<?php
	include("test_connect_db.php");
	$user=$_POST["user"];
	$pass=$_POST["password"];
	$link=connectDataBase();
	
	$result=mysqli_query($link,"SELECT name,password,member_id FROM member WHERE name='$user' AND password='$pass'");
	$data=mysqli_fetch_array($result);
	
	if(mysqli_num_rows($result)==0){
		header("Location:index.php ? incorrect=yes");
		} else {
		session_start();
		$_SESSION['memberID']=$data[2];
		header("Location:index.php");
	}
?>