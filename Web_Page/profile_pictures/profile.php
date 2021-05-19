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
	<!--link for jqueryui custom-->
	<link rel="stylesheet" href="jquery/jquery-ui.min.css">
	<script src="jquery/external/jquery/jquery.js"></script>
	<script src="jquery/jquery-ui.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		h1 {
			font-family: 'Dancing Script', cursive;
		}
		body {
			font-family: 'Lato', sans-serif;
		}
	</style>
	<script type="text/javascript">
		function prof(){
			var someElement= document.getElementById("prof");
			someElement.className += " active";
		}
		function bal(){
			var someElement= document.getElementById("bal");
			someElement.className += " active";
		}
		function book(){
			var someElement= document.getElementById("book");
			someElement.className += " active";
		}
		function act(){
			var someElement= document.getElementById("act");
			someElement.className += " active";
		}
		function not(){
			var someElement= document.getElementById("not");
			someElement.className += " active";
		}
		function newNot(){
			var ele= document.getElementById("not");

		}
	</script>
</head>
<body class="bg-dark">
	<!--menu of the web page-->
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
						<a class="Center" id="prof" href="profile.php?account=prof" onclick="prof()">EDIT</a>
					</li>
					<li>
						<a class="Center" id="bal" onclick="bal()" href="profile.php?account=bal">BALANCE</a>
					</li>
					<li>
						<a class="Center" id="book" onclick="book()" href="profile.php?account=book">MY BOOKINGS</a>
					</li>
					<li>
						<a class="Center" id="act" onclick="act()" href="profile.php?account=act">ACTIVITY</a>
					</li>
					<li>
						<a class="Center" id="not" onclick="not()" href="profile.php?account=not">NOTIFICATIONS</a>
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
	<!--End of menu web page-->
	<!--Start of the web page-->
	<?php
	include("test_connect_db.php");
	$link=connectDataBase();			
	$id=$_SESSION['memberID'];
	$result=mysqli_query($link,"SELECT seen FROM notify WHERE member_id = $id");
	while($data=mysqli_fetch_array($result)){
		if($data['seen']==0){
			echo '<script type="text/javascript">',
     				'newNot();',
     			'</script>';
		}
	}
	/*switch to change the data displayed*/
	if(isset($_GET['account'])){
		$section=$_GET['account'];
		switch($section){
			/*Profile section*/
			case 'prof':
			echo '<script type="text/javascript">',
     				'prof();',
     			'</script>';
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
				/*SQL query to extract the information of the user*/
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
						<div class="row RB bg-dark">
							<?php
							printf("<div class='col-sm-7'>NAME:&nbsp;&nbsp; %s</div>",$data['name']);
							printf("<div class='col-sm-5'>SURNAME:&nbsp;&nbsp;%s</div>",$data[3]);
							?>
						</div>
						<div class="row RB bg-dark">
							<?php
							printf("<div class='col-sm-7'>E-MAIL:&nbsp;&nbsp;%s</div>",$data[1]);
							printf("<div class='col-sm-5'>BIRTH-DATE:&nbsp;&nbsp;%s</div>",$data[5]);
							?>
						</div>
						<div class="row RB bg-dark">
							<?php
							printf("<div class='col-sm-7'>CITY:&nbsp;&nbsp;%s</div>",$data[6]);
							printf("<div class='col-sm-5'>POST CODE:&nbsp;&nbsp;%d</div>",$data[7]);
							?>
						</div>
						<div class="row RB bg-dark">
							<?php
							printf("<div class='col-sm-7'>ADDRESS:&nbsp;&nbsp;%s</div>",$data[8]);
							printf("<div class='col-sm-5'>PHONE:&nbsp;&nbsp;%d</div>",$data[9]);
						}
						?>
					</div>

					<a class="BRB bg-dark text-warning mt-4 mb-4" href="profile.php?account=mod">MODIFY PROFILE</a>
				</div>	
				<?php
				break;

				/*modify section*/
				case 'mod':
				echo '<script type="text/javascript">',
     				'prof();',
     			'</script>';
				$result=mysqli_query($link,"select* from member where member_id=$id");
				$data=mysqli_fetch_array($result);
				/*Take data from the form and insert it in the member table of the database*/
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
					if($imagen!=null){
						$archivo= $_FILES['pic']['tmp_name'];
						$dir=$dir."/".$imagen;
						move_uploaded_file($archivo, $dir);

						$sql="UPDATE member SET name='$user', surname='$surname', email='$email', 
						birthdate='$birth', city='$city', address='$address',postcode='$post', 
						phone='$phone', picture='$dir' WHERE member_id=$id";
					}else{
						$sql="UPDATE member SET name='$user', surname='$surname', email='$email', 
						birthdate='$birth', city='$city', address='$address',postcode='$post', 
						phone='$phone' WHERE member_id=$id";
					}
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
							printf("<div class='col-sm-6'>BIRTH DATE: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id='datepicker' type='text' name='birth' value='%s'></div>",$data[5]);
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
						<input id="modify" class="text-dark bg-warning BRB"  type="submit" value="MODIFY DATA"><br>
						
					</div>
				</div>
			</form>
			<?php
			break;
			/*Display the balance data with the transactions from the user*/
			case 'bal':
			echo '<script type="text/javascript">',
     				'bal();',
     			'</script>';
			?>
			<div class="content text-warning Center">
				<h1 id="movement" class="mt-4">MY MOVEMENTS</h1>
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
				<div id="balance" class="row RBY">
					<div class="col-sm-4 Center">
						MY BALANCE:
					</div>
					<?php
					printf("<div class='col-sm-4 Center'>%d €</div>",$balance);
					?>
					<div id="trans" class="col-sm-4 Center"><a class="BRB bg-dark text-warning">transfer money</a></div>
				</div>
			</div>

			<!--Form that allows the user to transfer money to the account-->
			<div id="transfer" class="content text-warning Center" style="display:none">
				<h1 class="mt-4">TRANSFER</h1>
				<form id="transfer-form" class="form-group container Center" action="transfer.php" method="post">
					<div class="row RBY" style="text-align:center">
						<div class='col-sm-12'>
							DESCRIPTION:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' required="required" name='desc'>
						</div>
					</div>

					<div class="row RBY Center" style="text-align:center">
						<div class='col-sm-8'>
							CUANTITY:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text'required="required" name='import'>
						</div>
					</div>
					<input class="text-dark bg-warning BRB" type="submit" value="TRANSFER">
				</form>
				<?php
				if(isset($_GET['insert'])) {
					if($_GET['insert']=='yes'){
						printf("<div class='RBY Center'>Your transfer has been completed successfully</div>");
					} else {
						printf("<div class='RBY Center'>There was an error during your transfer</div>");

					}
				}
				?>
			</div>
			<?php
			break;
			/*Displays the information of the bookings from the user and lets him add a production to the booking*/
			case 'book':
			echo '<script type="text/javascript">',
     				'book();',
     			'</script>';
			?>
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
				<h2 id="production" class="mt-4">REGISTER PRODUCTION</h2>
				<form class="form-group container Center" action="produce.php" method="post">
					<div class="row RBY Center" style="text-align:center">
						<div class='col-sm-4 Center'>
							<b class='Center'>SELECT YOUR BOOKING:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
					<div class="row RBY Center">
						<div class='col-sm-6'>
							<b>KILOS:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='number'required="required" name='kilos' min="1">
						</div>
					</div>
					<div class="row RBY Center">
						<div class='col-sm-6'>
							<b class="Center">SELECT THE METALBIN:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
					<input class="text-dark bg-warning BRB" type="submit" value="REGISTER">
				</form>
				<?php
				if(isset($_GET['insert'])) {
					if($_GET['insert']=='yes'){
						printf("<div class='RBY Center'>You have registered your production successfully</div>");
					} else {
						printf("<div class='RBY Center'>There was an error during the registraction of the production</div>");

					}
				}
				?>
			</div>

			<?php
			break;
			/*Displays the activity of the user, refering to the productions made*/
			case 'act':
			echo '<script type="text/javascript">',
     				'act();',
     			'</script>';
			?>
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
								printf("<tr><td>%d</td><td>%d KG</td><td>%d €</td><td><a class='BRBY' type='button' href='setAvailable.php?productid=$data[0]'>END</a></tr>",$data[0],$data[1],$data[2]);
							}
						}


						?>
					</table>
				</div>
				<?php	
				break;
				/*Displays the notifications sent by the administrator to the user, and marks the ones unseen for him to check*/
				case 'not':
				echo '<script type="text/javascript">',
     				'not();',
     			'</script>';
				?>
				<div class="content text-warning Center">
					<h2 id="notification" class="mt-4">NOTIFICATIONS</h2>
					<br>
					<?php			
					$id=$_SESSION['memberID'];
					$result=mysqli_query($link,"SELECT message,notification_date,seen,member_id,notify_id FROM notification INNER JOIN notify ON notify.notification_id=notification.notification_id WHERE member_id=$id");
					while($data=mysqli_fetch_array($result)){
						if($data['seen']==0){
							printf("<div class='row RBY'>
								<div class='col-sm-4 Center'>%s</div>
								<div class='col-sm-4 Center'>%s</div>
								<div class='col-sm-4 Center'><a type='button' class='BRB bg-dark text-warning' href='setSeen.php?nid=$data[4]'>set as seen</a></div>
								</div>",$data['message'],$data['notification_date']);
						}else{
							printf("<div class='row RBY'>
								<div class='col-sm-4 Center'>%s</div>
								<div class='col-sm-4 Center'>%s</div>
								<div class='col-sm-4 Center'>seen</div>
								</div>",$data[0],$data[1]);
						}
					}
					?>

					<?php
					break;
				}
			}
			?>	
		</div>
		<div class="bg-dark p-4">
			<address></address>
		</div>
		<script>
			/*Function to change the calendar of the data input*/
			$(document).ready(function(){
				$("button").click(function(){
					<?php

					?>
				});
			});

			$( function() {
				$( "#datepicker" ).datepicker({
					changeMonth: true,
					changeYear: true
				});
			} );
		</script>
		<script>
			/*Function to show a confirm dialog when changing users data*/
			function confirmMod(){
			
			var dynamicDialog = $('<div title="Modify data?">'+
				'<p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>The data will be changed, are you sure?</p></div>');

			dynamicDialog.dialog({
				title : "Are you sure?",
				closeOnEscape: true,
				modal : true,

				buttons: {
					"Yes": function() {
						$( this ).dialog( "close" );
						$("#data")[0].submit();

					},
					"No": function() {
						$( this ).dialog( "close" );
					}
				}
			});

			return false;
		}
		$( document ).on("submit", "#data", confirmMod);
		</script>

				<script>
			/*Function to change the calendar of the data input*/
			$(document).ready(function(){
				$("button").click(function(){
					<?php

					?>
				});
			});

			$( function() {
				$( "#datepicker" ).datepicker({
					changeMonth: true,
					changeYear: true
				});
			} );
			</script>
			<script>
			/*Function to show a confirm dialog when changing users data*/
			function confirmTrans(){
			
			var dynamicDialog = $('<div title="Transfer money?">'+
				'<p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>The transaction will be made, are you sure?</p></div>');

			dynamicDialog.dialog({
				title : "Are you sure?",
				closeOnEscape: true,
				modal : true,

				buttons: {
					"Yes": function() {
						$( this ).dialog( "close" );
						$("#transfer-form")[0].submit();

					},
					"No": function() {

						$( this ).dialog( "close" );

					}
				}
			});

			return false;
		}
		$( document ).on("submit", "#transfer-form", confirmTrans);
		</script>

		<script>
		/*Function to show or hide the transfer form*/
		$('#trans').click(function(){
			$("#transfer").toggle();
		});
	</script>

</body>
</html>