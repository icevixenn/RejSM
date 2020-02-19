<?php 
/*
 * Operacja dodania nowego testu SDMT do danego pacjenta
 */
session_start();
require_once 'queryDB.php';

$id = $_POST['id']; // ID pobiera z ukrytego pola formularza
$date_add = $_POST['date_add'];
$result= $_POST['result'];

$query_add_SDMT = "INSERT INTO AT_SDMT (`ID`,`Date`,`Result`)
					VALUES ('$id', '$date_add', '$result')";
$result_add_SDMT = queryDB($query_add_SDMT);

if($result_add_SDMT){
	$_SESSION['data_changed'] = "Dane zostały dodane.";
	header('Location: ../pages/VFT_SDMT.php');
}

else if (!$result_add_SDMT){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/VFT_SDMT.php');
}

?>