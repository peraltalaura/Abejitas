<?php
//calls the function connectDataBase to make a connection to erlete_db, where the data is stored
	include("test_connect_db.php");
	$link=connectDataBase();
//starts the session 
	session_start();
//it gets the data from the form and stores it into variables
	$book=$_POST['bookID'];
	$kilos=$_POST['kilos'];
	$total= $kilos * 0.25;
	$metal=$_POST['metalID'];

	$id=$_SESSION['memberID'];
	// the SQL query to update the bookings table and add the kilos and total of the production introduced in the booking selected(booking_id)
	$sql2="UPDATE booking SET kilos=kilos+$kilos, total=total+$total WHERE booking_id=$book";
	// the SQL query to register a new payment that will take off the amount of money to the user that has made de production
	$sql3="INSERT INTO payment(description,total,member_id,pay_date) VALUES('production',-$total,$id,CURRENT_TIMESTAMP)";
	// the SQL query to update the metalbins table and set the available to 1 (false) and calculate the data when it will be available
	$sql4="UPDATE metalbin SET available=0, available_date=DATE_ADD(NOW(),INTERVAL 20 DAY) WHERE metalbin_id=$metal";
	//if the variable metal has an id the metalbin_id will be registered
	if($metal!=null){
		$tsql="SELECT * FROM metalbin WHERE metalbin_id = $metal";
		$result = mysqli_query($link,$tsql);
		$data=mysqli_fetch_array($result);
		if($data['capacity'] >= $kilos){
			$sql1="INSERT INTO production(kilos,total,booking_id,metalbin_id,production_date) VALUES('$kilos',$total,$book,$metal,CURRENT_TIMESTAMP)";
		}else{
			header("Location:profile.php?account=book&capacity");
		}

	// if the variable metal has a null value it will just make an insert SQL query intro the production table with all the data except the metalbin_id
		} else {
		$sql1="INSERT INTO production(kilos,total,booking_id,production_date) VALUES('$kilos',$total,$book,CURRENT_TIMESTAMP)";

	}

	// if all the querys are correct the user will be redirected to the bookings section of the profile page and the variable insert = yes will be sent
	if(mysqli_query($link,$sql1)&&mysqli_query($link,$sql2)&&mysqli_query($link,$sql3)&&mysqli_query($link,$sql4)){
		$id=$_SESSION['memberID'];
		header("Location:profile.php?account=book&insert=yes");
	// if some of the querys are incorrect the user will be redirected to the bookings section of the profile page and the variable insert = no will be sent
		} else {
		header("Location:profile.php?account=book&insert=no");
	}
?>