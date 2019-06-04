<?php
require_once("dbconnect.php");
  session_start();
  if (!isset($_SESSION['Inv1'])) {
    $_SESSION['Inv1'] = 1;
  }
  if (!isset($_SESSION['Inv2'])) {
    $_SESSION['Inv2'] = 1;
  }
  if (!isset($_SESSION['Inv3'])) {
    $_SESSION['Inv3'] = 1;
  }
  if (!isset($_SESSION['Inv4'])) {
    $_SESSION['Inv4'] = 1;
  }
  if (!isset($_SESSION['Inv5'])) {
    $_SESSION['Inv5'] = 1;
  }
  $mode = $_POST["mode"];
  // $itemID = $_GET["itemID"];
  $itemID = 1;

  $inv1 = $_SESSION['Inv1'];
  $inv2 = $_SESSION['Inv2'];
  $inv3 = $_SESSION['Inv3'];
  $inv4 = $_SESSION['Inv4'];
  $inv5 = $_SESSION['Inv5'];

  $inventory = array(
    "Inv1" => $inv1,
    "Inv2" => $inv2,
    "Inv3" => $inv3,
    "Inv4" => $inv4,
    "Inv5" => $inv5
  );



  if($mode == "add") {
    if(in_array($itemID, $inventory)) {
    $key = array_search($itemID, $inventory);
    echo $itemID." alreay in ".$key;
    } else {
      $_SESSION["Inv1"] = $itemID;
    }


  }
  if($mode == "remove") {
    $key = array_search($itemID, $inventory);
    if($key != null) {
      $_SESSION[$key] = "leer";
      echo $key." leer gesetzt";
    }
  }
if($mode == "display") {
$query = mysqli_query($dbcon, "SELECT * FROM Items");
    while($row = mysqli_fetch_object($query)) {
    echo "<div class='InvDiv'><img class=invImg src='".$row->Image."'</img></div>";
    }
  }



?>
