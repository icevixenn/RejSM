<?php
/*
 * Zapytanie do bazy o usunięcie wpisu/ów badania MRI
 * Wykorzystane TRANSAKCJE - tworzona jest tablica zapytań do bazy
 */

session_start();
require_once './connectToDB.php';

$MRI_date_remove= $_POST['MRI_date_remove'];

$baza = connectToDB();
$stmt = $baza->prepare("DELETE FROM AT_MRI WHERE ID_MRI =?"); //preparing statement for removing a specified row
foreach($MRI_date_remove as $ID_to_remove) {
	$stmt->bind_param("i", $ID_to_remove); //binding parameters
	if (!$stmt->bind_param("i", $ID_to_remove) || !$stmt->execute()) {	//check for binding errors
		$sql_error = true;
	}
	$mri_remove_query[] = "DELETE FROM AT_MRI WHERE ID_MRI = $ID_to_remove";
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
	header('Location: ../pages/diagnostics.php');
}

else if (!$baza){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/diagnostics.php');
}
?>
