<?php
	include("test_connect_db.php");
	$link=connectDataBase();
	session_start();
	
	$txt=$_POST['txt'];
	$id=$_SESSION['memberID'];
	
	$sql="INSERT INTO comment(comment_date, message, member_id) VALUES(CURRENT_TIMESTAMP,'$txt',$id)";

	if(mysqli_query($link,$sql)){
		$id=$_SESSION['memberID'];
		header("Location:forum.php?commented=yes");
	} else {
		header("Location:forum.php?commented=no");
	}
	
?>
