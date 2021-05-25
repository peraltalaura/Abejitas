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
	<Link rel="stylesheet" href="css/index_CSS.css">
	<!--link for jqueryui custom-->
	<link rel="stylesheet" href="jquery/jquery-ui.min.css">
	<script src="jquery/external/jquery/jquery.js"></script>
	<script src="jquery/jquery-ui.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- A javascript function that adds the class active if the element with that id has been clicked-->
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
		function notSeen(){
			var someElement= document.getElementById("not");
			someElement.innerHTML= "<img src='images/dot.png' style='border-radius:50vh;'>&nbsp&nbsp&nbsp NOTIFICATIONS";
		}
	</script>
	<style>
		h1 {
			font-family: 'Dancing Script', cursive;
		}
		body {
			font-family: 'Lato', sans-serif;
		}
	</style>

</head>
<body>
	<!--menu of the web page that is explaned in the other pages of the web page-->
	<ul class="sidenav">
		<li>
			<h1 class="Center">ERLETE</h1>
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
		<li>
			<a class="Center" href="">MY ACCOUNT</a>
			<?php
			if(isset($_SESSION['memberID'])){
				?>
				<!-- the account nav displays the links for the different information and actions allowed to the user in his progile-->
				<ul id="accountNav">
					<li>
						<!-- it leads the user to the profile information part of this web site-->
						<a class="Center" id="prof" href="profile.php?account=prof" onclick="prof()">EDIT</a>
					</li>
					<li>
						<!-- it leads the user to the part of this web site that shows the payments done and the accounts balance-->
						<a class="Center" id="bal" onclick="bal()" href="profile.php?account=bal">BALANCE</a>
					</li>
					<li>
						<!-- it leads the user to the information about the bookings, productions and allows him to register a production-->
						<a class="Center" id="book" onclick="book()" href="profile.php?account=book">MY BOOKINGS</a>
					</li>
					<li>
						<!-- it leads the user to the notifications part of this web site, where the messages sent by the administrator can be seen-->
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
	<!-- PHP code that makes a query of the notifications sent to the user and displays a dot if some of them are marked as unseen-->
	<?php
	include("test_connect_db.php");
	$link=connectDataBase();			
	$id=$_SESSION['memberID'];
	$result=mysqli_query($link,"SELECT seen from notify where member_id=$id");
	while($data=mysqli_fetch_array($result)){
		if($data['seen']!=1){
			echo '<script type="text/javascript">',
			'notSeen();',
			'</script>';
		}
	}

			/*
				php switch to change the data displayed
				this switch checks if the account variable exists, and changes cases to the value that has been passed
				1. case 'prof': --> goes to the information of the user
				2. case 'mod': --> goes to the modify information section of the profile page
				3. case 'bal': --> goes to the balance section
				4. case 'book': --> goes to the section of the bookings information
				5. case 'not': --> goes to the section that shows the administrators notifications
			*/
				if(isset($_GET['account'])){
					$section=$_GET['account'];
					switch($section){
						/*Profile section*/
						case 'prof':
						echo '<script type="text/javascript">',
						'prof();',
						'</script>';
						?>
						<div class="content Center">
							<!-- if the variable login exists it prints the message-->
							<?php
							if(isset($_GET["login"])){
								printf("<div class='container Center RB'>Login successfull, Wellcome!</div>");
								/* php code that makes a sql query to know if there are any unseen notifications, if there are, it shows a dialog*/
								$sql="SELECT * FROM notify WHERE member_id=$id";
								$result=mysqli_query($link,$sql);

								if (mysqli_num_rows ( $result )>0) {
									while($data=mysqli_fetch_array($result)){
										if ($data[4]==0) {
											printf("<div id='notificationDialog' title='Administration notification'><p>You have unchecked notifications</p></div>");
										}
									}
								}
							} 

							?>	
							<h1 class="mt-4">MY PROFILE</h1>
							<!--php code that checks if the update variable exists, if it does, a dialog displays:-->
							<?php
							if(isset($_GET['update'])){
								/*if the value of the variable update is yes it displays a confirmation message*/
								if($_GET['update']=='yes'){
									printf("<div id='modifyConfirmDialog' title='Profile change'><p>Your profile has been changed</p></div>");
									/* if the value of the variable is no it shows an error message*/
								} else if($_GET['update']=='no'){
									printf("<div id='modifyConfirmDialog' title='Profile change'><p>There was a problem updating your profile</p></div>");
								}
							}
							?>

							<?php
							/*php code that makes an SQL query to extract the information of the member logged in*/
							$result=mysqli_query($link,"select* from member where member_id=$id");

							while($data=mysqli_fetch_array($result)){
								?>
								<div id="profile" class="container Center">
									<div class="columns" style="align-items:center">
										<div class="column">
											<?php
											printf("<img src='%s' style='width:20em;border-radius:2em'>",$data['picture']);
											?>
										</div>
										<div class="RB column">
											<!-- PHP code that prints the data from the query in the specified format-->
											<?php
											printf("<p>NAME: %s</p>",$data['name']);
											printf("<p>SURNAME: %s</p>",$data[3]);
											printf("<p>MAIL: %s</p>",$data[1]);
											printf("<p >BIRTH-DATE: %s</p>",$data[5]);
											?>
											<?php
											printf("<p>CITY:&nbsp;&nbsp;%s</p>",$data[6]);
											printf("<p>POST:&nbsp;&nbsp;%d</p>",$data[7]);
											printf("<p>ADDRESS:&nbsp;&nbsp;%s</p>",$data[8]);
											printf("<p>PHONE:&nbsp;&nbsp;%d</p>",$data[9]);
											?>
										</div>
									</div>
									<!-- a link that makes the php switch show the modify profile parte-->
									<a class="BRB mt-4 mb-4" href="profile.php?account=mod">MODIFY PROFILE</a>
									<!-- a link that redirects the user to the change_password.php page-->
									<a class="BRB mt-4 mb-4" href="change_password.php">CHANGE PASSWORD</a>
								</div>	
								<?php
							}
							break;

							/*modify section*/
							case 'mod':
							echo '<script type="text/javascript">',
							'prof();',
							'</script>';
							$result=mysqli_query($link,"select* from member where member_id=$id");
							$data=mysqli_fetch_array($result);
							/*Take data from the form and insert it in the member table of the database if the modify variable is set*/
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
								$cpass=$_POST['cpass'];

								$dir="profile_pictures";
								$imagen=$_FILES['pic']['name'];
								$sql="SELECT password FROM member WHERE member_id=$id";
								$data=mysqli_fetch_array(mysqli_query($link,$sql));
								/* SQL query to insert the introduced information on the member table from the database if the password is correct*/
								if(password_verify($cpass, $data['password'])){
									/* if the user has uploaded an image it makes this insert with all the data*/
									if($imagen!=null){
										$archivo= $_FILES['pic']['tmp_name'];
										$dir=$dir."/".$imagen;
										move_uploaded_file($archivo, $dir);
										
										$sql="UPDATE member SET name='$user', surname='$surname', email='$email', 
										birthdate='$birth', city='$city', address='$address',postcode='$post', 
										phone='$phone', picture='$dir' WHERE member_id=$id";
										/* if there isn't a new image it does the insert only of the rest of the information*/
									}else{
										$sql="UPDATE member SET name='$user', surname='$surname', email='$email', 
										birthdate='$birth', city='$city', address='$address',postcode='$post', 
										phone='$phone' WHERE member_id=$id";
									}

									mysqli_query($link,$sql);
									/* if the query is correct it returs the user to the profile page sending the variable updated = yes*/
									if(mysqli_query($link,$sql)){
										$id=$_SESSION['memberID'];
										header("Location:profile.php?account=prof&update=yes");
										/* if the query has given an error it returs the user to the profile page sending the variable updated = no*/
									} else {
										header("Location:profile.php?account=prof&update=no");
									}
									/* if the pasword is wrong it returns the user to the profile page sending the variable updated = no*/
								}else{
									header("Location:profile.php?account=prof&update=no");
								}
							}	
							?>
							<div class="Center content">
								<!-- The form which shows the current data from the user and allows to make changes on it to then send it to the same page with the account = mod variable to change the php switch and modify variable-->
								<form id="data" class="form-group Center" action="profile.php?account=mod&modify" method="post" enctype="multipart/form-data">
									<h1 class="mt-4">EDIT PROFILE</h1>
									<div class="RB Center">

										<label>PROFILE PICTURE:</label> 
										<input type="file" name="pic"><br>
										<?php
										printf("<label>NAME:</label> <input type='text' name='uname' value='%s' required><br>",$data[2]);
										printf("<label>SURNAME:</label><input type='text' name='usurname' value='%s' required><br>",$data[3]);
										?>
										<?php
										printf("<label>E-MAIL:</label> <input type='email' name='mail' value='%s' required><br>",$data[1]);
										printf("<label>BIRTH DATE:</label> <input autocomplete='off'id='datepicker' type='text' name='birth' value='%s'><br>",$data[5]);
										?>

										<?php
										printf("<label>CITY:</label><input type='text' name='city' value='%s'><br>",$data[6]);
										printf("<label>POST CODE: </label><input type='number' name='post' value='%d'><br>",$data[7]);
										?>

										<?php
										printf("<label>ADDRESS: </label><input type='text' name='address' value='%s'><br>",$data[8]);
										printf("<label>PHONE:</label> <input type='tel' pattern='[0-9]{9}' name='phone' value='%d' required><br>",$data[9]);
										?>
									</div>
									<div class="RB Center">
										<label>PASSWORD:</label><br><input type="password" name="cpass"></label>
									</div>
									<input id="modify" class="BRB"  type="submit" value="MODIFY DATA">

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
						<div class="content Center">
							<h1 id="movement" class="mt-4">MY MOVEMENTS</h1>
							<br>
							<!-- php code that makes a query to extract the payments done or assosiated with the current member and display them in a table-->
							<?php			
							$id=$_SESSION['memberID'];
							$result=mysqli_query($link,"SELECT* from payment where member_id=$id");
							?>
							<div class="table-responsive">
								<table class="table Center text-light">
									<tr style='background-color: rgb(0, 0, 0,0.8);'>
										<th>PAYMENT ID</th>
										<th>DESCRIPTION</th>
										<th>DATE</th>
										<th>TOTAL</th>
									</tr>
									<?php
									$balance=0;
									while($data=mysqli_fetch_array($result)){
										printf("<tr style='background-color: rgb(0, 0, 0,0.8);'><td>%d</td><td>%s</td><td>%s</td><td>%d €</td></tr>",$data[0],$data[1],$data[3],$data[2]);
										$balance=$balance+$data[2];
									}
									?>
								</table>
							</div>
							<!-- a div that shows the total balance of the account of the member and shows/hides the transaction form when the transfer money link is clicked-->
							<div id="balance" class="columns RB pb-4">
								<div style='padding-left:1em;padding-right:1em'>
									<h2>MY BALANCE:</h2>
								</div>
								<?php
								printf("<div style='padding-left:1em;padding-right:1em'><h2> %d €</h2></div>",$balance);
								?>
								<div id="trans" style='padding-left:1em;padding-right:1em'><a class="BRB">transfer money</a>
								</div>
							</div>
						</div>

						<!--Form that allows the user to transfer money to the account-->
						<div id="transfer" class="content Center" style="display:none">
							<h1 class="mt-4">TRANSFER</h1>
							<!-- form to transfer money which asks the member for a description and cuantity-->
							<form id="transfer-form" class="form-group container Center" action="transfer.php" method="post">
								<div class="columns" style="text-align:center">
									<div class='RB'>
										<label for='desc'>DESCRIPTION: <input type='text' required="required" name='desc' autocomplete="off"></label>
									</div>
									<div class='RB'>
										<label>CUANTITY: <input type='text'required="required" name='import' min="1" autocomplete="off"></label>
									</div>
								</div>
								<input class="BRB" type="submit" value="TRANSFER">
							</form>
						</div>
						<!-- PHP code that checks if the insert variable exists-->
						<?php
						if(isset($_GET['insert'])) {
							/* If the value is yes it shows a confirm message dialog*/
							if($_GET['insert']=='yes'){
								printf("<div id='transferDialog' title='Transfer'><p>Your transfer has been completed successfully</p></div>");
								/* If the value is no it shows an error message dialog*/	
							} else {
								printf("<div id='transferDialog' title='Transfer'><p>There was an error during your transfer</p></div>");
								
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
					echo '<script type="text/javascript">',
					'act();',
					'</script>';
					?>
					<div class="content Center">
						<h1 id="bookings" class="mt-4">MY BOOKINGS</h1>
						<br>
						<!-- php code that makes an SQL query to extract the bookings of the member signed in-->
						<?php			
						$id=$_SESSION['memberID'];
						$result=mysqli_query($link,"SELECT* from booking where member_id=$id");
						
						?>
						<!-- Titles from the bookings table-->
						<h2 class="Center">BOOKINGS</h2>
						<div class="rows">
							<div class="row"><b>ID</b></div>
							<div class="row"><b>ENTRY</b></div>
							<div class="row"><b>EXIT</b></div>
							<div class="row"><b>KILOS</b></div>
							<div class="row"><b>TOTAL</b></div>
							<div class="row"><b></b></div>
						</div>

						<?php
						while($data=mysqli_fetch_array($result)){
							/* information about each booking made by the member*/
							if($data['total']==0){
								printf("
									<div class='rows'>
									<div class='row'>%d</div>
									<div class='row'>%s</div>
									<div class='row'>%s</div>
									<div class='row'>%d KG</div>
									<div class='row'>%d €</div>
									<div class='row'><a type='button' class='BRB' href='cancel_booking.php?bid=$data[0]'>Cancel booking</a></div>
									</div>",$data[0],$data[0],$data[1],$data[2],$data[3],$data[4]);
							}else{
								printf("
									<div class='rows' %d onClick=clickaction(this)>
									<div class='row'>%d</div>
									<div class='row'>%s</div>
									<div class='row'>%s</div>
									<div class='row'>%d KG</div>
									<div class='row'>%d €</div>
									<div class='row'>cancelling unavailable</div>
									</div>",$data[0],$data[0],$data[1],$data[2],$data[3],$data[4]);
							}
							/* Titles of the productions table*/
							printf("
								<h2 class='Center production'>PRODUCTIONS</h2>
								<div class='rows production'>
								<div class='row'>METALBIN</div>
								<div class='row'>DATE/TIME</div>
								<div class='row'>KILOS</div>
								<div class='row'>TOTAL</div>
								<div class='row'>FINISH</div>
								</div>
								");
							$result2=mysqli_query($link,"SELECT * FROM production 
								WHERE booking_id=(SELECT booking_id FROM booking 
								WHERE booking_id=$data[0])");
							
							while($data2=mysqli_fetch_array($result2)){
								/* information about the productions of the booking above*/
								if ($data2[1]!=NULL) {			
									printf("
										<div class='rows production'>
										<div class='row'>%d</div>
										<div class='row'>%s</div>
										<div class='row'>%d</div>
										<div class='row'>%d</div>
										",$data2[1],$data2[4],$data2[2],$data2[3]);
									/*Select the availability of the metalbin of the production*/
									$availability="SELECT available FROM metalbin WHERE metalbin_id=$data2[1]";
									$result3=mysqli_query($link,$availability);
									$data3=mysqli_fetch_array($result3);
									/* if the production is finished*/
									if($data3[0]==1){
										printf("<div class='row'>FINISHED</div>
											</div>");
										/* if the metalbin is still in use and the production going on*/
									} else {
										printf("<div class='row'><a type='button' 
											class='BRB' href='setAvailable.php?productid=$data2[0]'>END</a></div>
											</div>");
									}
								} else {
									printf("
										<div class='rows production'>
										<div class='row'>yours</div>
										<div class='row'>%s</div>
										<div class='row'>%d</div>
										<div class='row'>%d</div>
										<div class='row'></div></div>
										",$data2[4],$data2[2],$data2[3]);
								}
							}
							
						}
					
						?>
						<a id='produce' class='Center BRB production %d'>REGISTER PRODUCTION</a>

						<!-- a form to slect the booking and make a production related to it, once submit it will redirect the user to the produce.php -->
						<form id="production" class="form-group container Center" action="produce.php" method="post" style="display:none">
							<h2 class="mt-4">REGISTER PRODUCTION</h2>
							<div class="colums" style="text-align:center">
								<div class='RB'>
									<b>SELECT YOUR BOOKING:</b><br><br>
									<select class="custom-select" name="bookID">
										<!-- It makes an SQL query to extract the id of the bookings attached to the logged member and print them in the select-->
										<?php
										$result=mysqli_query($link,"SELECT booking_id from booking where member_id=$id");
										
										while($data=mysqli_fetch_array($result)){
											printf("<option>%d</option>",$data[0]);
										}
										?>
									</select>
								</div>
								<div class="RB">
									<b>KILOS:</b><br><br><input type='number'required="required" name='kilos' min="1">
								</div>
								<div class="RB">
									<b class="Center">SELECT THE METALBIN:</b>
									<!-- It makes an SQL query to extract the metalbins available to use and print them in the select-->
									<select class="custom-select" aria-label="Default select example" name='metalID'>
										<option>my own bin</option>
										<?php
										$result=mysqli_query($link,"SELECT metalbin_id, capacity from metalbin where available=1");
										
										while($data=mysqli_fetch_array($result)){
											printf("<option value='%d'>%d liter bin</option>",$data[0],$data[1]);
										}
										?>
									</select>
								</div>
							</div>


							<input class="BRB" type="submit" value="REGISTER">
						</form>
						<!-- php function that checks if the insert variable exists-->
						<?php
						if(isset($_GET['insert'])) {
							/* if the value of insert is yes it will show a confirm message dialog*/
							if($_GET['insert']=='yes'){
								printf("<div id='productionDialog' title='Register production'><p>Your productions has been registered successfully</p></div>");
								/* if the value of insert is no it will show an error message dialog*/
							} else {
								printf("<div id='productionDialog' title='Register production'><p>There was an error during the registration of the production</p></div>");
							}
						}
						?>
					</div>
					<?php	
					break;
					/*Displays the notifications sent by the administrator to the user, and marks the ones unseen for him to check*/
					case 'not':
					echo '<script type="text/javascript">',
					'not();',
					'</script>';
					?>
					<div class="content Center">
						<h2 id="notification" class="mt-4">NOTIFICATIONS</h2>
						<br>
						<!-- a php code that selects the notifications related to the user and shows them, if there are unseen it prints them with a clickable button-->
						<?php			
						$id=$_SESSION['memberID'];
						$result=mysqli_query($link,"SELECT message,notification_date,seen,member_id,notify_id FROM notification INNER JOIN notify ON notify.notification_id=notification.notification_id WHERE member_id=$id");
						while($data=mysqli_fetch_array($result)){
							if($data['seen']==0){
								printf("<div class='row RB'>
									<div class='col-sm-6 Center'>%s</div>
									<div class='col-sm-3 Center'>%s</div>
									<div class='col-sm-3 Center'><a type='button' class='BRB' href='setSeen.php?nid=$data[4]'>set as seen</a></div>
									</div>",$data['message'],$data['notification_date']);
							}else{
								printf("<div class='row RB'>
									<div class='col-sm-6 Center'>%s</div>
									<div class='col-sm-3 Center'>%s</div>
									<div class='col-sm-3 Center'>seen</div>

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
			<div class="p-4">
				<address></address>
			</div>
			<!-- a jquery function which displays a formatted calendar to pick the birth date in the modify information form-->
			<script>
				$.datepicker.regional[ "eng" ] = {
					closeText: "Done",
					prevText: "Prev",
					nextText: "Next",
					currentText: "Today",
					monthNames: [ "January","February","March","April","May","June",
					"July","August","September","October","November","December" ],
					monthNamesShort: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun",
					"Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ],
					dayNames: [ "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday" ],
					dayNamesShort: [ "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat" ],
					dayNamesMin: [ "Su","Mo","Tu","We","Th","Fr","Sa" ],
					weekHeader: "Wk",
					dateFormat: "yy-mm-dd",
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: false,
					maxDate: new Date(),
					yearSuffix: "" };

					$.datepicker.setDefaults($.datepicker.regional['eng']);

					$(function () {
						$("#datepicker").datepicker({
						yearRange: "-100:+0", // this is the option you're looking for
						maxDate:new Date(),
						changeMonth: true,
						changeYear: true
					});
					});
				</script>
				<script>
					/*Function to change the calendar of the data input*/
					$(document).ready(function(){
						$("button").click(function(){
							<?php
							
							?>
						});
					});
				</script>
				<script>
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
						<?php
						$result=mysqli_query($link,"SELECT password FROM member WHERE member_id=$id");
						$data=mysqli_fetch_array($result);
						?>
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
						$("#transfer").toggle("1000");
					});
				</script>

				<script>
					/*Function to show or hide the register production form*/
					$('#produce').click(function(){
						$("#production").toggle("1000");
					});
				</script>

				<script>
					/*function that shows the dialog assosiated withc that id */
					$( function() {
						$( "#modifyConfirmDialog" ).dialog();
					} );

				</script>
				<script>
					$( function() {
						$( "#transferDialog" ).dialog();
					} );

				</script>
				<script>
					$( function() {
						$( "#productionDialog" ).dialog();
					} );

				</script>
				<script>
					$( function() {
						$( "#notificationDialog" ).dialog();
					} );

				</script>
			</body>
			</html>
