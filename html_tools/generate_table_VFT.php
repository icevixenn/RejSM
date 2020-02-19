<?php 

/** function generateTableVFT($labels, $result, $id)
 * \Funkcja generuje kod HTML tabelki na podstawie danych wejsciowych.
 *
 * Dewiacja od funkcji generateTable()
 * Pierwsza kolumna zawiera ukryty nr ID badania VFT (ID_VFT)
 * który jest w postaci formularza przesyłanego do pliku db_tools/delete_VFT.php
 * gdzie następuje usunięcie wpisu
 *
 * @param array $labels - Nazwy kolumn
 * @param Object $result - Dane do wyswietlenia w tabeli
 * @param string $id - ID tabelki
 * @return Opis zwracanej wartości
 */

function generateTableVFT($labels, $result, $id){
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
	//Wiersze tabeli
	$rowcount=mysqli_num_rows($result);
	for ($i=0;$i<$rowcount;$i++){
		print " <tr> ";
		$row = $result->fetch_row();
		echo   '
					<td>
						<form id="delete_VFT" action="../db_tools/delete_VFT.php" method="post">
						<input type="hidden" name="ID_VFT" value='.$row[0].'>
						<input type="submit" class="btn btn-primary" value="Usuń wpis">
						</form>
						';
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