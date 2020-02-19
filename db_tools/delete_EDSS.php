<?php 
/*
 * Obsługa usunięcia wybranego wpisu badania EDSS z bazy danych
 */
session_start();
require_once 'queryDB.php';
$EDSS = $_POST['ID_EDSS'];

$query_EDSS = "DELETE FROM AT_EDSS WHERE ID_EDSS = '$EDSS' ";
$result_EDSS = queryDB($query_EDSS);

if($result_EDSS){
	$_SESSION['data_changed'] = "Wpis został usunięty.";
	header('Location: ../pages/EDSS.php');
}

else if (!$result_EDSS){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/EDSS.php');
}

?>