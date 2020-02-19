<?php
/*
 * Zapytanie do bazy o usunięcie wpisu/ów testu Ambulation Index pacjenta
 * Wykorzystane TRANSAKCJE - tworzona jest tablica zapytań do bazy
 */

session_start();
require_once './connectToDB.php';

$ai_delete= $_POST['ai_delete'];

$baza = connectToDB();
$stmt = $baza->prepare("DELETE FROM AT_amb_indx WHERE ID_AI =?"); //preparing statement for removing a specified row
foreach($ai_delete as $ID_to_remove) {
	$stmt->bind_param("i", $ID_to_remove); //binding parameters
	if (!$stmt->bind_param("i", $ID_to_remove) || !$stmt->execute()) {	//check for binding errors
		$sql_error = true;
	}
	$ai_remove_query[] = "DELETE FROM AT_amb_indx WHERE ID_AI = $ID_to_remove";
}
$stmt->close();		//close variable
if($sql_error == true) {
	$baza->rollback();
}
else {
	$baza->commit();
}

if($baza){
	$_SESSION['data_changed'] = "Dane zostały zmienione.";
	header('Location: ../pages/amb_indx.php');
}

else if (!$baza){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/amb_indx.php');
}
?>
