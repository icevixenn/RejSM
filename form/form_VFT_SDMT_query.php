<?php 
/*
 * Zapytania do bazy o wyniki wyświetlane w pliku form/form_VFT_SDMT.php
 * Obejmuje:
 * Wyświetlenie tabeli z badaniem VFT z możliwością usunięcia wybranego badania,
 * Wyświetlenie wyników SDMT
 * oraz dodanie nowych wpisów szczegółowych wszystkich badań
 */
require_once '../db_tools/queryDB.php';
require_once "../lang/$lang/form_VFT_SDMT.php";
require_once '../html_tools/generate_table_VFT.php';

// Tworzenie tabeli z danymi testu VFT danego pacjenta
$query_VFT = "SELECT ID_VFT, date, perc_100, perc_25, perc_125, snellen
FROM AT_VFT WHERE ID = '$patient_id' ORDER BY date";
$VFT = queryDB($query_VFT);
// Tworzenie nagłówków
$labels= array("Badanie",$date, '100%', '2,5%', '1,25%', $snellen);
$id_table = 'VFT';

// Wyniki SDMTdanego pacjenta
$query_SDMT = "SELECT * FROM AT_SDMT WHERE ID = '$patient_id'";
$result_SDMT = queryDB($query_SDMT);

?>