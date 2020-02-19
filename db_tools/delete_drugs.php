<?php 
/*
 * Operecja usunięcia zaznaczonych leków zażywanych przez pacjenta
 * Wykorzystane TRANSAKCJE - tworzona jest tablica zapytań do bazy
 */
session_start();
require_once './connectToDB.php';

$drug_remove= $_POST['drug_remove'];

$baza = connectToDB();
$stmt = $baza->prepare("DELETE FROM AT_drug_intake WHERE ID_drug_intake =?");

foreach($drug_remove as $ID_to_remove) {
	$stmt->bind_param("i", $ID_to_remove);
	if (!$stmt->bind_param("i", $ID_to_remove) || !$stmt->execute()) {
		$sql_error = true;
	}
	$mri_remove_query[] = "DELETE FROM AT_drug_intake WHERE ID_drug_intake = $ID_to_remove";
}
$stmt->close();
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
