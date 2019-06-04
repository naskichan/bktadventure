<?php
$arr = $_POST['arr'];
$fac = $_POST['fac'];
foreach($arr as $element) {
    $elem = explode(",", $element);
    echo '<area class="areas" shape="poly" href="#" coords="'.floor($elem[0]/$fac).','.floor($elem[1]/$fac).','.floor($elem[2]/$fac).','.floor($elem[3]/$fac).','.floor($elem[4]/$fac).','.floor($elem[5]/$fac).','.floor($elem[6]/$fac).','.floor($elem[7]/$fac).'" onclick=mapClicked("'.$elem[8].'")>';
}
?>