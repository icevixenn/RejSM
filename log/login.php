<?php
	session_start();
	
	require_once('../db_tools/connectToDB.php');
	
	
	//TODO zrobić osobną stronę po zalogowaniu pacjenta
	//TODO przekierowanie na logowanie pacjenta, osobne zapytanie do bazy danych, inna tabela
	
/*
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])) || ($_POST['LogujJako'] == 2))
	{
		if($_POST['LogujJako'] == 2) // Próba logowania jako pacjent - chwilowo pacjent niedostępny
		header('Location: ../index.php');
		exit();
	}
*/
	
	//Wywołanie funkcji łączenia z bazą - tylko tam pobierane są parametry połączenia
	$baza = connectToDB();
	
	if ($baza->connect_errno!=0)
	{
		echo "Error: ".$baza->connect_errno . "<br>" . $baza->connect_error;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
//Zapytanie o prawdziwość hasła i loginu
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		
		$query_login = "SELECT * FROM AT_Doctor WHERE email='%s' ";

		$query_login_checked = sprintf($query_login, mysqli_real_escape_string($baza, $login));
		
		$wynik = $baza->query($query_login_checked);
		if(!$wynik) die($baza->error);

		if ($wynik)
		{
			$ilu_userow = $wynik->num_rows;
			if($ilu_userow==1)
			{
				$wiersz = $wynik->fetch_assoc();
				
//if (password_verify($haslo, $wiersz['pass']))
				if (md5($haslo) == $wiersz['password'])
				{
					$user_id = $wiersz['ID_doctor'];
					//echo md5($haslo) . "<<>>" . $wiersz['UserPassword'];
					unset($_SESSION['error']);
					
					$_SESSION['status'] = 1;
					$_SESSION['login'] = $login;
					$_SESSION['logged_in'] = true;
					$_SESSION['user_id'] = $user_id;
					$_SESSION['permit'] = $wiersz['admin'];
					
//Zapytanie o szpital i takie tam inne


					$query_doc_hosp= "SELECT H.name_hospital, H.city, H.ID_hospital
										FROM `AT_doc_hosp` AS DH
										INNER JOIN `AT_Hospital` AS H
											ON DH.ID_hospital = H.ID_hospital
										INNER JOIN `AT_Doctor` AS D
											ON DH.ID_doctor = D.ID_doctor
										WHERE D.ID_doctor =%d";
					
					$query_doc_hosp_checked = sprintf($query_doc_hosp, $user_id);
					
					$wynik = $baza->query($query_doc_hosp_checked);
					if(!$wynik) die($baza->error);
								
					$wiersz = $wynik->fetch_assoc();
					
					$_SESSION['ID_hospital'] = $wiersz['ID_hospital'];
					$_SESSION['name_hospital'] = $wiersz['name_hospital'];
					$_SESSION['city'] = $wiersz['city'];


//					$wynik->free_result();					
					header('Location: ../pages/home.php');
				}
				else 
				{
					header('Location: ../index.php?msgErr=' . urlencode(base64_encode("Nieprawidłowy login lub hasło!")));
				}
				
			} else {				
				header('Location: ../index.php?msgErr=' . urlencode(base64_encode("Nieprawidłowy login lub hasło!")));
			}			
		}		
		$baza->close();
	}	
?>