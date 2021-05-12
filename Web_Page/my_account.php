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
			<li>
				<a class="Center" href="info.php">INFORMATION</a>
			</li>
			<li>
				<a class="Center" href="forum.php">FORUM</a>
			</li>
			<li>
				<a class="Center" href="bookings.php">BOOKINGS</a>
			</li>
			<li>
				<a class="Center active" href="">MY ACCOUNT</a>
				<?php
					session_start();
					if(isset($_SESSION['memberID'])){
					?>
					<ul id="accountNav">
						<li>
							<a id="edit" class="Center active" href="" >EDIT</a>
						</li>
						<li>
							<a id="bal" class="Center" href="">BALANCE</a>
						</li>
						<li>
							<a id="trans" class="Center" href="">TRANSACTION</a>
						</li>
						<li>
							<a id="book" class="Center" href="">BOOKINGS</a>
						</li>
						<li>
							<a id="act" class="Center" href="">ACTIVITY</a>
						</li>
						<li>
							<a id="not" class="Center" href="">NOTIFICATIONS</a>
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
			$result=mysqli_query($link,"select* from member where member_id=$id");
			$data=mysqli_fetch_array($result);
			
		?>
		
		
		<form class="form-group" action="update_data.php" method="post">
			<div class="content text-warning Center">
				<h2 class="mt-4">MY PROFILE</h2>
				<div class="row RB">
					<div class="col-sm-2">
						NAME:
					</div>
					<?php
						printf("<div class='col-sm-3'><input type='text' name='uname' value='%s'></div>",$data[2]);
					?>
					<div class="col-sm-2">
						SURNAME:
					</div>
					<?php
						printf("<div class='col-sm-3'><input type='text' name='usurname' value='%s'></div>",$data[3]);
					?>
				</div>
				<div class="row RB">
					<div class="col-sm-2">
						E-MAIL:
					</div>
					<?php
						printf("<div class='col-sm-3'><input type='email' name='mail' value='%s'></div>",$data[1]);
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
						printf("<div class='col-sm-3'><input type='text' name='city' value='%s'></div>",$data[6]);
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
						printf("<div class='col-sm-2'><input type='tel' name='phone' value='%d'></div>",$data[9]);
					?>
				</div>
				<input class="text-dark bg-warning" type="submit" value="MODIFY DATA">
			</div>
		</form>
		
		<div class="content text-warning Center">
			<h2 class="mt-4">MY MOVEMENTS</h2>
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
						while($data=mysqli_fetch_array($result)){
							printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%d</td></tr>",$data[0],$data[1],$data[3],$data[2]);
						}
					?>
				</table>
			</div>
		</div>
		
		
		<div class="content text-warning Center">
			<h2 class="mt-4">TRANSFER</h2>
			<form class="form-group" action="transfer.php" method="post">
				<div class="row RB">
					<div class="col-sm-5">
						DESCRIPTION:
					</div>
					<div class='col-sm-7'>
						<input type='text' name='desc'>
					</div>
				</div>
				<div class="row RB">
					<div class="col-sm-4">
						DATE:
					</div>
					<div class='col-sm-8'>
						<input type='datetime-local' name='date'>
					</div>
				</div>
				<div class="row RB">
					<div class="col-sm-4">
						CUANTITY:
					</div>
					<div class='col-sm-8'>
						<input type='text' name='import'>
					</div>
				</div>
				<input class="text-dark bg-warning" type="submit" value="TRANSFER">
			</form>
		</div>
		
		<div class="content text-warning Center">
			<h2 class="mt-4">MY BOOKINGS</h2>
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
							printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%d KG</td><td>%d €</td></tr>",$data[0],$data[1],$data[2],$data[3],$data[4]);
						}
					?>
				</table>
			</div>
		</div>
	</div>
	<div class="bg-dark p-4">
		<address></address>
	</div>
	
	</body>
</html>																								