<?php
/*
 * Zapytanie do bazy o usunięcie wpisu/ów testu T25FW pacjenta
 * Wykorzystane TRANSAKCJE - tworzona jest tablica zapytań do bazy
 */

session_start();
require_once './connectToDB.php';

$delete_T25FW = $_POST['delete_T25FW'];

$baza = connectToDB();
$stmt = $baza->prepare("DELETE FROM AT_MSFC_25FWT WHERE ID_25FWT =?");
foreach($delete_T25FW as $ID_to_remove) {
	$stmt->bind_param("i", $ID_to_remove);
	if (!$stmt->bind_param("i", $ID_to_remove) || !$stmt->execute()) {
		$sql_error = true;
	}
	$T25FW_remove_query[] = "DELETE FROM AT_MSFC_25FWT WHERE ID_25FWT = $ID_to_remove";
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
	header('Location: ../pages/MSFC.php');
}

else if (!$baza){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/MSFC.php');
}
?>
