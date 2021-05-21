<?php
	include("test_connect_db.php");
	$user=$_POST["mail"];
	$pass=$_POST["password"];
	$link=connectDataBase();
	
	$sql="SELECT * FROM member WHERE email=?";
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s',$user);
	$stmt->execute();
	
	
	if($result =  $stmt->get_result()){
		while ($data= $result->fetch_assoc()) {
			if (($user == $data["email"]) && (password_verify($pass, $data["password"]))) { 
				if($data["active"]==1){
					session_start();
					$_SESSION['memberID'] = $data["member_id"];
					header("Location:profile.php?account=prof&login");
					}else if($data["active"]==0) {
					header("Location:login.php?incorrect=disable");
				}
				} else {    
				header("Location:login.php?incorrect=yes");
			}
		}
		}else {
		header("Location:login.php?found=no");
	}
	
?>