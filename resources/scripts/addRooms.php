<?php
$id = $_POST['id'];
$filename = $_POST['filename'];
$dispname = $_POST['dispname'];
$minifilename = $_POST['minifilename'];
$desc = $_POST['desc'];
require_once("dbconnect.php");
$query = mysqli_query($dbcon, "INSERT INTO `Rooms`(`ID`, `Filename`, `Displayname`, `Minimap_Filename`, `Description`) VALUES ('$id','$filename','$dispname', '$minifilename', '$desc')");
echo "Added ID: $id, Filename: $filename, Displayname: $dispname, Minimap_Filename: $minifilename, Description: $desc to Database";
?>