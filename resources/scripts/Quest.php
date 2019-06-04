<?php

	//http://localhost/BKTGame/bkt/resources/scripts/Quest.php?RoomnameQuest=loc
	$var = $_POST['RoomnameQuest'];
    //$qid = $_POST['QuestId'];
	$qid = 1;
	require_once ("dbconnect.php");
    $stm = "SET NAMES utf8";
	$sql = "SELECT Texts.Text AS Text, Quests.QuestName AS QuestName FROM Texts, Quests Where Texts.FK_Quests_ID = Quests.ID AND Texts.FK_Rooms_ID = '$var' AND Texts.FK_Quests_ID = $qid ";
	mysqli_query($dbcon, $stm);
	$abfrage = mysqli_query($dbcon, $sql);
	if ( ! $abfrage ){
		die('Ungültige Abfrage: ' . mysqli_error());
	}
	 while ($zeile = mysqli_fetch_object($abfrage))
	{
	echo '<div id="qname"> '.$zeile->QuestName.'</div>';
	echo $zeile->Text;
	}



?>