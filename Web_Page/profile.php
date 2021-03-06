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
	h1,h2 {
		font-family: 'Dancing Script', cursive;
	}
	body {
		font-family: 'Lato', sans-serif;
	}

</style>

</head>
<body>
	<h1 class="Center erlete">ERLETE</h1>
	<!--menu of the web page that is explaned in the other pages of the web page-->
	<ul class="sidenav">
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
		if(isset($_SESSION['memberID'])){
			?>
			<!-- the account nav displays the links for the different information and actions allowed to the user in his progile-->
			<!-- it leads the user to the profile information part of this web site-->
			<li>
				<a class="Center accountnav" id="prof" href="profile.php?account=prof" onclick="prof()">EDIT</a>
			</li>
			<li>
				<!-- it leads the user to the part of this web site that shows the payments done and the accounts balance-->
				<a class="Center accountnav" id="bal" onclick="bal()" href="profile.php?account=bal">BALANCE</a>
			</li>
			<li>
				<!-- it leads the user to the information about the bookings, productions and allows him to register a production-->
				<a class="Center accountnav" id="book" onclick="book()" href="profile.php?account=book">MY BOOKINGS</a>
			</li>
			<li>
				<!-- it leads the user to the notifications part of this web site, where the messages sent by the administrator can be seen-->
				<a class="Center accountnav" id="not" onclick="not()" href="profile.php?account=not">NOTIFICATIONS</a>
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
						<div class="content Center addMargin">
							<!-- if the variable login exists it prints the message-->
							<?php
							if(isset($_GET["login"])){
								printf("<div id='loginDialog' title='Login successfull'><p>You have logged in successfully, Wellcome!</p></div>");
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
							<h1>My profile</h1>
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
									<div class="columns">
										<div class="RB">
											<?php
											printf("<img src='%s'>",$data['picture']);
											?>
										</div>
										<div class="RB" style="text-align: justify;">
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
							?>
							<!-- The form which shows the current data from the user and allows to make changes on it to then send it to the same page with the account = mod variable to change the php switch and modify variable-->
							<form id="data" class="form-group" action="modify.php" method="post" enctype="multipart/form-data">
								<div class="content Center addMargin">
									<h1>Edit your profile</h1>
									<div class="Center modify RB">
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
										printf("<label>POST CODE: <br><input type='number' name='post' value='%d'></label><br>",$data[7]);
										?>

										<?php
										printf("<label>ADDRESS: <br><input type='text' name='address' value='%s'></label><br>",$data[8]);
										printf("<label>PHONE:</label><input type='tel' pattern='[0-9]{9}' name='phone' value='%d' required><br>",$data[9]);
										?>
										<label>PASSWORD: <br><input type="password" name="cpass"></label><br>
									</div>
									<div class="Center">
										<input id="modify" class="BRB"  type="submit" value="MODIFY DATA">
									</div>
									
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
						<div class="content Center addMargin">
							<h1 id="movement">My movements</h1>
							<br>
							<!-- php code that makes a query to extract the payments done or assosiated with the current member and display them in a table-->
							<?php			
							$id=$_SESSION['memberID'];
							$result=mysqli_query($link,"SELECT* from payment where member_id=$id");
							?>
							<div class="table-responsive">
								<table class="table Center text-black">
									<tr style='background-color: rgb(255, 255, 255,0.6);'>
										<th>ID</th>
										<th>DESCRIPTION</th>
										<th>DATE</th>
										<th>TOTAL</th>
									</tr>
									<?php
									$balance=0;
									while($data=mysqli_fetch_array($result)){
										if ($data["total"]<0) {
												printf("<tr style='background-color: rgb(179, 0, 0,0.5);color:white' ><td>%d</td><td>%s</td><td>%s</td><td>%d ???</td></tr>",$data[0],$data[1],$data[3],$data[2]);
										$balance=$balance+$data[2];
										}else{
										printf("<tr style='background-color: rgb(255, 255, 255,0.6);' ><td>%d</td><td>%s</td><td>%s</td><td>%d ???</td></tr>",$data[0],$data[1],$data[3],$data[2]);
										$balance=$balance+$data[2];
									}
									}
									?>
								</table>
							</div>
							<!-- a div that shows the total balance of the account of the member and shows/hides the transaction form when the transfer money link is clicked-->
							<h1>Your account balance</h1>
							<div id="balance" class="RB Center" style="width: 75%;margin: auto;">
								<?php
								if ($balance<0) {
									printf("<h2 style='color:red'> %d ???</h2>",$balance);
								}else {
									printf("<h2> %d ???</h2>",$balance);
								}
								
								?>
							</div>
							<br>
							<a id="trans" class="BRB">transfer money</a>
						</div>

						<!--Form that allows the user to transfer money to the account-->
						<div id="transfer" class="content Center addMargin" style="display:none">
							<h1>Transfer</h1>
							<!-- form to transfer money which asks the member for a description and cuantity-->
							<form id="transfer-form" class="form-group container Center" action="transfer.php" method="post">
								<div class="columns Center" style="text-align:center">
									<div class='RB'>
										<label for='desc'>DESCRIPTION:<br> <input type='text' required="required" name='desc' autocomplete="off"></label>
									</div>
									<div class='RB'>
										<label>CUANTITY:<br> <input type='text'required="required" name='import' min="1" pattern="^[0-9]+" autocomplete="off"></label>
									</div>
									<div class='RB'>
										<label>PASSWORD: <br><input type="password" name="bcpass"></label>
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
						if(isset($_GET['wrongpass'])) {
							printf("<div id='transferDialog' title='Transfer'><p>The password is wrong</p></div>");
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
					<div class="content Center addMargin">
						<h1 id="bookings">My bookings</h1>
						<br>
						<!-- php code that makes an SQL query to extract the bookings of the member signed in-->
						<?php			
						$id=$_SESSION['memberID'];
						$result=mysqli_query($link,"SELECT* from booking where member_id=$id");
						
						?>
						<!-- Titles from the bookings table-->
						<div class="rows">
							<div class="row"><b>ID</b></div>
							<div class="row"><b>ENTRY</b></div>
							<div class="row"><b>EXIT</b></div>
							<div class="row"><b>KILOS</b></div>
							<div class="row"><b>TOTAL</b></div>
							<div class="row"><b>STATUS</b></div>
						</div>

						<?php
						while($data=mysqli_fetch_array($result)){
							/* information about each booking made by the member*/
							//if the 
							if($data["kilos"]==0){
								printf("
									<div class='rows'>
									<div class='row'>%d</div>
									<div class='row'>%s</div>
									<div class='row'>%s</div>
									<div class='row'>%d KG</div>
									<div class='row'>%d ???</div>
									<div class='row'><a type='button' class='BRB' href='cancel_booking.php?bid=$data[0]'>Cancel booking</a></div>
									</div>",$data[0],$data[1],$data[2],$data[3],$data[4]);
							}else if ($data["exitdate"]<date("yy-mm-dd")){
								printf("
									<div class='rows'>
									<div class='row'>%d</div>
									<div class='row'>%s</div>
									<div class='row'>%s</div>
									<div class='row'>%d KG</div>
									<div class='row'>%d ???</div>
									<div class='row'>Finished</div>
									</div>",$data[0],$data[1],$data[2],$data[3],$data[4]);
							} else {
									printf("
									<div class='rows'>
									<div class='row'>%d</div>
									<div class='row'>%s</div>
									<div class='row'>%s</div>
									<div class='row'>%d KG</div>
									<div class='row'>%d ???</div>
									<div class='row'>Producing</div>
									</div>",$data[0],$data[1],$data[2],$data[3],$data[4]);
							}
							/* Titles of the productions table*/
							printf("
								<div class='rows production' style='background-color:rgb(255,255,255,0.5);color:black'>
								<div class='row'>METALBIN</div>
								<div class='row'>DATE/TIME</div>
								<div class='row'>KILOS</div>
								<div class='row'>TOTAL</div>
								<div class='row'>STATUS</div>
								</div>
								");
							$result2=mysqli_query($link,"SELECT * FROM production 
								WHERE booking_id=(SELECT booking_id FROM booking 
								WHERE booking_id=$data[0])");
							
							while($data2=mysqli_fetch_array($result2)){
								/* information about the productions of the booking above*/
								if ($data2['metalbin_id']!=NULL) {			
									printf("
										<div class='rows production' style='background-color:rgb(255,255,255,0.5);color:black'>
										<div class='row'>%d</div>
										<div class='row'>%s</div>
										<div class='row'>%d KG</div>
										<div class='row'>%d ???</div>
										",$data2[1],$data2[4],$data2[2],$data2[3]);
									/*Select the availability of the metalbin of the production*/
									$availability="SELECT available FROM metalbin WHERE metalbin_id=$data2[1]";
									$result3=mysqli_query($link,$availability);
									$data3=mysqli_fetch_array($result3);
									/* if the production is finished*/
									if($data2["finished"]==1){
										printf("<div class='row'>Finished</div>
											</div>");
										/* if the metalbin is still in use and the production going on*/
									} else {
										printf("<div class='row'><a type='button' 
											class='BRB' href='setAvailable.php?productid=$data2[0]'>END</a></div>
											</div>");
									}
								} else {
									printf("
										<div class='rows production' style='background-color:rgb(255,255,255,0.5);color:black'>
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

						<?php
				if (isset($_GET["delete"])) {
					if ($_GET["delete"]=="yes") {
						printf("<div id='cancelDialog' title='Booking canceled'><p>Your booking has been canceled successfully</p></div>");
					} else {
						printf("<div id='cancelDialog' title='Cancel unavailable'><p>You can't cancel an ongoing booking</p></div>");
					}
				}
			?>
						<a id='produce' class='Center BRB production'>REGISTER PRODUCTION</a>


						<!-- a form to slect the booking and make a production related to it, once submit it will redirect the user to the produce.php -->
						<form id="production" class="form-group container Center" action="produce.php" method="post" style="display:none">
							<h1 class="mt-4">Register a production</h1>
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
								<div class="RB Center">
									<b>KILOS:</b><br><input type='number'required="required" name='kilos' min="1" pattern="^[0-9]+">
								</div>
								<div class="RB">
									<b class="Center">SELECT THE METALBIN:</b><br>
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
						if(isset($_GET['capacity'])){
							printf("<div id='productionDialog' title='Capacity exceeded'><p>The metalbil selected is too small for the amount produced</p></div>");
						}
						if (isset($_GET['date'])) {
							printf("<div id='productionDialog' title='Production not available'><p>The extractor production dates have not started yet or have already finished</p></div>");
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
					<div class="content Center addMargin">
						<h1 id="notification">Notifications</h1>
						<br>
						<!-- a php code that selects the notifications related to the user and shows them, if there are unseen it prints them with a clickable button-->
						<?php			
						$id=$_SESSION['memberID'];
						$result=mysqli_query($link,"SELECT message,notification_date,seen,member_id,notify_id FROM notification INNER JOIN notify ON notify.notification_id=notification.notification_id WHERE member_id=$id");
						while($data=mysqli_fetch_array($result)){
							if($data['seen']==0){
								printf("<div class='rows RB' style='width:50em'>
									<div class='row pl-4'>%s</div>
									<div class='row pl-4'>%s</div>
									<div class='row'><a type='button' class='BRB' href='setSeen.php?nid=$data[4]'>set as seen</a></div>
									</div>",$data['message'],$data['notification_date']);
							}else{
								printf("<div class='rows RB' style='width:50em'>
									<div class='row pl-4'>%s</div>
									<div class='row pl-4'>%s</div>
									<div class='row'>seen</div>

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
					/*Function to show or hide the sidenav when the mouse is clicked*/
					$('.erlete').click(function(){
						$(".sidenav").toggle("900");
						$(".erlete").toggleClass("fullW",500);
						$(".content").toggleClass("addMargin",500);
					});
				</script>
				<script>
					/*function that shows the dialog assosiated with that id */
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
				<script>
					$( function() {
						$( "#loginDialog" ).dialog();
					} );

				</script>
					<script>
					$( function() {
						$( "#cancelDialog" ).dialog();
					} );

				</script>
			</body>
			</html>
