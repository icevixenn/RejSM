<?php 

/** function generateTable($labels, $result)
 * \Funkcja generuje kod HTML tabelki na podstawie danych wejsciowych.
 *
 * Specyficzna tabela zawierająca dwie kolumny: pierwsza to kolumny z bazy danych,
 * druga to odpowiadająca im wartość wiersza
 * Tabelka po ID pacjenta pobiera jego dane demograficzne
 *
 * @param array $labels - Nazwy kolumn
 * @param Object $result - Dane do wyswietlenia w tabeli.
 * @param string $id - ID tabelki
 * @return Opis zwracanej wartości
 */
function generateRowTable($labels, $result, $id){

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
	
	$columns = array("Inicjały", "Płeć", "Data urodzenia", "Miejsce zamieszkania",
			"Województwo", "Ręczność", "Porody", "Wykształcenie", "Stan Rodzinny",
			"Praca / Zarobek", "Zatrudnienie", "SM w rodzinie", "Data zgonu");
	// Drukuj tresc

	$rowcount=mysqli_num_rows($result);

	for ($i=0;$i<$rowcount;$i++){
			
		$row = $result->fetch_row();
		
		for ($j=0; $j<sizeof($row);$j++){
			print " <tr>
					<td>$columns[$j]</td>
					<td>$row[$j]</td></tr>";
		}		
	}

	print "</tbody>";
	print "</table>";
}

?>

