<?php
session_start();
	
require_once 'queryDB.php';

$id = $_POST['id']; // ID pobiera z ukrytego pola formularza
$address = $_POST['address'];
$labor = $_POST['labor'];
$job = $_POST['job'];
$gender = $_POST['gender'];
$hand = $_POST['hand'];
$SM = $_POST['SM'];
$family = $_POST['family'];
$province = $_POST['province'];
$education = $_POST['education'];
$employ = $_POST['employ'];

$query_edit_demografic = "UPDATE AT_DemogData 
							SET gender='$gender', 
						    	address='$address',
						    	province='$province',
						        hand='$hand', 
								labor='$labor',
								education='$education',
								family_status='$family',
						        job='$job',
						        employ='$employ',
						        SM_in_family='$SM'
							WHERE
							    ID = '$id'
							";
		
$result_edit_demografic = queryDB($query_edit_demografic);
		
if($result_edit_demografic){
	$_SESSION['data_changed'] = "Dane zostały zmienione.";
	header('Location: ../pages/demografic_data.php');
}
	
else if (!$result_edit_demografic){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/demografic_data.php');
}
?>
