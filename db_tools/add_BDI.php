<?php 
/*
 * Operacja dodania nowego testu BDI do danego pacjenta
 */
session_start();
require_once 'queryDB.php';

$id = $_POST['id']; // ID pobiera z ukrytego pola formularza
$date_add = $_POST['date_add'];
$result= $_POST['result'];

$query_add_BDI = "INSERT INTO AT_BDI (`ID`,`Date`,`Result`)
					VALUES ('$id', '$date_add', '$result')";
$result_add_BDI = queryDB($query_add_BDI);

if($result_add_BDI){
	$_SESSION['data_changed'] = "Dane zostały dodane.";
	header('Location: ../pages/BDI_FSS_MFIS.php');
}

else if (!$result_add_BDI){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/BDI_FSS_MFIS.php');
}

?>