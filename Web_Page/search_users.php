<?php
	//calls the function connectDataBase to make a connection to erlete_db, where the data is stored
	include("test_connect_db.php");
	$link=connectDataBase();
	//stores the given data in variables
	$user=$_POST["mail"];
	$pass=$_POST["password"];
	//The SQL query to select the information from the member who is loggin in
	$sql="SELECT * FROM member WHERE email='$user'";
	$result=mysqli_query($link,$sql);

	//if the result isn't null continues
	if(mysqli_num_rows($result)==1){
			//if the users introduced email and password equel the ones taken from the database
		$data=mysqli_fetch_array($result);
			if (($user == $data["email"]) && (password_verify($pass, $data["password"]))) { 
			//if the account is active it starts session, stores the id in a global variable and redirects the user to the profile page and returns the login variable
				if($data["active"]==1){
					session_start();
					$_SESSION['memberID'] = $data["member_id"];
					header("Location:profile.php?account=prof&login");
					//if the account isn't active it returns the user to the login page with the incorrect=disable variable
					}else if($data["active"]==0) {
					header("Location:login.php?incorrect=disable");
				}
				//if the data doesn't match it returns the user to the login page with the variable incorrect = yes
				} else {    
				header("Location:login.php?incorrect=yes");
			}
		
		//if the result is null it redirects the user to the login page and return the variable found=no
		}else {
		header("Location:login.php?found=no");
	}
	
?>