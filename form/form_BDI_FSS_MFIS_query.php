<?php 
/* Zapytania do bazy o wyniki wyświetlane w pliku form/from_BDI_FSS_MFIS_query.php
 * Obejmuje:
 * Wyświetlenie tabeli z badaniem MFIS z możliwością usunięcia wybranego badania,
 * Wyświetlenie wyników BDI, FSS
 * oraz dodanie nowych wpisów szczegółowych wszystkich badań
 */
require_once '../db_tools/queryDB.php';
require_once "../lang/$lang/form_BDI_FSS_MFIS.php";
require_once '../html_tools/generate_table_MFIS.php';

// Wyniki BDI danego pacjenta
$query_BDI = "SELECT * FROM AT_BDI WHERE ID = '$patient_id'";
$result_BDI = queryDB($query_BDI);

// Wyniki FSS danego pacjenta
$query_FSS = "SELECT * FROM AT_FSS WHERE ID = '$patient_id'";
$result_FSS = queryDB($query_FSS);

// Wyniki 9HPT danego pacjenta
$query_MFIS = "SELECT ID_MFIS, date, physical, cognitive, social, result 
				FROM AT_MFIS WHERE ID = '$patient_id' ORDER BY date";
$MFIS = queryDB($query_MFIS);

$labels = array("Badanie", $MFIS_date, $MFIS_phys, $MFIS_cogn, $MFIS_social, $MFIS_result);
$id_table = 'MFIS';

?>