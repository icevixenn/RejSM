<?php 
/* Zapytania do bazy o wyniki wyświetlane w pliku form/from_MSFC.php
 * Obejmuje:
 * Wyświetlenie tabeli z badaniem 9HPT z możliwością usunięcia wybranego badania,
 * Wyświetlenie wyników T25FW, PASAT
 * oraz dodanie nowych wpisów szczegółowych wszystkich badań
 */
require_once '../db_tools/queryDB.php';
require_once "../lang/$lang/form_MSFC.php";
require_once '../html_tools/generate_table_9HPT.php';

// Wyniki T25FW danego pacjenta
$query_T25FW = "SELECT * FROM AT_MSFC_25FWT WHERE ID = '$patient_id'";
$result_T25FW= queryDB($query_T25FW);

// Wyniki PASAT danego pacjenta
$query_PASAT = "SELECT * FROM AT_MSFC_PASAT WHERE ID = '$patient_id'";
$result_PASAT= queryDB($query_PASAT);

// Wyniki 9HPT danego pacjenta
$query_H9PT= "SELECT ID_9HPT, date, I_dh, II_dh, I_ndh, II_ndh 
				FROM AT_MSFC_9HPT WHERE ID = '$patient_id' ORDER BY date";
$H9PT= queryDB($query_H9PT);

$labels= array("Badanie",$date, $H9PT_Itry_d, $H9PT_IItry_d, $H9PT_Itry_nd, $H9PT_IItry_nd);
$id_table = 'H9PT';

?>