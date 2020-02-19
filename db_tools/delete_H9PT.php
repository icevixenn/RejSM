<?php 
/*
 * Obsługa usunięcia wybranego wpisu badania 9HPT z bazy danych
 * Zapytanie powstaje z tabeli dostępnej w html_tools/generate_table_9HPT.php
 */
session_start();
require_once 'queryDB.php';

$H9PT= $_POST['ID_H9PT'];
$query_H9PT= "DELETE FROM AT_MSFC_9HPT WHERE ID_9HPT = '$H9PT' ";
$result_H9PT= queryDB($query_H9PT);

if($result_H9PT){
	$_SESSION['data_changed'] = "Wpis został usunięty.";
	header('Location: ../pages/MSFC.php');
}

else if (!$result_H9PT){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/MSFC.php');
}

?>