<?php 
/*
 * Formularz edycji badania EDSS. Obejmuje:
 * Wyświetlenie tabeli z badaniem EDSS z możliwością usunięcia wybranego badania
 * oraz dodanie nowego wpisu szczegółowego badania
 */
require_once '../html_tools/generate_table_EDSS.php';
require_once '../db_tools/queryDB.php';
require_once "../lang/$lang/form_EDSS.php";
	
$query_EDSS = "SELECT ID_EDSS, Date, Visual, Brain, Pyramidal, Cerebellar,
					Sensors, Bowel, Cerebral, AmbulatoryIndex, Help, Result
					FROM AT_EDSS WHERE ID = '$patient_id' ORDER BY Date";
$EDSS = queryDB($query_EDSS);

$labels= array("Badanie", $ed_date, $ed_visual, $ed_brain, $ed_pyram, $ed_cerebellar, $ed_sens, $ed_bowel,
		$ed_cerebral, $ed_ai, $ed_help, $ed_end_result);
$id_table = 'EDSS';

// Pobranie nazw możliwych wyników do 'Ambulatory Index' oraz 'Help'
$query_name_AmbIndx= "SELECT * FROM NameEDSSAmbIndx";
$name_AmbIndx= queryDB($query_name_AmbIndx);
while($row_name_ai= $name_AmbIndx->fetch_assoc()){
	$id_ai[] = $row_name_ai['idNameEDSSAmbIndx'];
	$name_ai[] = $row_name_ai['name_amb_indx'];
}

$query_name_help= "SELECT * FROM NameEDSSHelp";
$result_name_help= queryDB($query_name_help);
while($row_name_help= $result_name_help->fetch_assoc()){
	$id_help[] = $row_name_help['idNameEDSSHelp'];
	$name_help[] = $row_name_help['name_help'];
}
?>

