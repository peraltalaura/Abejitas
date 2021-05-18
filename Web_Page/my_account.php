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
		<Link rel="stylesheet" href="css/account_CSS.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
			h1 {
			font-family: 'Dancing Script', cursive;
			}
			body {
			font-family: 'Lato', sans-serif;
			}
			.active {
			background:black;
			color:rgb(255, 204, 0);
			box-shadow: 0vw 0vw 1vw 0vw rgb(255, 204, 0);
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
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c4b891ba15dc2ba8e8f56ed0e4f6474897990f94
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
						<a class="Center active" href="#data" onclick="edit()">EDIT</a>
					</li>
					<li>
						<a class="Center" href="#movement">BALANCE</a>
					</li>
					<li>
						<a class="Center" href="#transfer">TRANSACTION</a>
					</li>
					<li>
						<a class="Center" href="#bookings">MY BOOKINGS</a>
					</li>
					<li>
						<a class="Center" href="#activity">ACTIVITY</a>
					</li>
					<li>
						<a class="Center" href="#notification">NOTIFICATIONS</a>
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
				printf("<div class='col-sm-3'><input type='text' name='uname' value='%s' required></div>",$data[2]);

					} else {
				?>
				<li>
					<a class="Center" href="bookings.php">BOOKINGS</a>
				</li>
				<?php

				printf("<div class='col-sm-3'><input type='text' name='usurname' value='%s' required></div>",$data[3]);
				?>
			</div>
			<div class="row RB">
				<div class="col-sm-2">
					E-MAIL:
				</div>
				<?php
				printf("<div class='col-sm-3'><input type='email' name='mail' value='%s' required></div>",$data[1]);
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
							<a class="Center active" href="my_account.php?account=prof" >EDIT</a>
						</li>
						<li>
							<a class="Center" href="my_account.php?account=bal">BALANCE</a>
						</li>
						<li>
							<a class="Center" href="my_account.php?account=trans">TRANSACTION</a>
						</li>
						<li>
							<a class="Center" href="my_account.php?account=book">MY BOOKINGS</a>
						</li>
						<li>
							<a class="Center" href="my_account.php?account=act">ACTIVITY</a>
						</li>
						<li>
							<a class="Center" href="my_account.php?account=not">NOTIFICATIONS</a>
						</li>
					</ul>
					<?php
					}

				printf("<div class='col-sm-3'><input type='text' name='usurname' value='%s' required></div>",$data[3]);
				?>
			</div>
			<div class="row RB">
				<div class="col-sm-2">
					E-MAIL:
				</div>
				<?php
				printf("<div class='col-sm-3'><input type='email' name='mail' value='%s' required></div>",$data[1]);
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
			$result=mysqli_query($link,"select* from member where member_id=$id");
			
			while($data=mysqli_fetch_array($result)){
			?>
			<div class="content text-warning Center">	
				<h2 class="mt-4">MY PROFILE</h2>
				<?php 
					if(isset($_GET['update'])){
						if($_GET['update']=='yes'){
							printf("<div class='container Center text-warning RB'>Your profile has been changed</div>");
							} else if($_GET['update']=='no'){
							printf("<div class='container Center text-warning RB'>There was a problem updating your profile</div>");
						}
					}
					
					if(isset($_GET['found'])){
						printf("<div class='container Center text-warning RB'>Email not found</div>");
						
					}
				?>
				<div class="row RB">
					<div class='col-sm-4'>
						<?php
							printf("<img src='%s' width='250px'>",$data['picture']);
						?>
					</div>
				</div>
				<div class="row RB">
					<div class="col-sm-2">
						NAME:
					</div>
					<?php
						printf("<div class='col-sm-3'>%s</div>",$data['name']);
					?>
					<div class="col-sm-2">
						SURNAME:
					</div>
					<?php
						printf("<div class='col-sm-3'>%s</div>",$data[3]);
					?>
				</div>

				<?php
				printf("<div class='col-sm-2'><input type='tel' name='phone' value='%d' required></div>",$data[9]);

				<div class="row RB">
					<div class="col-sm-2">
						E-MAIL:
					</div>
					<?php
						printf("<div class='col-sm-3'>%s</div>",$data[1]);
					?>
					<div class="col-sm-3">
						BIRTH DATE:
					</div>
					<?php
						printf("<div class='col-sm-3'>%s</div>",$data[5]);
					?>
				</div>
				<div class="row RB">
					<div class="col-sm-2">
						CITY:
					</div>
					<?php
						printf("<div class='col-sm-3'>%s</div>",$data[6]);
					?>
					<div class="col-sm-3">
						POST CODE:
					</div>
					<?php
						printf("<div class='col-sm-3'>%d</div>",$data[7]);
					?>
				</div>
				<div class="row RB">
					<div class="col-sm-2">
						ADDRESS:
					</div>
					<?php
						printf("<div class='col-sm-4'>%s</div>",$data[8]);
					?>
					<div class="col-sm-3">
						PHONE NUMBER:
					</div>
					<?php
						printf("<div class='col-sm-2'>%d</div>",$data[9]);
					}

				<?php
				printf("<div class='col-sm-2'><input type='tel' name='phone' value='%d' required></div>",$data[9]);


				?>
			</div>
			<a class="text-dark bg-warning BRB" href="update_data.php" type="button" value="MODIFY DATA">MODIFY PROFILE</a>
		</div>
		
		
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
		
		
		<div class="content text-warning Center">
			<h2 id="transfer" class="mt-4">TRANSFER</h2>
			<form class="form-group" action="transfer.php" method="post">
				<div class="row RB">
					<div class="col-sm-5">
						DESCRIPTION:
					</div>
					<div class='col-sm-7'>
						<input type='text' required="required" name='desc'>
					</div>
				</div>
				
				<div class="row RB">
					<div class="col-sm-4">
						CUANTITY:
					</div>
					<div class='col-sm-8'>
						<input type='text'required="required" name='import'>
					</div>
				</div>
				<input class="text-dark bg-warning" type="submit" value="TRANSFER">
			</form>
		</div>
		
		<div class="content text-warning Center">
			<h2 id="bookings" class="mt-4">MY BOOKINGS</h2>
			<br>
			<?php			
				$id=$_SESSION['memberID'];
				$result=mysqli_query($link,"SELECT* from booking where member_id=$id");
			?>
			<div class="table-responsive">
				<table class="table bg-dark text-warning Center">
					<tr>
						<th>BOOKING ID</th>
						<th>ENTRY DATE</th>
						<th>EXIT DATE</th>
						<th>KILOS PRODUCED</th>
						<th>TOTAL TO PAY</th>
					</tr>
					<?php
						while($data=mysqli_fetch_array($result)){
							printf("<tr><td class='id'>%d</td><td>%s</td><td>%s</td><td>%d KG</td><td>%d €</td></tr>",$data[0],$data[1],$data[2],$data[3],$data[4]);
						}
					?>
				</table>
			</div>
		</div>
		
		<div class="content text-warning Center">
			<h2 id="activity" class="mt-4">MY ACTIVITY</h2>
			<br>
			<?php			
				$id=$_SESSION['memberID'];
				$result=mysqli_query($link,"SELECT production_id,kilos,total,production_date FROM production WHERE booking_id IN (SELECT booking_id FROM booking WHERE member_id=$id)");
			?>
			<div class="table-responsive">
				<table class="table bg-dark text-warning Center">
					<tr>
						<th>PRODUCTION ID</th>
						<th>KILOS PRODUCED</th>
						<th>TOTAL TO PAY</th>
						<th>FINISH</th>
					</tr>
					<?php
						/* checks if the productions are finished or not and gives you the option to stop them */
						while($data=mysqli_fetch_array($result)){
							if($data[3]== null){
								printf("<tr><td>%d</td><td>%d KG</td><td>%d €</td><td>Finished</tr>",$data[0],$data[1],$data[2]);
								}else{
								printf("<tr><td>%d</td><td>%d KG</td><td>%d €</td><td><a type='button' href='setAvailable.php?productid=$data[0]' class='btn btn-dark text-warning BRB'>END</a></tr>",$data[0],$data[1],$data[2]);
							}
						}
						
						
					?>
				</table>
			</div>
			<h2 id="production" class="mt-4">REGISTER PRODUCTION</h2>
			<form class="form-group container Center" action="produce.php" method="post">
				<div class="row RB">
					<div class="col-sm-4 Center">
						SELECT YOUR BOOKING:
					</div>
					<div class='col-sm-2 Center' style="margin:0">
						<select class="custom-select" name="bookID">
							<?php
								$id=$_SESSION['memberID'];
								$result=mysqli_query($link,"SELECT booking_id from booking where member_id=$id");
								
								while($data=mysqli_fetch_array($result)){
									printf("<option>%d</option>",$data[0]);
								}
							?>
						</select>
					</div>
				</div>
				<div class='col-sm-8'>
					<input type='number'required="required" name='import' min="1">
				<div class="row RB">
					<div class="col-sm-4">
						KILOS:
					</div>

					<div class='col-sm-8'>
						<input type='number'required="required" name='kilos'>
					</div>
			
				<div class='col-sm-8'>
					<input type='number'required="required" name='import' min="1">

				</div>
				
				<div class="row RB">
					<div class="col-sm-6 Center">
						SELECT THE METALBIN:
					</div>
					<div class='col-sm-4 Center'>
						<select class="custom-select" aria-label="Default select example" name='metalID'>
							<option>my own bin</option>
							<?php
								$id=$_SESSION['memberID'];
								$result=mysqli_query($link,"SELECT metalbin_id, name from metalbin where available=1");
								
								while($data=mysqli_fetch_array($result)){
									printf("<option value='%d'>%d liter bin</option>",$data[0],$data[1]);
								}
							?>
						</select>
					</div>
				</div>
				<input class="text-dark bg-warning" style="padding-right:6.2vw" type="submit" value="REGISTER">
			</form>
		</div>
	</div>
	<div class="content text-warning Center">
		<h2 id="notification" class="mt-4">NOTIFICATIONS</h2>
		<br>
		<?php			
			$id=$_SESSION['memberID'];
			$result=mysqli_query($link,"SELECT message,notification_date,seen,member_id FROM notification INNER JOIN notify ON notify.notification_id=notification.notification_id WHERE member_id=$id");
			while($data=mysqli_fetch_array($result)){
				if($data[2]==0){
					printf("<div class='row RB'>
					<div class='col-sm-4'>%s</div>
					<div class='col-sm-4'>%s</div>
					<div class='col-sm-4'><a type='button' class='btn btn-dark text-warning BRB' href='setSeen.php'>set as seen</a></div>
					</div>",$data[0],$data[1]);
					}else{
					printf("<div class='row RB'>
					<div class='col-sm-4'>%s</div>
					<div class='col-sm-4'>%s</div>
					<div class='col-sm-4'>seen</div>
					</div>",$data[0],$data[1]);
				}
			}
		?>
		
	</div>
	<script>
		$(document).ready(function(){
			$("button").click(function(){
				<?php
					
				?>
			});
		});
	</script>
	<div class="bg-dark p-4">
		<address></address>
	</div>

</div>
<div class="content text-warning Center">
	<h2 id="notification" class="mt-4">NOTIFICATIONS</h2>
	<br>
	<?php			
	$id=$_SESSION['memberID'];
	$result=mysqli_query($link,"SELECT message,notification_date,seen,member_id,notify_id FROM notification INNER JOIN notify ON notify.notification_id=notification.notification_id WHERE member_id=$id");
	while($data=mysqli_fetch_array($result)){
		if($data['seen']==0){
			printf("<div class='row RB'>
				<div class='col-sm-4'>%s</div>
				<div class='col-sm-4'>%s</div>
				<div class='col-sm-4'><a type='button' class='btn btn-dark text-warning BRB' href='setSeen.php?nid=$data[4]'>set as seen</a></div>
				</div>",$data['message'],$data['notification_date']);
		}else{
			printf("<div class='row RB'>
				<div class='col-sm-4'>%s</div>
				<div class='col-sm-4'>%s</div>
				<div class='col-sm-4'>seen</div>
				</div>",$data[0],$data[1]);
		}
	}
	?>
	
</body>
</html>																																		