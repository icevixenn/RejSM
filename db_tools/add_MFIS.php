<?php 
/*
 * Operacja dodania nowego testu MFIS do danego pacjenta
 */
session_start();
require_once 'queryDB.php';

$id = $_POST['id']; // ID pobiera z ukrytego pola formularza
$date_add = $_POST['date_add'];
$physical = $_POST['physical'];
$cognitive = $_POST['cognitive'];
$social = $_POST['social'];
$MFIS_result = $physical + $cognitive + $social;

$query_add_MFIS = "INSERT INTO AT_MFIS (`ID`,`date`,`physical`,`cognitive`,`social`,`result`)
					VALUES ('$id','$date_add','$physical','$cognitive','$social','$MFIS_result')";
$result_add_MFIS = queryDB($query_add_MFIS);

if($result_add_MFIS){
	$_SESSION['data_changed'] = "Dane zostały dodane.";
	header('Location: ../pages/BDI_FSS_MFIS.php');
}

else if (!$result_add_MFIS){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/BDI_FSS_MFIS.php');
}

?>
