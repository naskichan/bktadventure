<?php
$room = $_POST['room'];
$imgpath = $_POST['imgpath'];
$minimap = "minimap_".$room.".PNG";

echo '<img src="'.$imgpath.$minimap.'" />';
?>