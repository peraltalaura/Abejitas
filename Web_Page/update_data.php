<?php
	include("test_connect_db.php");
	$link=connectDataBase();

	$user=$_POST['uname'];
	$surname=$_POST['usurname'];
	$email=$_POST['mail'];
	$birth=$_POST['birth'];
	$city=$_POST['city'];
	$post=$_POST['post'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$id=mysqli_query($link,"SELECT member_id FROM member WHERE email='$email'");
	$data=mysqli_fetch_array($id);
	
	$sql="UPDATE member SET name='$user', surname='$surname', email='$email', birthdate=$birth, city='$city', address='$address', phone=$phone WHERE member_id=$data[0]";
	mysqli_query($link,$sql);
	
	if(mysqli_query($link,$sql)){
		$_SESSION['globaluser']=$user;
		header("Location:my_account.php ? update=yes");
	} else {
		header("Location:my_account.php ? update=no");
	}
	
?>