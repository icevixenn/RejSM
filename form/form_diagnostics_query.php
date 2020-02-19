<?php 
/*
 * Formularz edycji diagnostyki pacjenta. Obejmuje:
 * badania MRI (+data), badanie CSF (+wynik), badanie potencjałów wzrokowych (+wynik)
 */
require_once '../db_tools/queryDB.php';
require_once "../lang/$lang/form_diagnostics.php";

//Nazwy i przypisane im adresy ID nazw wyniku CSF
$query_CSF_names = "SELECT * FROM Name_CSF";
$names_CSF= queryDB($query_CSF_names);
while($row_names_CSF= $names_CSF->fetch_assoc()){
	$id_CSF[] = $row_names_CSF['id_CSF'];
	$name_CSF[] = $row_names_CSF['name_CSF'];
}
// test CSF danego pacjenta
$query_CSF = "SELECT C.CSF_test, C.bands, N.name_CSF
			FROM AT_CSF AS C
			JOIN Name_CSF AS N ON C.bands = N.id_CSF
			WHERE C.ID = '$patient_id'";
$result_CSF = queryDB($query_CSF);
$row_CSF = $result_CSF->fetch_assoc();
$CSF_test = $row_CSF['CSF_test'];
$CSF_bands = $row_CSF['bands'];
$name_bands = $row_CSF['name_CSF'];

//Nazwy i przypisane im adresy ID nazw wyniku testu potencjałów (prążki olig.)
$query_pot_names = "SELECT * FROM Name_potentials";
$names_pot= queryDB($query_pot_names);
while($row_names_pot= $names_pot->fetch_assoc()){
	$id_pot[] = $row_names_pot['id_potentials'];
	$name_pot[] = $row_names_pot['name_potentials'];
}
// test potencjałów wzrokowych danego pacjenta
$query_pot = "SELECT P.Potentials, P.Sign, N.name_potentials 
			FROM AT_Potentials AS P
			JOIN Name_potentials AS N ON P.Sign = N.id_potentials
			WHERE P.ID = '$patient_id'";
$result_pot = queryDB($query_pot);
$row_pot = $result_pot->fetch_assoc();
$potentials = $row_pot['Potentials'];
$pot_sign = $row_pot['Sign'];
$name_potentials = $row_pot['name_potentials'];

// MRI danego pacjenta -  data badania
$query_MRI = "SELECT * FROM AT_MRI WHERE ID = '$patient_id'";
$MRI_date = queryDB($query_MRI);

?>

