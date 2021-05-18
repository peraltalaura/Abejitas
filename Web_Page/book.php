<?php
	include("test_connect_db.php");
	$link=connectDataBase();
	session_start();
	
	$entry=$_POST['entry'];
	$exit=$_POST['exit'];
	$exit = date('Y-m-d', strtotime($exit. ' + 1 days'));
	$id=$_SESSION['memberID'];
	$ok=true;

	$cdate=date("Y-m-d");

	$sql="SELECT entrydate, exitdate FROM booking";
	$result = mysqli_query($link,$sql);
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
