<?php 

/** function generateTable($labels, $result)
 * \Funkcja generuje kod HTML tabelki na podstawie danych wejsciowych.
 *
 * Uniwersalna funkcja tworząca tabelę (przy pomocy plug-inu DataTables -> https://datatables.net/)
 *
 * @param array $labels - Nazwy kolumn
 * @param Object $result - Dane do wyswietlenia w tabeli.
 * @param string $id - ID tabelki
 * @return Opis zwracanej wartości
 */
function generateTable($labels, $result, $id){
	
	// Drukuj znacznik table razem z parametrami
	print "<table id=$id class=\"display\" cellspacing=\"0\" width=\"100%\">";
	
	// Generuj kod HTML dla tytułów kolumn w tabelce.
	print "<thead>";
	print " <tr> ";
	foreach($labels as $columnName){
		print " <th>$columnName</th> ";
	}
	print " </tr> ";
	print "</thead>";
	print "<tbody>";
	// Drukuj tresc

	$rowcount=mysqli_num_rows($result);

	for ($i=0;$i<$rowcount;$i++){
		
		print " <tr> ";
		$row = $result->fetch_row();
		
		for ($j=0; $j<sizeof($row);$j++){
			print " <td>$row[$j]</td> ";
		}
		print " </tr>";	
	}
	print "</tbody>";
	print "</table>";
}
?>