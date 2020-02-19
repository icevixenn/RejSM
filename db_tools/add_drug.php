<?php 
/*
 * Operacja dodania nowego zażywanego leku przez pacjenta.
 */
session_start();
require_once 'queryDB.php';

$id = $_POST['id']; // ID pobiera z ukrytego pola formularza
$add_drug = $_POST['add_drug'];
$date_from_add = $_POST['date_from_add'];
$date_to_add = $_POST['date_to_add'];

$query_add_drug = "INSERT INTO AT_drug_intake (`ID`,`ID_name_drug`,`date_from`,`date_to`) 
					VALUES ('$id','$add_drug','$date_from_add','$date_to_add')";

$result_add_drug = queryDB($query_add_drug);

if($result_add_drug){
	$_SESSION['data_changed'] = "Dane zostały zmienione.";
	header('Location: ../pages/treatment.php');
}

else if (!$result_add_drug){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/treatment.php');
}

?>