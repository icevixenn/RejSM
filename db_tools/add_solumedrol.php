<?php
/*
 * Zapytanie do bazy o dodanie wpisu zażycia Solumedrolu
 */
session_start();
require_once 'queryDB.php';

$id = $_POST['id']; // ID pobiera z ukrytego pola formularza
$solumedrol_add= $_POST['solumedrol_add'];

$query_solumedrol_add = "INSERT INTO AT_SoluMedrol (`ID`, `Date`) VALUES ('$id', '$solumedrol_add') ";

$result_solumedrol_add= queryDB($query_solumedrol_add);

if($result_solumedrol_add){
	$_SESSION['data_changed'] = "Dane zostały zmienione.";
	header('Location: ../pages/treatment.php');
}
	
else if (!$result_solumedrol_add){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/treatment.php');
}

?>
