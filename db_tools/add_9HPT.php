<?php 
/*
 * Operacja dodania nowego testu 9-Hole Peg do danego pacjenta
 */
session_start();
require_once 'queryDB.php';

$id = $_POST['id']; // ID pobiera z ukrytego pola formularza
$date_add= $_POST['date_add'];
$I_try_d = $_POST['I_try_d'];
$II_try_d = $_POST['II_try_d'];
$I_try_nd = $_POST['I_try_nd'];
$II_try_nd = $_POST['II_try_nd'];

if(isset($_POST['unable_d'])) $unable_d = '1';
else $unable_d= '0';
if(isset($_POST['unable_nd'])) $unable_nd = '1';
else $unable_nd= '0';

$query_add_9HPT = "INSERT INTO AT_MSFC_9HPT (`ID`,`date`,`I_dh`,`II_dh`,`I_ndh`,`II_ndh`,`dhu`,`ndhu`)
					VALUES ('$id','$date_add','$I_try_d','$II_try_d','$I_try_nd','$II_try_nd','$unable_d','$unable_nd')";
$result_add_9HPT= queryDB($query_add_9HPT);

if($result_add_9HPT){
	$_SESSION['data_changed'] = "Dane zostały dodane.";
	header('Location: ../pages/MSFC.php');
}

else if (!$result_add_9HPT){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/MSFC.php');
}

?>
