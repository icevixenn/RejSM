<?php
/*
 * Zapytanie do bazy o dodanie wpisu badania MRI
 */
session_start();
require_once 'queryDB.php';

$id = $_POST['id']; // ID pobiera z ukrytego pola formularza
$MRI_date_add= $_POST['MRI_date_add'];

$query_add_MRI = "INSERT INTO AT_MRI (`ID`, `Date`) VALUES ('$id', '$MRI_date_add') ";

$result_add_MRI= queryDB($query_add_MRI);

if($result_add_MRI){
	$_SESSION['data_changed'] = "Dane zostały zmienione.";
	header('Location: ../pages/diagnostics.php');
}
	
else if (!$result_add_MRI){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/diagnostics.php');
}

?>
