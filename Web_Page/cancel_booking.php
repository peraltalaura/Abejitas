<?php
	include("test_connect_db.php");
	$link=connectDataBase();
//starts the session 
	session_start();
//it gets the data from the form and stores it into variables
	$bid=$_GET['bid'];
	$id=$_SESSION['memberID'];

	$data=mysqli_fetch_array(mysqli_query($link,"SELECT * FROM booking WHERE booking_id = $bid"));

	if ($data['entrydate']>=date("Y-m-d")) {
		
		$sql="DELETE FROM booking WHERE booking_id = $bid";

		if(mysqli_query($link,$sql)){
			header("Location:profile.php?account=book&delete=yes");
		}else{
			header("Location:profile.php?account=book&delete=no");
		}
	}else{
		header("Location:profile.php?account=book&delete=disabled");
	}

?>