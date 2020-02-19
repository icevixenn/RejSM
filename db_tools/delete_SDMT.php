<?php
/*
 * Zapytanie do bazy o usunięcie wpisu/ów testu SDMT pacjenta
 * Wykorzystane TRANSAKCJE - tworzona jest tablica zapytań do bazy
 */

session_start();
require_once './connectToDB.php';

$delete_SDMT = $_POST['delete_SDMT'];

$baza = connectToDB();
$stmt = $baza->prepare("DELETE FROM AT_SDMT WHERE ID_SDMT =?");
foreach($delete_SDMT as $ID_to_remove) {
	$stmt->bind_param("i", $ID_to_remove);
	if (!$stmt->bind_param("i", $ID_to_remove) || !$stmt->execute()) {
		$sql_error = true;
	}
	$SDMT_remove_query[] = "DELETE FROM AT_SDMT WHERE ID_SDMT = $ID_to_remove";
}
$stmt->close();
if($sql_error == true) {
	$baza->rollback();
}
else {
	$baza->commit();
}

if($baza){
	$_SESSION['data_changed'] = "Wpis został usunięty.";
	header('Location: ../pages/VFT_SDMT.php');
}

else if (!$baza){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/VFT_SDMT.php');
}
?>
