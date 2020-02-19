<?php 

	require_once 'generateRowTable.php';
	require_once '../db_tools/queryDB.php';

	function DemographicData($wartosc)
	{

		$query = "SELECT 
					    AN.Inicialy,
						PL.name_gender,
					    CONCAT(DB.year, '-', DB.month) AS 'Data urodzenia',
						MZ.name_address,
					    WO.name_province,
					    RE.name_hand,
					    PO.name_labor,
					    WY.name_education,
					    SR.name_family_status,
					    PZ.name_job,
					    ZA.name_employ,
					    SM.name_SM_in_family,
					    CASE
					        WHEN DB.date_death IS NULL THEN 'Nie dotyczy'
					    END AS 'Data zgonu'
					FROM
					    `AT_DemogData` AS DB
							JOIN
						01_FS_ID_anonim AS AN ON DB.ID = AN.ID_ID
							JOIN
						Name_gender AS PL ON DB.gender = PL.id_name_gender
							JOIN
						Name_address AS MZ ON DB.address = MZ.id_name_address
							JOIN
					    Name_province AS WO ON DB.province = WO.id_name_province
					        JOIN
						Name_hand AS RE ON DB.hand = RE.id_name_hand
							JOIN
						Name_labor AS PO ON DB.labor = PO.id_name_labor
							JOIN
						Name_education AS WY ON DB.education = WY.id_name_education
							JOIN
						Name_family_status AS SR ON DB.family_status = SR.id_name_family_status
							JOIN
						Name_job AS PZ ON DB.job = PZ.id_name_job
							JOIN
						Name_employ AS ZA ON DB.employ = ZA.id_name_employ
							JOIN
						Name_SM_in_family AS SM ON DB.SM_in_family = SM.id_name_SM_in_family
					WHERE
					    DB.ID = $wartosc ";
		
		
		$labels = array("Parametr", "Wartość");
		$id = '"demogr"';
		
		generateRowTable(
				
				$labels, 			// Etykiety
				queryDB($query),   	// Dane
				$id					// ID tabelki
				);
		
	}

?>