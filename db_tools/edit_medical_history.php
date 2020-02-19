<?php
session_start();
	
require_once 'queryDB.php';

/*
 * Edycja historii choroby pacjenta. Zapytania do bazy.
 * TODO przerobić to wraz z formularzem na automatyczne dodawanie w pętlach
 * w razie dodania nowej choroby automatycznie się to doda jako checkbox i w mysqlu
 */
	
$id = $_POST['id']; // ID pobiera z ukrytego pola formularza
$I_symp_date= $_POST['I_symp_date'];
$I_symp= $_POST['I_symp'];
$diagnosis_date= $_POST['diagnosis_date'];
$form= $_POST['form'];

$query_SM = "UPDATE `AT_med_history_SM` AS MH 
			    SET MH.I_symp='$I_symp',
					MH.I_symp_date='$I_symp_date',
	                MH.diagnosis_date='$diagnosis_date',
	                MH.form='$form'
			WHERE
			    MH.ID = '$id'
			";
$result_SM = queryDB($query_SM);

// usuń wszystkie poprzednie rekordy dla danego ID pacjenta, następnie dodaj nowe
$query_delete = "DELETE FROM AT_med_history_general WHERE ID = '$id' ";
$result_delete= queryDB($query_delete);

if($_POST['McDonald']) {
	$McDonald= $_POST['McDonald'];
	$query_MD = "INSERT INTO AT_med_history_general (`ID`, `ID_disease`) SELECT '$id', '$McDonald' ";
	$result_MD = queryDB($query_MD);
};
if($_POST['hipertension']) {
	$hipertension= $_POST['hipertension'];
	$query_ht = "INSERT INTO AT_med_history_general (`ID`, `ID_disease`) SELECT '$id', '$hipertension' ";
	$result_ht= queryDB($query_ht);
};
if($_POST['optical_neuritis']) {
	$optical_neuritis= $_POST['optical_neuritis'];
	$query_on = "INSERT INTO AT_med_history_general (`ID`, `ID_disease`) SELECT '$id', '$optical_neuritis' ";
	$result_on= queryDB($query_on);
};
if($_POST['diabetes']) {
	$diabetes= $_POST['diabetes'];
	$query_d = "INSERT INTO AT_med_history_general (`ID`, `ID_disease`) SELECT '$id', '$diabetes' ";
	$result_d = queryDB($query_d);
};
if($_POST['thyroid']) {
	$thyroid= $_POST['thyroid'];
	$query_t = "INSERT INTO AT_med_history_general (`ID`, `ID_disease`) SELECT '$id', '$thyroid' ";
	$result_t = queryDB($query_t);
};
if($_POST['thromboembolism']) {
	$thromboembolism= $_POST['thromboembolism'];
	$query_thr = "INSERT INTO AT_med_history_general (`ID`, `ID_disease`) SELECT '$id', '$thromboembolism' ";
	$result_thr= queryDB($query_thr);
};
if($_POST['cancer']) {
	$cancer= $_POST['cancer'];
	$query_c = "INSERT INTO AT_med_history_general (`ID`, `ID_disease`) SELECT '$id', '$cancer' ";
	$result_c = queryDB($query_c);
};

// $all_shit = $query_MD. $query_ht. $query_on. $query_d . $query_t . $query_thr . $query_c;
		
if($result_SM){
	$_SESSION['data_changed'] = "Dane zostały zmienione.";
	header('Location: ../pages/medical_history.php');
}
	
else if (!$result_SM){
	$_SESSION['data_changed'] = "Wystąpił problem. Prosimy spróbować później.";
	header('Location: ../pages/medical_history.php');
}
?>
