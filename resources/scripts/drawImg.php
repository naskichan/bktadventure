<?php
$imgpath = $_POST['imgpath'];
$loc = $_POST['loc'];

echo '<img id="mainimg" src="'.$imgpath.$loc.'.png" usemap="#Map" onload="picloaded()">';
echo '<map name="Map" id="Map"></map>';
?>