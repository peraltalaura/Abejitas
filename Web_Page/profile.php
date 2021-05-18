<!DOCTYPE html>
<html>
	<head>
		<title>My Account</title>
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
		<Link rel="stylesheet" href="css//account_CSS.css">
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
	<body class="bg-dark">
		<ul class="sidenav">
			<li>
				<h1 class="text-warning Center">ERLETE</h1>
			</li>
			<li>
				<a class="Center" href="index.php">HOME</a>
			</li>
			<li>
				<a class="Center" href="info.php">INFORMATION</a>
			</li>
			<li>
				<a class="Center" href="forum.php">FORUM</a>
			</li>
			<?php
				if(isset($_SESSION['memberID'])){
				?>
				<li>
					<a class="Center" href="login.php">BOOKINGS</a>
				</li>
				<?php
					} else {
				?>
				<li>
					<a class="Center" href="bookings.php">BOOKINGS</a>
				</li>
				<?php
				}
			?>
			<li>
				<a class="Center active" href="">MY ACCOUNT</a>
				<?php
					session_start();
					if(isset($_SESSION['memberID'])){
					?>
					<ul id="accountNav">
						<li>
							<a class="Center" href="profile.php?account=prof">EDIT</a>
						</li>
						<li>
							<a class="Center" href="profile.php?account=bal">BALANCE</a>
						</li>
						<li>
							<a class="Center" href="profile.php?account=trans">TRANSACTION</a>
						</li>
						<li>
							<a class="Center" href="profile.php?account=book">MY BOOKINGS</a>
						</li>
						<li>
							<a class="Center" href="profile.php?account=act">ACTIVITY</a>
						</li>
						<li>
							<a class="Center" href="profile.php?account=not">NOTIFICATIONS</a>
						</li>
					</ul>
					<?php
					}
				?>
			</li>
			<?php
				if(isset($_SESSION['memberID'])){
				?>
				<li>
					<a class="Center" href="close_session.php">LOGOUT</a>
				</li>
				<?php
					} else {
				?>
				<li>
					<a class="Center" href="login.php">LOGIN</a>
				</li>
				<?php
				}
			?>	
		</ul>
		<?php
			include("test_connect_db.php");
			$link=connectDataBase();			
			$id=$_SESSION['memberID'];
			/*switch to change the data displayed*/
			if(isset($_GET['account'])){
				$section=$_GET['account'];
				switch($section){
					/*Profile section*/
					case 'prof':
				?>
				<div class="content text-warning Center">	
					<h1 class="mt-4">MY PROFILE</h1>
					<!--Confirmation message that data has been updated -->
					<?php
						if(isset($_GET['update'])){
							if($_GET['update']=='yes'){
								printf("<div class='container Center text-warning RB'>Your profile has been changed</div>");
								} else if($_GET['update']=='no'){
								printf("<div class='container Center text-warning RB'>There was a problem updating your profile</div>");
							}
						}
					?>
					
					<?php
						$result=mysqli_query($link,"select* from member where member_id=$id");
						
						while($data=mysqli_fetch_array($result)){
						?>
						<div id="profile" class="container Center">
							<div class="row">
								<div class="col-sm-12">
									<?php
										printf("<img src='%s' width='250vw'>",$data['picture']);
									?>
								</div>
							</div>
							<div class="row RB">
								<?php
									printf("<div class='col-sm-7'>NAME:&nbsp;&nbsp; %s</div>",$data['name']);
									printf("<div class='col-sm-5'>SURNAME:&nbsp;&nbsp;%s</div>",$data[3]);
								?>
							</div>
							<div class="row RB">
								<?php
									printf("<div class='col-sm-7'>E-MAIL:&nbsp;&nbsp;%s</div>",$data[1]);
									printf("<div class='col-sm-5'>BIRTH-DATE:&nbsp;&nbsp;%s</div>",$data[5]);
								?>
							</div>
							<div class="row RB">
								<?php
									printf("<div class='col-sm-7'>CITY:&nbsp;&nbsp;%s</div>",$data[6]);
									printf("<div class='col-sm-5'>POST CODE:&nbsp;&nbsp;%d</div>",$data[7]);
								?>
							</div>
							<div class="row RB">
								<?php
									printf("<div class='col-sm-7'>ADDRESS:&nbsp;&nbsp;%s</div>",$data[8]);
									printf("<div class='col-sm-5'>PHONE:&nbsp;&nbsp;%d</div>",$data[9]);
								}
							?>
						</div>
						
						<a class="BRB" href="profile.php?account=mod">MODIFY PROFILE</a>
					</div>	
					<?php
						break;
						
						
						/*modify section*/
						case 'mod':
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
								header("Location:profile.php?account=prof&update=yes");
								} else {
								header("Location:profile.php?account=prof&update=no");
							}
						}	
					?>
					<div class="text-warning Center content">
						<form id="data" class="form-group Center" action="profile.php?account=mod&modify=yes" method="post" enctype="multipart/form-data">
							<h1 class="mt-4">EDIT PROFILE</h1>
							<div class="row RB Center bg-warning text-dark">
								<div class='col-sm-12'>
									PROFILE PICTURE: <input type="file" name="pic">
								</div>
							</div>
							<div class="row bg-warning text-dark">
								<?php
									printf("<div class='col-sm-6'>NAME: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='uname' value='%s' required></div>",$data[2]);
									printf("<div class='col-sm-6'>SURNAME: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='usurname' value='%s' required></div>",$data[3]);
								?>
							</div>
							<div class="row bg-warning text-dark">
								<?php
									printf("<div class='col-sm-6'>E-MAIL:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='email' name='mail' value='%s' required></div>",$data[1]);
									printf("<div class='col-sm-6'>BIRTH DATE: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='date' name='birth' value='%s'></div>",$data[5]);
								?>
							</div>
							<div class="row bg-warning text-dark">
								<?php
									printf("<div class='col-sm-6'>CITY: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='city' value='%s'></div>",$data[6]);
									printf("<div class='col-sm-6'>POST CODE: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='number' name='post' value='%d'></div>",$data[7]);
								?>
								</div>
								<div class="row bg-warning text-dark">
									<?php
										printf("<div class='col-sm-6'>ADDRESS: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='address' value='%s'></div>",$data[8]);
										printf("<div class='col-sm-6'>PHONE: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='tel' pattern='[0-9]{9}' name='phone' value='%d' required></div>",$data[9]);
									?>
								</div>
								<input class="text-dark bg-warning BRB" type="submit" value="MODIFY DATA"><br>
						</div>
					</form>
					<?php
						break;
						case 'bal':
					?>
					<div class="content text-warning Center">
					<h2 id="movement" class="mt-4">MY MOVEMENTS</h2>
					<br>
					<?php			
					$id=$_SESSION['memberID'];
					$result=mysqli_query($link,"SELECT* from payment where member_id=$id");
					?>
					<div class="table-responsive">
					<table class="table bg-dark text-warning Center">
					<tr>
					<th>PAYMENT ID</th>
					<th>DESCRIPTION</th>
					<th>DATE</th>
					<th>TOTAL</th>
					</tr>
					<?php
					$balance=0;
					while($data=mysqli_fetch_array($result)){
					printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%d €</td></tr>",$data[0],$data[1],$data[3],$data[2]);
					$balance=$balance+$data[2];
					}
					?>
					</table>
					</div>
					<div id="balance" class="row RB">
					<div class="col-sm-2"></div>
					<div class="col-sm-4">
					MY BALANCE:
					</div>
					<?php
					printf("<div class='col-sm-4'>%d €</div>",$balance);
					?>
					<div class="col-sm-2"></div>
					</div>
					</div>
					<?php
					break;
					default:
					echo "no hay datos";
					}
					}
					?>	
					</body>
					</html>
										