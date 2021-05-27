<?php 
	//a php function that transforms the dates of the bookings table into json for the fullcalendar to interprete
	header('Content-Type: application/json');
	include('test_connect_db.php');
	$pdo = new PDO("mysql:dbname=erlete_db;host=localhost","root","dam1");
	$sentenciaSQL = $pdo->prepare("SELECT booking_id as id, entrydate as start, exitdate as end, name as title FROM booking INNER JOIN member ON booking.member_id = member.member_id");
	$sentenciaSQL->execute();

	$resultado= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($resultado);
 ?>
