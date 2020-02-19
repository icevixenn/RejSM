<?php
session_start();
	
require_once 'queryDB.php';
	
$id = $_POST['ID']; // ID pobiera z ukrytego pola formularza
$mieszkanie = $_POST['mieszkanie'];
$porody= $_POST['porody'];
$praca= $_POST['praca'];
$plec= $_POST['plec'];
$recznosc= $_POST['recznosc'];
$SM= $_POST['SM'];
$rodzina= $_POST['rodzina'];
$wojew= $_POST['wojew'];
$wykszt= $_POST['wykszt'];
$zarobek= $_POST['zarobek'];

	$query = "UPDATE `AT_DemogData` AS DB 
						JOIN
					Name_gender AS PL ON DB.gender = PL.id_name_gender
						JOIN
					Name_address AS MZ ON DB.address = MZ.id_name_address
						JOIN
				    Name_province AS WO ON DB.province = WO.id_name_province
				        JOIN
					Name_hand AS RE ON DB.hand = RE.id_name_hand
						JOIN
					Name_labor AS PO ON DB.labor = PO.id_name_labor
						JOIN
					Name_education AS WY ON DB.education = WY.id_name_education
						JOIN
					Name_family_status AS SR ON DB.family_status = SR.id_name_family_status
						JOIN
					Name_job AS PZ ON DB.job = PZ.id_name_job
						JOIN
					Name_employ AS ZA ON DB.employ = ZA.id_name_employ
						JOIN
					Name_SM_in_family AS SM ON DB.SM_in_family = SM.id_name_SM_in_family
				    
				    SET DB.gender='$plec', 
						DB.address='$mieszkanie',
				        DB.province='$wojew',
						DB.hand='$recznosc', 
						DB.labor='$porody',
				        DB.education='$wykszt',
				        DB.family_status='$rodzina',
				        DB.job='$praca',
				        DB.employ='$zarobek',
				        DB.SM_in_family='$SM'
				WHERE
				    DB.ID = '$id'
				";
		
$result = queryDB($query);
		
if($result){
	$_SESSION['data_changed'] = "Dane zostały zmienione.";
	header('Location: ../pages/demografic_data.php');
}
	
else if (!$result){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/demografic_data.php');
}
?>
