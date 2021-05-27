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
$cpass=$_POST['cpass'];

$dir="profile_pictures";
$imagen=$_FILES['pic']['name'];
$sql="SELECT password FROM member WHERE member_id=$id";
$data=mysqli_fetch_array(mysqli_query($link,$sql));
/* SQL query to insert the introduced information on the member table from the database if the password is correct*/
if(password_verify($cpass, $data['password'])){
	/* if the user has uploaded an image it makes this insert with all the data*/
	if($imagen!=null){
		$archivo= $_FILES['pic']['tmp_name'];
		$dir=$dir."/".$imagen;
		move_uploaded_file($archivo, $dir);

		$sql="UPDATE member SET name='$user', surname='$surname', email='$email', 
		birthdate='$birth', city='$city', address='$address',postcode='$post', 
		phone='$phone', picture='$dir' WHERE member_id=$id";
		/* if there isn't a new image it does the insert only of the rest of the information*/
	}else{
		$sql="UPDATE member SET name='$user', surname='$surname', email='$email', 
		birthdate='$birth', city='$city', address='$address',postcode='$post', 
		phone='$phone' WHERE member_id=$id";
	}

	mysqli_query($link,$sql);
	/* if the query is correct it returs the user to the profile page sending the variable updated = yes*/
	if(mysqli_query($link,$sql)){
		header("Location:profile.php?account=prof&update=yes");
		/* if the query has given an error it returs the user to the profile page sending the variable updated = no*/
	} else {
		header("Location:profile.php?account=prof&update=no");
	}
	/* if the pasword is wrong it returns the user to the profile page sending the variable updated = no*/
}else{
	header("Location:profile.php?account=prof&update=no");
}
?>