<?php
	//calls the function connectDataBase to make a connection to erlete_db, where the data is stored
	include("test_connect_db.php");
	$link=connectDataBase();
	//starts the session 
	session_start();
	//it gets the data from the form and stores it into variables
	$entry=$_POST['entry'];
	$exit=$_POST['exit'];
	$exit = date('Y-m-d', strtotime($exit. ' + 1 days'));
	$id=$_SESSION['memberID'];
	$ok=true;
	$cdate=date("Y-m-d");
	// The SQL query to extract the entry date and exit date of the bookings table
	$sql="SELECT entrydate, exitdate FROM booking";
	$result = mysqli_query($link,$sql);
	// This algorithm checks whether the entered dates are valid or not. If p1 and p2 end up having the same value and the ok variable is true the dates get considered valid.
	if($exit>=$entry && $entry>=$cdate){
		while($data=mysqli_fetch_array($result)){
			$p1=-1;
			$p2=-2;
			if($data['entrydate']<$exit){
				$p1=1;
			}else{
				$p1=0;
			}
			if($data['exitdate']<$entry){
				$p2=1;
			}else{
				$p2=0;
			}
			if($p1!=$p2){
				$ok=false;
			}
		}
	}else{
		$ok=false;
	}

	if($ok){
		$sql="INSERT INTO booking(entrydate,exitdate,member_id,kilos,total) VALUES('$entry','$exit',$id,0,0)";
	}else{
		$sql="SELECT * FROM members";
	}

	if(mysqli_query($link,$sql) && $ok == true){
		$id=$_SESSION['memberID'];
		header("Location:bookings.php?insert=yes");
		} else {
		header("Location:bookings.php?insert=no");
	}

?>
