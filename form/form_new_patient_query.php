<?php
/*
 * Zapytania do bazy danych do pliku form/form_new_patient.php oraz form/form_new_patient_2.php
 * 
 */
require_once "../lang/$lang/form_editDemogr.php";
require_once '../db_tools/queryDB.php';
require_once "../lang/$lang/form_medical_history.php";
require_once "../lang/$lang/form_diagnostics.php";

// CZĘŚĆ 1
$query_province = "SELECT * FROM Name_province";
$province = queryDB($query_province);
while($row_province = $province->fetch_assoc()){
	$id_prov[] = $row_province['id_name_province'];
	$name_prov[] = $row_province['name_province'];
}
$query_labor = "SELECT * FROM Name_labor";
$SM_labor = queryDB($query_labor);
while($row_labor = $SM_labor->fetch_assoc()){
	$id_labor[] = $row_labor['id_name_labor'];
	$name_labor[] = $row_labor['name_labor'];
}
$query_employ = "SELECT * FROM Name_employ";
$employ = queryDB($query_employ);
while($row_employ = $employ->fetch_assoc()){
	$id_employ[] = $row_employ['id_name_employ'];
	$name_employ[] = $row_employ['name_employ'];
}
$query_family = "SELECT * FROM Name_family_status";
$family = queryDB($query_family);
while($row_family = $family->fetch_assoc()){
	$id_family[] = $row_family['id_name_family_status'];
	$name_family[] = $row_family['name_family_status'];
}

// CZĘŚĆ 2

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
 * Nazwy i przypisane im adresy ID nazw chorób współistniejących
 * Zapisywane w tablicy $id_disease i $name_disease
 */
$mh_general = "SELECT * FROM Name_disease";
$result_g = queryDB($mh_general);
while($row_g= $result_g->fetch_assoc()){
	$name_disease[] = $row_g['name_disease'];
	$id_disease[] = $row_g['id_name_disease'];
}

//Nazwy i przypisane im adresy ID nazw wyniku CSF
$query_CSF_names = "SELECT * FROM Name_CSF";
$names_CSF= queryDB($query_CSF_names);
while($row_names_CSF= $names_CSF->fetch_assoc()){
	$id_CSF[] = $row_names_CSF['id_CSF'];
	$name_CSF[] = $row_names_CSF['name_CSF'];
}

//Nazwy i przypisane im adresy ID nazw wyniku testu potencjałów (prążki olig.)
$query_pot_names = "SELECT * FROM Name_potentials";
$names_pot= queryDB($query_pot_names);
while($row_names_pot= $names_pot->fetch_assoc()){
	$id_pot[] = $row_names_pot['id_potentials'];
	$name_pot[] = $row_names_pot['name_potentials'];
}

?>