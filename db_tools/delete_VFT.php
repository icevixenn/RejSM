<?php 
/*
 * Obsługa usunięcia wybranego wpisu badania VFT z bazy danych
 * Zapytanie powstaje z tabeli dostępnej w html_tools/generate_table_VFT.php
 */
session_start();
require_once 'queryDB.php';

$VFT = $_POST['ID_VFT'];
$query_VFT = "DELETE FROM AT_VFT WHERE ID_VFT = '$VFT' ";
$result_VFT = queryDB($query_VFT);

if($result_VFT){
	$_SESSION['data_changed'] = "Wpis został usunięty.";
	header('Location: ../pages/VFT_SDMT.php');
}

else if (!$result_VFT){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/VFT_SDMT.php');
}

?>