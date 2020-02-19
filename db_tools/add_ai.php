<?php
/*
 * Zapytanie do bazy o dodanie wpisu testu Ambulation Index pacjenta
 */
session_start();
require_once 'queryDB.php';

$id = $_POST['id']; // ID pobiera z ukrytego pola formularza
$ai_date_add= $_POST['date_add'];
$ai_result_add= $_POST['result'];

$query_add_ai = "INSERT INTO AT_amb_indx (`ID`, `date`, `result`) VALUES ('$id', '$ai_date_add', '$ai_result_add') ";

$result_ai= queryDB($query_add_ai);

if($result_ai){
	$_SESSION['data_changed'] = "Dane zostały zmienione.";
	header('Location: ../pages/amb_indx.php');
}

else if (!$result_ai){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/amb_indx.php');
}

?>
