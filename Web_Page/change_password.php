<!DOCTYPE html>
<html>
	<head>	
		<title>Change Password</title>
		<link rel="preconnect" href="https://fonts.gstatic.com"><link>
		<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Lato&display=swap" rel="stylesheet">
		<link rel="icon"  type="image/jpg" href="images/bee-icon.jpg">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<Link rel="stylesheet" href="css//login_CSS.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
			h1 {
			font-family: 'Dancing Script', cursive;
			}
			body {
			font-family: 'Lato', sans-serif;
			}
		</style>
	</head>
	<body class="bg-warning Center">
		<div class="Center bg-dark text-warning RB pt-4 pb-4">
			<h1>CHANGE</h1>
			<h1>PASSWORD</h1>
				<form class="form-group form-group-sm Center pt-4" action="change_password.php?exec" method="POST">
					<label>New Password:<input type="password" name="npass"></label>
					<label>Comfirm Password:<input type="password" name="cnpass"></label>
					<label>Old Password:<input type="password" name="opass"></label>
					<input class="mt-4 mp-4" type="submit" value="Submit">
				</form>
		</div>	
		<a href="profile.php?account=prof" class="BRB bg-dark">RETURN</a>
	<?php
	if(isset($_GET["exec"])){

		session_start();
		$id = $_SESSION["memberID"];/* userid of the user */
		include("test_connect_db.php");
		$con=connectDataBase();
		if(count($_POST)>0) {
		$result = mysqli_query($con,"SELECT* from member WHERE member_id='" . $id . "'");
		$row=mysqli_fetch_array($result);
		if($_POST["opass"] == $row["password"] && $_POST["npass"] == $_POST["cnpass"] ) {
		mysqli_query($con,"UPDATE member set password='" . $_POST["npass"] . "' WHERE member_id='" . $id . "'");
		
		header("Location:profile.php?account=prof");
		} else{
		 header("Location:change_password.php?changed=no");
		}
		}
	}
	?>
</body>
</html>	
				