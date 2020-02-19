<?php 
/*
 * Informacje o liczbie wpisów (pacjentów), rozdział na płeć
 * Osobne zapytania w zależności od zalogowanej osoby
 * Admin - wszystkie wpisy
 * Ordynator - wszystkie wpisy z danego szpitala
 * Lekarz - wszystkie wpisy lekarza
 */
	require_once '../db_tools/queryDB.php';

	function Patients_number()
	{
		$user_id = $_SESSION['user_id'];
		$hospital_id = $_SESSION['ID_hospital'];
		$user_permission =  $_SESSION['permit'];

		$query = "SELECT COUNT(*) AS entry FROM `AT_DemogData`
					WHERE ($user_permission = '2')
					OR ($user_permission = '0' AND ID_doctor = $user_id)
					OR ($user_permission = '1' AND ID_hospital = $hospital_id)
					";
		
		$query1 = "SELECT COUNT(*) AS men FROM `AT_DemogData`
					WHERE ($user_permission = '2' AND gender = '1')
					OR ($user_permission = '0' AND ID_doctor = $user_id AND gender = '1')
					OR ($user_permission = '1' AND ID_hospital = $hospital_id AND gender = '1')
					";
		
		$query2 = "SELECT COUNT(*) AS women FROM `AT_DemogData`
					WHERE ($user_permission = '2' AND gender = '2')
					OR ($user_permission = '0' AND ID_doctor = $user_id AND gender = '2')
					OR ($user_permission = '1' AND ID_hospital = $hospital_id AND gender = '2')
					";
				
		$result = queryDB($query);
		$result1 = queryDB($query1);
		$result2 = queryDB($query2);
		
		$entry = $result-> fetch_assoc();
		$women = $result2 ->fetch_assoc();
		$men = $result1-> fetch_assoc();
		
		
		print "Łącznie wpisów: <strong>";
		echo $entry['entry'];
		print "</strong><br> W tym kobiet: <strong>";
		echo $women['women'];
		print "</strong><br> Mężczyzn: <strong>";
		echo $men['men'];
		print "</strong>";

	}

?>

