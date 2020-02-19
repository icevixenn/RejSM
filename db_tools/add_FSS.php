<?php 
/*
 * Operacja dodania nowego testu FSS do danego pacjenta
 */
session_start();
require_once 'queryDB.php';

$id = $_POST['id']; // ID pobiera z ukrytego pola formularza
$date_add = $_POST['date_add'];
$result= $_POST['result'];

$query_add_FSS = "INSERT INTO AT_FSS (`ID`,`Date`,`Result`)
					VALUES ('$id', '$date_add', '$result')";
$result_add_FSS = queryDB($query_add_FSS);

if($result_add_FSS){
	$_SESSION['data_changed'] = "Dane zostały dodane.";
	header('Location: ../pages/BDI_FSS_MFIS.php');
}

else if (!$result_add_FSS){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/BDI_FSS_MFIS.php');
}

?>