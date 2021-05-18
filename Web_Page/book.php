<?php
	include("test_connect_db.php");
	$link=connectDataBase();
	session_start();
	
	$entry=$_POST['entry'];
	$exit=$_POST['exit'];
	$id=$_SESSION['memberID'];
	
	$sql="SELECT entrydate, exitdate FROM booking";
	$result = mysqli_query($link,$sql);
	$ok = true;
	if($entry<$exit){
		while($dayc=mysqli_fetch_array($result)){
			$p1=-1;
			$p2=-2;
			if($dayc['entrydate']<$exit){
				$p1=1;
			}else{
				$p1=0;
			}
			if($dayc['exitdate']<$entry){
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

	if($ok==true){
		$sql="INSERT INTO booking(entrydate,exitdate,member_id,kilos,total) VALUES('$entry','$exit',$id,0,0)";
	}else{
		$sql="SELECT * FROM member";
	}
	
	if(mysqli_query($link,$sql) && $ok == true){
		$id=$_SESSION['memberID'];
		header("Location:bookings.php?insert=yes");
		} else {
		header("Location:bookings.php?insert=no");
	}

?>
