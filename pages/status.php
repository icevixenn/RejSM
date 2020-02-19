<?php
/*
 * Wyświetla informacje: Status: zalogowany/niezalogowany -> e-mail,
 * Uprawnienia: admin/ordynator/lekarz, Jednostka: szpital + miasto
 * 
 * Z pliku text.php info: status[0] - niezalogowany, status[1] - zalogowany
 */


			if ((!isset($_SESSION['login'])) && (!isset($_SESSION['logged_in'])))
			{
				unset($_SESSION['status']);
				$status_id = 0;
			}else{
				$status_id = $_SESSION['status'];
			}

			echo $st_status . $status[$status_id];
			if(isset($_SESSION['logged_in'])) {
			echo (($_SESSION['logged_in']) ? $_SESSION['login'] . 
					$st_permission. $permit[$_SESSION['permit']] . 
					"<br>" . $st_unit. $_SESSION['name_hospital'] .
					", " . $_SESSION['city'] : "</h6>");  
			}
			
			if(isset($_SESSION['error'])){
				echo $txt_error. $_SESSION['error'];
			}
?>