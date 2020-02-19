<?php 
require_once '../db_tools/queryDB.php';
require_once "../lang/$lang/form_medical_history.php";
/*
 * Nazwy i przypisane im adresy ID nazw pierwszych symptomów SM
 * Zapisywane w tablicy $id_symp i $name_symp
 */ 
$query_SM_symp = "SELECT * FROM Name_mh_symp";
$SM_symp= queryDB($query_SM_symp);
while($row_SM_symp= $SM_symp->fetch_assoc()){
	$id_symp[] = $row_SM_symp['id_mh_symp'];
	$name_symp[] = $row_SM_symp['name_mh_symp'];
}
/*
 * Nazwy i przypisane im adresy ID nazw formy SM pacjenta
 * Zapisywane w tablicy $id_form i $name_form
 */
$query_SM_form = "SELECT * FROM Name_mh_SM_form";
$SM_form= queryDB($query_SM_form);
while($row_SM_form= $SM_form->fetch_assoc()){
	$id_form[] = $row_SM_form['id_mh_SM_form'];
	$name_form[] = $row_SM_form['name_mh_SM_form'];
}

/*
 * Informacje o wybranym pacjencie o ID = $patient_id
 * Dane pobierane z tabeli z danymi dotyczącymi SM
 */
$mh_SM = "SELECT S.name_mh_symp, SM.I_symp, I_symp_date, 
				SM.diagnosis_date, F.name_mh_SM_form, SM.form
			FROM AT_med_history_SM AS SM
			JOIN
				Name_mh_SM_form AS F ON F.id_mh_SM_form = SM.form
			JOIN
				Name_mh_symp AS S ON S.id_mh_symp = SM.I_symp
			WHERE ID = $patient_id";

$result_SM = queryDB($mh_SM);
$row_SM = $result_SM->fetch_assoc();

$name_mh_symp= $row_SM['name_mh_symp'];
$I_symp= $row_SM['I_symp'];
$I_symp_date= $row_SM['I_symp_date'];
$diagnosis_date= $row_SM['diagnosis_date'];
$name_mh_SM_form= $row_SM['name_mh_SM_form'];
$form= $row_SM['form'];

/*
 * Informacje o chorobach wybranego pacjenta o ID = $patient_id
 * Dane pobierane z tabeli z danymi dotyczącymi SM
 */
$mh_general = "SELECT D.name_disease, G.ID_disease
				FROM AT_med_history_general AS G
			    JOIN
					Name_disease AS D ON D.id_name_disease = G.ID_disease
			    WHERE ID = $patient_id";

$result_g = queryDB($mh_general);

while($row_g= $result_g->fetch_assoc()){
	$name_disease[] = $row_g['name_disease'];
	$id_disease[] = $row_g['ID_disease'];
}
?>



