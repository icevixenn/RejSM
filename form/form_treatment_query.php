<?php 
/*
 * Formularz edycji leczenia (branych leków przez pacjenta). Obejmuje:
 * Leki immunomodulujące oraz objawowe (brane z tabeli AT_drug_intake
 * wraz z datą OD/DO zażywania (opcjonalna)
 * Lek immunosupresyjny (SoluMedrol) wraz z datą przyjęcia 
 */
require_once '../db_tools/queryDB.php';
require_once "../lang/$lang/form_treatment.php";

//Nazwy i przypisane im adresy ID wszystkich leków
$query_drug_names = "SELECT * FROM Name_drug";
$drug_names = queryDB($query_drug_names);
while($row_drug_names= $drug_names->fetch_assoc()){
	$id_drug[] = $row_drug_names['id_name_drug'];
	$name_drug[] = $row_drug_names['name_drug'];
}

//Info o braniu leków przez danego pacjenta
$query_drug_intake = "SELECT DI.ID_drug_intake, DI.ID_name_drug, 
						DI.date_from, DI.date_to, D.name_drug
					FROM AT_drug_intake AS DI
					JOIN
						Name_drug AS D ON D.id_name_drug = DI.ID_name_drug
					WHERE ID = '$patient_id' ORDER BY date_from";
$drug_intake = queryDB($query_drug_intake);

// SOLUMEDROL danego pacjenta
$query_sm = "SELECT * FROM AT_SoluMedrol WHERE ID = '$patient_id' ORDER BY Date";
$result_sm= queryDB($query_sm);


?>

