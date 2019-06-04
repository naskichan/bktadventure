<?php
  $host = "gitsrv.marius-leonhardt.de";
  $user = "bkt_adventure";
  $pass = "Saftsack";
  $base = $user;
  $dbcon = mysqli_connect($host, $user, $pass, $base);
  if (!$dbcon) {
    die("Verbindungsfehler: ".mysqli_connect_error());
  }


?>
