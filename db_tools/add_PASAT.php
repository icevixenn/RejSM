<?php 
/*
 * Operacja dodania nowego testu PASAT do danego pacjenta
 */
session_start();
require_once 'queryDB.php';

$id = $_POST['id']; // ID pobiera z ukrytego pola formularza
$date_add = $_POST['date_add'];
$form = $_POST['form'];
$result = $_POST['result'];


if(isset($_POST['unable'])) $unable= '1';
else $unable= '0';

$query_add_PASAT = "INSERT INTO AT_MSFC_PASAT (`ID`,`date`,`form`,`score`,`unable`)
					VALUES ('$id','$date_add','$form','$result','$unable')";
$result_add_PASAT= queryDB($query_add_PASAT);

if($result_add_PASAT){
	$_SESSION['data_changed'] = "Dane zostały dodane.";
	header('Location: ../pages/MSFC.php');
}

else if (!$result_add_PASAT){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/MSFC.php');
}

?>