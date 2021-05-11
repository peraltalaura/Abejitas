<?php
	include("test_connect_db.php");
	$user=$_POST["user"];
	$pass=$_POST["password"];
	$link=connectDataBase();
	$result=mysqli_query($link,"SELECT name,password FROM member WHERE name='$user' AND password='$pass'");
	
	if(mysqli_num_rows($result)==0){
		header("Location:index.php ? incorrect=yes");
		} else {
		session_start();
		$_SESSION['globaluser']=$user;
		header("Location:index.php");
	}
?>