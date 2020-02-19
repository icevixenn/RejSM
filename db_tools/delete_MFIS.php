<?php 
/*
 * Obsługa usunięcia wybranego wpisu badania MFIS z bazy danych
 * Zapytanie powstaje z tabeli dostępnej w html_tools/generate_table_MFIS.php
 */
session_start();
require_once 'queryDB.php';

$MFIS = $_POST['ID_MFIS'];
$query_MFIS = "DELETE FROM AT_MFIS WHERE ID_MFIS = '$MFIS' ";
$result_MFIS = queryDB($query_MFIS);

if($result_MFIS){
	$_SESSION['data_changed'] = "Wpis został usunięty.";
	header('Location: ../pages/BDI_FSS_MFIS.php');
}

else if (!$result_MFIS){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/BDI_FSS_MFIS.php');
}

?>