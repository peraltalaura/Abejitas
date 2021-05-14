<?php
	include("test_connect_db.php");
	$user=$_POST["user"];
	$pass=$_POST["password"];
	$link=connectDataBase();
	
	$sql="SELECT * FROM member WHERE name=?";
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s',$user);
	$stmt->execute();
	/*$stmt->bind_result($user, $pass);
	$stmt->store_result();
	
	if($stmt->num_rows==0){
		header("Location:index.php ? incorrect=yes");
		} else {
		session_start();
		$_SESSION['memberID']=$data[2];
		header("Location:index.php");
	}*/

$result =  $stmt->get_result(); //$conn->query($sql);
while ($data = $result->fetch_assoc()) {
    if (($user == $data["name"]) && ($pass == $data["password"]) && ($data["password"])) { 
    session_start();
    $_SESSION['memberID'] = $data["member_id"];
    header("Location:index.php");
    } else{    
    header("Location:index.php ? incorrect=yes");
    }
}
?>