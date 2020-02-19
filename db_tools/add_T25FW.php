<?php 
/*
 * Operacja dodania nowego testu T25FW do danego pacjenta
 */
session_start();
require_once 'queryDB.php';

$id = $_POST['id']; // ID pobiera z ukrytego pola formularza
$date_add= $_POST['date_add'];
$I_try= $_POST['I_try'];
$II_try= $_POST['II_try'];

if(isset($_POST['unable'])) $unable= '1';
else $unable= '0';

$query_add_T25FW= "INSERT INTO AT_MSFC_25FWT (`ID`,`date`,`I_try`,`II_try`,`unable`)
					VALUES ('$id','$date_add','$I_try','$II_try','$unable')";
$result_add_T25FW= queryDB($query_add_T25FW);

if($result_add_T25FW){
	$_SESSION['data_changed'] = "Dane zostały dodane.";
	header('Location: ../pages/MSFC.php');
}

else if (!$result_add_T25FW){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/MSFC.php');
}

?>