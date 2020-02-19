<?php 
/*
 * Operacja dodania nowego testu VFT do danego pacjenta
 */
session_start();
require_once 'queryDB.php';

$id = $_POST['id']; // ID pobiera z ukrytego pola formularza
$date_add = $_POST['date_add'];
$p_100 = $_POST['p_100'];
$p_25 = $_POST['p_25'];
$p_125 = $_POST['p_125'];
$snellen = $_POST['snellen'];

$query_add_VFT = "INSERT INTO AT_VFT (`ID`,`date`,`perc_100`,`perc_25`,`perc_125`,`snellen`)
					VALUES ('$id','$date_add','$p_100','$p_25','$p_125','$snellen')";
$result_add_VFT = queryDB($query_add_VFT);

if($result_add_VFT){
	$_SESSION['data_changed'] = "Dane zostały dodane.";
	header('Location: ../pages/VFT_SDMT.php');
}

else if (!$result_add_VFT){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/VFT_SDMT.php');
}

?>
