<?php 

/** function generateTableButton($labels, $result)
 * \Funkcja generuje kod HTML tabelki na podstawie danych wejsciowych.
 *
 * Dewiacja od funkcji generateTable() - dodany przycisk przejścia
 * do konkretnego pacjenta (mało uniwersalna)
 * zmiany: pierwsza kolumna zawiera formularz w formie przycisku,
 * automatyczna tablica generowana od drugiego wiersza ([$j]=1)
 *
 * @param array $labels - Nazwy kolumn
 * @param Object $result - Dane do wyswietlenia w tabeli
 * @param number $lp = 0 ?
 * @param string $id - ID tabelki
 * @return Opis zwracanej wartości
 */

function generateTableButton($labels, $result, $lp, $id){
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
	print "<tfoot>";
	print " <tr> ";
	foreach($labels as $columnName){
		print " <th>$columnName</th> ";
	}
	print " </tr> ";
	print "</tfoot>";
	print "<tbody>";
	// Drukuj tresc
	//Wiersze tabeli
	$rowcount=mysqli_num_rows($result);
	for ($i=0;$i<$rowcount;$i++){
		print " <tr> ";
		$row = $result->fetch_row();
		echo   "
					<td>
						<!-- <a href='#PajentWybrany'>" . ++$lp . "</a> -->
						<form method=\"post\">
						<input type=\"hidden\" name=\"patient_id\" value=$row[0]>
						<input type=\"submit\" class=\"btn btn-primary\" value=\"wybierz\">
						</form>
						";
		echo "</td>";
		for ($j=1; $j<sizeof($row);$j++){
			print " <td>$row[$j]</td> ";
		}
		print " </tr>";
	}
	print "</tbody>";
	print "</table>";
}

?>