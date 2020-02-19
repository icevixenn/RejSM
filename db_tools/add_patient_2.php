<?php 
/*
 * Obsługa dodawania nowego pacjenta przez lekarza do bazy danych
 * Obsługiwana przez transakcje.
 * CZĘŚĆ 2
 * Obsługa wpisania danych historii choroby SM, współistniejących oraz diagnostyki
 * Etap 1: częściowe pobieranie danych z formularza
 * Etap 2: zapytanie do bazy danych o liczbę istniejących chorób oraz sprawdzenie czy zostały zaznaczone w formularzu
 * Etap 3: rozpoczęcie transakcji
 * 3.1. tworzona tablica zapytań do bazy o współistniejące choroby, przy problemach cofnięcie do formularza
 * 3.2. po poprawnym dodaniu chorób do bazy idzie wpis do choroby SM
 * 3.3. dodanie diagnostyki: sprawdzanie, czy zostały zaznaczone wybrane testy, a następnie zapytanie do bazy o dodanie wpisu
 * Etap 4: Gdy wszystko poprawnie zostało dodane do bazy następuje przekierowanie do strony pages/add_new_patient_3.php
 *
 */
session_start();
require_once 'queryDB.php';

// Historia Choroby SM - pobranie info z formularza
$id = $_POST['id'];
$I_symp = $_POST['I_symp'];
$I_symp_date = $_POST['I_symp_date'];
$diagnosis_date = $_POST['diagnosis_date'];
$form = $_POST['form'];

// Historia choroby ogólna - zapytanie do bazy o liczbę chorób
$mh_general = "SELECT * FROM Name_disease";
$result_g = queryDB($mh_general);
// Sprawdzenie, które choroby zostały zaznaczone 
for ($i=0;$i<mysqli_num_rows($result_g);$i++){
	if($_POST[$i]) $id_disease[] = $_POST[$i];
}
// Początek transakcji
$baza = connectToDB();
try{
	// Tworzenie tablicy zapytań do AT_med_history_general z wieloma chorobami
	$stmt = $baza->prepare("INSERT INTO AT_med_history_general (`ID`, `ID_disease`) VALUES ('$id', ?)");
	foreach($id_disease as $ID_to_add) {
		$stmt->bind_param("i", $ID_to_add); //binding parameters
		if (!$stmt->bind_param("i", $ID_to_add) || !$stmt->execute()) {	//check for binding errors
			$sql_error = true;
		}
		$add_disease_query[] = "INSERT INTO AT_med_history_general (`ID`, `ID_disease`) VALUES ('$id', '$ID_to_add')";
	}
	$stmt->close();		//close variable
	if($sql_error == true) {
		$baza->rollback();
	}
	else {
		
		$baza->begin_transaction();
		// Zapytanie do bazy o dodanie informacji o historii choroby SM (tabela AT_med_history_SM)
		$query_SM = "INSERT INTO AT_med_history_SM (`ID`, `I_symp`, `I_symp_date`, `diagnosis_date`, `form`)
		VALUES ('$id', '$I_symp', '$I_symp_date', '$diagnosis_date', '$form')";
		$query1 = $baza->query($query_SM);
		
		// Jeśli testy diagnostyki zostały zaznczone - zapytania do bazy o dodawnie wpisów
		if($_POST['CSF_checked']){
			$CSF_bands = $_POST['CSF_bands'];
			$query_CSF = "INSERT INTO AT_CSF (`ID`, `CSF_test`, `bands`) VALUES ('$id', '1', '$CSF_bands')";
			$query2 = $baza->query($query_CSF);
		}
		if($_POST['potentials_checked']){
			$potential_sign = $_POST['potential_sign'];
			$query_potentials = "INSERT INTO AT_Potentials (`ID`, `Potentials`, `Sign`) VALUES ('$id', '1', '$potential_sign')";
			$query3 = $baza->query($query_potentials);
		}
		if($_POST['MRI_checked']){
			$MRI_date_add = $_POST['MRI_date_add'];
			$query_MRI = "INSERT INTO AT_MRI (`ID`, `Date`) VALUES ('$id', '$MRI_date_add')";
			$query4 = $baza->query($query_MRI);
		}
		// Jesli wszystko poszło OK - commit do bazy i przekierowanie na kolejną stronę formularza
		$baza->commit();
		$_SESSION['patient_id'] = $id;
		$_SESSION['added_patient'] = "Pacjent został poprawnie dodany.";
		header('Location: ../pages/add_new_patient_3.php');
	}

}
// Wyłapanie błędów, cofnięcie do strony z formularzem 
catch(Exception $e){
	$baza->rollBack();
	$_SESSION['added_patient'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/add_new_patient_2.php');
}


?>