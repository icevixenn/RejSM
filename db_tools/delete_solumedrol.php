<?php
/*
 * Zapytanie do bazy o usunięcie wpisu/ów badania MRI
 * Wykorzystane TRANSAKCJE - tworzona jest tablica zapytań do bazy
 */
session_start();
require_once './connectToDB.php';

$sm_remove= $_POST['sm_remove'];

$baza = connectToDB();
$stmt = $baza->prepare("DELETE FROM AT_SoluMedrol WHERE ID_SoluMedrol =?"); //preparing statement for removing a specified row
foreach($sm_remove as $ID_to_remove) {
	$stmt->bind_param("i", $ID_to_remove); //binding parameters
	if (!$stmt->bind_param("i", $ID_to_remove) || !$stmt->execute()) {	//check for binding errors
		$sql_error = true;
	}
	$mri_remove_query[] = "DELETE FROM AT_SoluMedrol WHERE ID_SoluMedrol = $ID_to_remove";
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
	header('Location: ../pages/treatment.php');
}

else if (!$baza){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/treatment.php');
}
?>
