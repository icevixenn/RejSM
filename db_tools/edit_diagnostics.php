<?php
/*
 * Edycja diagnostyki pacjenta, z wyłączeniem MRI. Zapytania do bazy.
 * Edycja informacji o CSF i potencjałach.
 */
session_start();
require_once 'queryDB.php';
	
$id = $_POST['id']; // ID pobiera z ukrytego pola formularza

// usuń wszystkie poprzednie rekordy CSF dla danego ID pacjenta, następnie dodaj nowe
$query_delete_CSF = "DELETE FROM AT_CSF WHERE ID = '$id' ";
$result_delete_CSF = queryDB($query_delete_CSF);

// usuń wszystkie poprzednie rekordy Potentials dla danego ID pacjenta, następnie dodaj nowe
$query_delete_pot = "DELETE FROM AT_Potentials WHERE ID = '$id' ";
$result_delete_pot = queryDB($query_delete_pot);

// jeśli badanie zostało zaznaczone, dodatnie go do bazy
if($_POST['CSF_checked']){
	$CSF_checked = 1;
	$CSF_bands= $_POST['CSF_bands'];
	$query_CSF = "INSERT INTO AT_CSF (`ID`, `CSF_test`, `bands`) VALUES ('$id', '$CSF_checked', '$CSF_bands') ";
	$result_CSF = queryDB($query_CSF);
}

if($_POST['potentials_checked']){
	$potentials_checked = 1;
	$potential_sign= $_POST['potential_sign'];
	$query_pot = "INSERT INTO AT_Potentials (`ID`, `Potentials`, `Sign`) VALUES ('$id', '$potentials_checked', '$potential_sign') ";
	$result_pot = queryDB($query_pot);
}

// przekierowanie z powrotem na stronę po prawidłowym wykonaniu

// Operacja usunięcia poprzednich danych - zawsze musi być wykonana
if($result_delete_CSF && $result_delete_pot){
// Przypadek 1: gdy obydwa badania zostały wykonane
	if($_POST['CSF_checked'] && $_POST['potentials_checked']){
		if($result_CSF && $result_pot){
			$_SESSION['data_changed'] = "Dane zostały zmienione.";
			header('Location: ../pages/diagnostics.php');
		}
		else{
			$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
			header('Location: ../pages/diagnostics.php');
		}
	}
// Przypadek 2: gdy jedno z badań zostało wykonane
	else if($_POST['CSF_checked'] || $_POST['potentials_checked']){
		if($result_CSF || $result_pot){
			$_SESSION['data_changed'] = "Dane zostały zmienione.";
			header('Location: ../pages/diagnostics.php');
		}
		else{
			$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
			header('Location: ../pages/diagnostics.php');
		}
	}
// Przypadek 3: gdy żadne badanie nie zostało zaznaczone
	else if(!($_POST['CSF_checked'] && $_POST['potentials_checked']))
	$_SESSION['data_changed'] = "Dane zostały zmienione.";
	header('Location: ../pages/diagnostics.php');
}
// Gdy operacja usunięcia poprzednich danych się nie wykonała - wystąpił problem
else if (!($result_delete_CSF && $result_delete_pot)){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/diagnostics.php');
}

?>
