<?php 
/*
 * Operacja dodania nowego testu EDSS do danego pacjenta
 */
session_start();
require_once 'queryDB.php';

$id = $_POST['id']; // ID pobiera z ukrytego pola formularza
$date_add= $_POST['date_add'];
$visual = $_POST['visual'];
$brain = $_POST['brain'];
$pyram = $_POST['pyram'];
$cerebellar = $_POST['cerebellar'];
$sens = $_POST['sens'];
$bowel = $_POST['bowel'];
$cerebral = $_POST['cerebral'];
$amb_indx = $_POST['amb_indx'];
$help = $_POST['help'];
$result= $_POST['result'];

$query_add_EDSS = "INSERT INTO AT_EDSS (`ID`,`Date`,`Visual`,`Brain`,`Pyramidal`,`Cerebellar`,
					`Sensors`,`Bowel`,`Cerebral`,`AmbulatoryIndex`,`Help`,`Result`)
					VALUES ('$id','$date_add','$visual','$brain','$pyram','$cerebellar',
					'$sens','$bowel','$cerebral','$amb_indx','$help','$result')";

$result_add_EDSS= queryDB($query_add_EDSS);

if($result_add_EDSS){
	$_SESSION['data_changed'] = "Dane zostały dodane.";
	header('Location: ../pages/EDSS.php');
}

else if (!$result_add_EDSS){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/EDSS.php');
}

?>