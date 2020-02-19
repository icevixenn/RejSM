<?php
	$lp 	= 0; 

		$offset		= 700; // liczba wyświetlanych wyników
		$id_patient = 'patient'; // ID do tabelki pacjentów
	
		$user_id = $_SESSION['user_id'];
		$hospital_id = $_SESSION['ID_hospital'];
		$user_permission =  $_SESSION['permit'];

		$sqlDemogData =	"SELECT
						    D.ID,
						    AN.Inicialy,
						    GE.name_gender,
						    CONCAT(D.year, '-', D.month),
	                        CONCAT(MD.name, ' ', MD.surname),
						    CONCAT(HOS.shortcut, '...'),
						    HOS.city
						FROM
						    `AT_DemogData` AS D
								JOIN
							Name_gender AS GE ON D.gender = GE.id_name_gender
								JOIN
							01_FS_ID_anonim AS AN ON D.ID = AN.ID_ID
						        INNER JOIN
						    `AT_Hospital` AS HOS ON HOS.ID_hospital = D.ID_hospital
								JOIN
							AT_Doctor AS MD ON D.ID_doctor = MD.ID_doctor
								JOIN
							AT_doc_hosp AS DH ON D.ID_doctor = DH.ID_doctor
						WHERE ($user_permission = '2')
						 OR ($user_permission = '0' AND D.ID_doctor = $user_id)
						 OR ($user_permission = '1' AND D.ID_hospital = $hospital_id)
						ORDER BY D.ID";
		
// ewentualny limit po ORDER "Limit %d, %d"
		
		$query = sprintf($sqlDemogData, $lp, $offset);
//		echo "##" . $query . "##";
		$result= queryDB($query);

// Tabela z danymi demograficznymi - inicjalizacja nagłówków tabeli (musi być zgodna z liczba wyników!)
		$labels= array("Lp.", "Inicjały", "Płeć", "Data urodzenia", "Lekarz", "Szpital", "Miasto");

		generateTableButton(
				
				$labels, 	// Etykiety
				$result,	// Dane
				$lp,		//
				$id_patient // ID tabelki do wyświetlenia
				);
		
		if(!$result)
			$result->free_result();
?>