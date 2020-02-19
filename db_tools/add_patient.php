<?php 
/*
 * Obsługa dodawania nowego pacjenta przez lekarza do bazy danych
 * Obsługiwana przez transakcje.
 * Etap 1: zapytanie do bazy, czy istnieje już podany nr PESEL:
 * tak -> komunikat, powrót do strony, nie -> przechodzi do dalszego etapu
 * Etap 2: pobiera wszystkie dane z formularza metodą POST
 *  oraz dane o lekarzu i szpitalu ze zmiennej SESSION
 *  Etap 3: wykonywana transakcja za pomocą try + catch
 *  Dodawany nowy pacjent do tabeli 01_FS_ID_anonim, pobierany adres ID funkcją insert_id
 *  Następnie dodawane dane demograficzne do tabeli AT_DemogData
 *  Po poprawnym przejściu przez wszystkie etapy przekierowuje do dalszego dodawania pacjenta
 *  do strony pages/add_new_patient_2.php
 *  Dodatkowo zapamiętuje ID dodanego pacjenta w zmiennej $_SESSION['inserted_id']
 */
session_start();
require_once 'queryDB.php';

// Sprawdzanie, czy istnieje PESEL w bazie
$PESEL= $_POST['pesel'];
$PESEL_hash = md5($PESEL);
$query_check_PESEL= "SELECT * FROM 01_FS_ID_anonim WHERE funkcjaAnonim = '$PESEL_hash' ";
$result_check_PESEL = queryDB($query_check_PESEL);
$check_PESEL = $result_check_PESEL->fetch_assoc();

if($check_PESEL== 0){
	
	// Dane do uzupełnienia w tabeli 01_FS_ID_anonim
	$name = $_POST['sc_name'];
	$surname = $_POST['sc_surname'];
	$initials = strtoupper($name . $surname); // konkatenacja iniciałów i zamiana na duże litery
	
	// Dane do uzupełnienia w tabeli AT_DemogData
	$year = $_POST['year'];
	$month = $_POST['month'];
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
	
	// Dane lekarza zapisane w zmienej SESSION
	$id_hospital = $_SESSION['ID_hospital'];
	$id_doctor = $_SESSION['user_id'];
	
	$baza = connectToDB();
	try{
		$baza->begin_transaction();
		
		$query_add_patient = "INSERT INTO 01_FS_ID_anonim
								(`Inicialy`, `funkcjaAnonim`)
								VALUES ('$initials', '$PESEL_hash')";
		$query1 = $baza->query($query_add_patient);
		$inserted_id = $baza->insert_id; // ostatnio wpisany AI ID
		
		$query_add_demografic = "INSERT INTO AT_DemogData (`ID`,`ID_hospital`, `ID_doctor`, `year`, `month`, `gender`,
								`address`, `province`, `hand`, `labor`, `education`, `family_status`, `employ`,
								`SM_in_family`, `deleted`, `job`)
								VALUES ('$inserted_id', '$id_hospital', '$id_doctor', '$year', '$month', '$gender', '$address', '$province',
								'$hand', '$labor', '$education', '$family', '$employ', '$SM', '0', '$job')";
		
		$query2 = $baza->query($query_add_demografic);
							
		$baza->commit();
		$_SESSION['inserted_id'] = $inserted_id;
		$_SESSION['added_patient'] = "Pacjent został poprawnie dodany.";
		header('Location: ../pages/add_new_patient_2.php');
	}
	
	catch(Exception $e){
		$baza->rollBack();
		$_SESSION['added_patient'] = "Wystąpił problem. Prosimy spróbować później.";
		header('Location: ../pages/add_new_patient.php');
	}
}

elseif($check_PESEL> 0)
{
	$_SESSION['data_changed'] = "Podany nr PESEL występuje już w bazie danych.
								Proszę skontaktować się z administratorem.";
	header('Location: ../pages/add_new_patient.php');
}

?>

