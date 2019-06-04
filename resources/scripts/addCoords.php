<?php
$cd1x = $_GET['cd1x'];
$cd1y = $_GET['cd1y'];
$cd2x = $_GET['cd2x'];
$cd2y = $_GET['cd2y'];
$cd3x = $_GET['cd3x'];
$cd3y = $_GET['cd3y'];
$cd4x = $_GET['cd4x'];
$cd4y = $_GET['cd4y'];
$refroom = $_GET['refroom'];
$des = $_GET['des'];
$typeid = $_GET['typeid'];
require_once("dbconnect.php");
$sql = "INSERT INTO `ActionPoints`(`ID`, `FK_ID_Rooms`, `Coord1X`, `Coord1Y`, `Coord2X`, `Coord2Y`, `Coord3X`, `Coord3Y`, `Coord4X`, `Coord4Y`, `Destination`, `FK_ID_Type`) VALUES (NULL,'$refroom','$cd1x','$cd1y','$cd2x','$cd2y','$cd3x','$cd3y','$cd4x','$cd4y','$des','$typeid')";
echo $sql;
mysqli_query($dbcon, $sql);
?>