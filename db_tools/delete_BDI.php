<?php
/*
 * Zapytanie do bazy o usunięcie wpisu/ów testu BDI pacjenta
 * Wykorzystane TRANSAKCJE - tworzona jest tablica zapytań do bazy
 */

session_start();
require_once './connectToDB.php';

$delete_BDI = $_POST['delete_BDI'];

$baza = connectToDB();
$stmt = $baza->prepare("DELETE FROM AT_BDI WHERE ID_BDI =?");
foreach($delete_BDI as $ID_to_remove) {
	$stmt->bind_param("i", $ID_to_remove);
	if (!$stmt->bind_param("i", $ID_to_remove) || !$stmt->execute()) {
		$sql_error = true;
	}
	$BDI_remove_query[] = "DELETE FROM AT_BDI WHERE ID_BDI = $ID_to_remove";
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
	header('Location: ../pages/BDI_FSS_MFIS.php');
}

else if (!$baza){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/BDI_FSS_MFIS.php');
}
?>
