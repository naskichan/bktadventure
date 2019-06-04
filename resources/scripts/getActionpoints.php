<?php
	
	$var = $_GET['Roomname'];
	
	require_once ("dbconnect.php");

	$sql = "SELECT * FROM ActionPoints, Rooms Where ActionPoints.FK_ID_Rooms = '$var' AND ActionPoints.FK_ID_Rooms=Rooms.ID";
 
	$abfrage = mysqli_query($dbcon, $sql);
	
	if ( ! $abfrage ){
		
		die('Ungültige Abfrage: ' . mysqli_error());
	}
	
	$counterVar = 1;
	 
	 while ($zeile = mysqli_fetch_array($abfrage))
	{
		
	echo $zeile['Coord1X'].','; 
	echo $zeile['Coord1Y'].',';
	echo $zeile['Coord2X'].',';
	echo $zeile['Coord2Y'].',';
	echo $zeile['Coord3X'].',';
	echo $zeile['Coord3Y'].',';
	echo $zeile['Coord4X'].',';
	echo $zeile['Coord4Y'].',';
	echo $zeile['Destination'].';';
	
	}
	
	



?>