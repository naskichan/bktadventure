<?php
$loc = $_GET['loc'];
require_once('dbconnect.php');
  $query = "SELECT Filename,Description FROM Rooms WHERE ID = '$loc'";
  $mysql = mysqli_query($dbcon, $query);
  while ($_data = mysqli_fetch_object($mysql)) {
    echo $_data->Description.";".$_data->Filename;
  }
?>
