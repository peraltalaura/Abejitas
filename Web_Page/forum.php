<!DOCTYPE html>
<html>
	<head>
		
		<title>Forum</title>
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
				<a class="Center active" href="">FORUM</a>
			</li>
			<?php
				session_start();
				if(isset($_SESSION['memberID'])){
				?>
				<li>
					<a class="Center" href="bookings.php">BOOKINGS</a>
				</li>
				<?php
					} else {
				?>
				<li>
					<a class="Center" href="login.php">BOOKINGS</a>
				</li>
				<?php
				}
			?>
			<?php
				if(isset($_SESSION['memberID'])){
				?>
				<li>
					<a class="Center" href="profile.php?account=prof">MY ACCOUNT</a>
				</li>
				<?php
					} else {
				?>
				<li>
					<a class="Center" href="login.php">MY ACCOUNT</a>
				</li>
				<?php
				}
			?>
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
		<div class="content Center text-warning">
			<h2 style="margin-top:7%">LATEST DISCUSSIONS</h2>

			<?php			
			include("test_connect_db.php");
			$link=connectDataBase();
			$result=mysqli_query($link,"SELECT comment.*, member.* from comment INNER JOIN member ON member.member_id = comment.member_id");

			?>
					<?php
						while($data=mysqli_fetch_array($result)){
							printf("<div class='row RBY'>
										<div class='col-sm-2 Center'><img style='width:40px;'src='%s'></div>
										<div class='col-sm-2 Center'>%s</div>
										<div class='col-sm-2 Center'>%s</div>
										<div class='col-sm-4 Center'>%s</div>
									</div>
									<div class='row RB'>
										<div class='col-md-12'>%s</div>
									</div>",$data[14],$data['name'],$data['surname'],$data['comment_date'],$data['message']);
							}
					?>


			<?php
			if(isset($_SESSION['memberID'])){
			?>
			<h2>WRITE YOUR COMMENT:</h2>
			<form action="send_comment.php" method="post">
				<div class="row">
					<textarea maxlength="255" class="rounded-0" class="Center" rows="10" required="required" name='txt'></textarea>
				</div>
				<input type="submit">
			</form>
			<?php
			}else{
				?>
				<?php
				printf("<br><a class='BRBY' href='login.php'>Login to comment</a>")
				?>
			<?php
			}
			?>
			
		</div>
		<div class="bg-dark p-4">
			<address></address>
		</div>
	</body>
</html>										