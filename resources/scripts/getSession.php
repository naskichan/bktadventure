<?php
session_start();
$mode = $_GET['mode'];
if($mode == "loc") {
    if (!isset($_SESSION['Location'])) {
        $_SESSION['Location'] = "HO000";
    }
    echo $_SESSION['Location'];
}
?>