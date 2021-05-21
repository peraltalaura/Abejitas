<!DOCTYPE html>
<html>
	<head>
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
		<!--<Link rel="stylesheet" href="CSS.css">-->
		<Link rel="stylesheet" href="">
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
	<body class="container bg-dark Center">
		<?php
			include("test_connect_db.php");
			$link=connectDataBase();	
			session_start();
			$id=$_SESSION['memberID'];
			$result=mysqli_query($link,"select* from member where member_id=$id");
			$data=mysqli_fetch_array($result);
			
			if(isset($_GET['modify'])){
				$user=$_POST['uname'];
				$surname=$_POST['usurname'];
				$email=$_POST['mail'];
				$birth=$_POST['birth'];
				$city=$_POST['city'];
				$post=$_POST['post'];
				$address=$_POST['address'];
				$phone=$_POST['phone'];
				$id=$_SESSION['memberID'];
				
				$dir="profile_pictures";
				$imagen=$_FILES['pic']['name'];
				$archivo= $_FILES['pic']['tmp_name'];
				$dir=$dir."/".$imagen;
				move_uploaded_file($archivo, $dir);
				
				$sql="UPDATE member SET name='$user', surname='$surname', email='$email', 
				birthdate='$birth', city='$city', address='$address',postcode='$post', 
				phone='$phone', picture='$dir' WHERE member_id=$id";
				
				mysqli_query($link,$sql);
				if(mysqli_query($link,$sql)){
					$id=$_SESSION['memberID'];
					header("Location:my_account.php?update=yes");
					} else {
					header("Location:my_account.php?update=no");
				}
			}
						
		?>
		<form id="data" class="form-group" action="update_data.php?modify=yes" method="post" enctype="multipart/form-data">
			<div class="text-warning Center">
				<h2 class="mt-4">MY PROFILE</h2>
				<div class="row RB">
					<div class="col-sm-2">
						PROFILE PICTURE:
					</div>
					<div class='col-sm-4'>
						<input type="file" name="pic">
					</div>
				</div>
				<div class="row RB">
					<div class="col-sm-2">
						NAME:
					</div>
					<?php
						printf("<div class='col-sm-4'><input type='text' name='uname' value='%s' required></div>",$data[2]);
					?>
					<div class="col-sm-2">
						SURNAME:
					</div>
					<?php
						printf("<div class='col-sm-4'><input type='text' name='usurname' value='%s' required></div>",$data[3]);
					?>
				</div>
				<div class="row RB">
					<div class="col-sm-2">
						E-MAIL:
					</div>
					<?php
						printf("<div class='col-sm-4'><input type='email' name='mail' value='%s' required></div>",$data[1]);
					?>
					<div class="col-sm-3">
						BIRTH DATE:
					</div>
					<?php
						printf("<div class='col-sm-3'><input type='date' name='birth' value='%s'></div>",$data[5]);
					?>
				</div>
				<div class="row RB">
					<div class="col-sm-2">
						CITY:
					</div>
					<?php
						printf("<div class='col-sm-4'><input type='text' name='city' value='%s'></div>",$data[6]);
					?>
					<div class="col-sm-3">
						POST CODE:
					</div>
					<?php
						printf("<div class='col-sm-3'><input type='number' name='post' value='%d'></div>",$data[7]);
					?>
				</div>
				<div class="row RB">
					<div class="col-sm-2">
						ADDRESS:
					</div>
					<?php
						printf("<div class='col-sm-4'><input type='text' name='address' value='%s'></div>",$data[8]);
					?>
					<div class="col-sm-3">
						PHONE NUMBER:
					</div>
					<?php
						printf("<div class='col-sm-2'><input type='tel' pattern='[0-9]{9}' name='phone' value='%d' required></div>",$data[9]);
					?>
				</div>
				<input class="text-dark bg-warning" type="submit" value="MODIFY DATA"><br>
				<a class="text-dark bg-warning BRB" href="my_account.php" type="button" value="MODIFY DATA">RETURN</a>
			</div>
		</form>
	</body>
</html>	