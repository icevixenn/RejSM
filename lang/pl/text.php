<?php 	
//tytuły
	$app	= "Rejestr SM";
	$title 	= "Rejestr Chorych ze Stwardnieniem Rozsianym";

//stopka	
	$stopka = "Nadzór merytoryczny: dr n. med. Waldemar Brola, dr n. med. Małgorzata Fudala <br>
	          Wykonanie strony: mgr inż. Agnieszka Tracz";
// Ogólne
	$txt_error = "<br>Błąd: ";
	
//Logowanie
	$lgLog 			= "Logowanie";
    $lgEmailLab 	= "Podaj swój adres e-mail";
    $lgEmail 		= "Podaj e-mail"; 
	$lgPassLab 		= "Podaj swoje hasło";
	$lgPass 		= "Hasło";
	$lgAs			= "Jako:";
	$lgDoctor		= "Lekarz ";
	$lgPatient		= "Pacjent ";
	$lgForget 		= "Zapomniałeś hasła? ";
	$lgRej		 	= "Zarejestruj się";
	
//menu
	$menuSM			= "Stwardnienie Rozsiane";
	$menuAbout		= "O Rejestrze";
	$menuRegister 	= "Zarejestruj się";
	$menuLogout 	= "Wyloguj się";
	$menuLogin 		= "Zaloguj się";
	$menuNewPatient = "Dodaj nowego pacjenta";
	$menuPatientTable = "Tabela pacjentów";
	$menuPatientData = "Dane pacjenta";
	$menuDemograficData = "Dane demograficzne";
	$menuMedHistory = "Wywiad";
	$menuDiagnostic = "Diagnostyka";
	$menuTreatment = "Leczenie";
	$menuResentResult = "Aktualne wyniki";
	$menuClinimetrics = "Ocena klinimetryczna";
	$menuEDSS = "EDSS";
	$menuAmbIndx = "Ambulation Index";
	$menuMSFC = "MSFC";
	$menuVFT_SDMT = "VFT / SDMT";
	$menuBDI_FSS = "BDI-II / FSS / MFIS";
	$menuStats = "Statystyki";
	
// Titles

	$title_MSFC = "MSFC - Multiple Sclerosis Functional Composite";
	$title_AI = "Ambulation Index";
	$title_EDSS = "EDSS - Expanded  Disability  Status  Scale";
	$title_VFT_SDMT = "VFT - Visual Function Test, SDMT - Symbol Digit Modalities Test";
	$title_BDI_FSS_MFIS = "BDI - Beck  Depression Inventory, 
							FSS - Fatigue Severity Scale,
							MFIS - Modified Fatigue Impact Scale";
	
// Logout

	$end_session = "Zakończ sesję";
	$sure_logout = "Czy na pewno chcesz się wylogować?";
	$back_out = "Anuluj";
	$logout = "Wyloguj";
	
// Wybór strony

	$str = " Dane pacjenta:";
	$str_info = "Informacje:";
	$str_hist = "Historia pacjenta:";
	$str_diagn = "Badania:";
	$str_drug = "Leki pacjenta";
	$str_no_edit = "Brak edycji";
	$str_test = "Wyniki testów:";
	$str_info_txt = "Data urodzenia, płeć, edukacja, praca, miasto etc.";
	$str_hist_txt = "Postać SM, współistniejące choroby etc.";
	$str_diagn_txt = "MRI, CSF, badanie potencjałów wzrokowych";
	$str_drug_txt = "Leki na SM, leki na współistniejące choroby";
	$str_no_edit_txt = "Najnowsze wpisane wyniki pacjenta";

	$str_EDSS = "Szczegółowy wynik z datą badania";
	$str_AI = "Wynik z datą";
	$str_MSFC = "25FW, PASAT, 9Hole";

//Status
	$status[ 0]	= "Niezalogowany";
	$status[ 1]	= "Zalogowany->";
	$permit[0] = "Lekarz";
	$permit[1] = "Ordynator";
	$permit[2] = "Admin";
	$st_status = "<h6><strong>Status:</strong> ";
	$st_permission = "<strong> Uprawnienia: </strong>";
	$st_unit = "<strong>Jednostka: </strong>";
	
// Podpisy tabel

	$entry_status = " Status Wpisów";
	$patient_table = " Tabela pacjentów";
	$demografic_data = " Dane demograficzne pacjenta";
	$medical_history = "Wywiad pacjenta";
	$diagnostics = "Diagnostyka";
	$treatment = "Leczenie";

// Modyfikacja danych

	$edit_sure = "Czy na pewno chcesz edytować dane?";
	$edit = "Edycja danych";
	$edit_back = "Anuluj";
	$back = "Strona główna";
	
// Tooltip

	$tooltip = "By zaznaczyć kilka wpisów wciśnij CTRL";
	
// index.php -> info o wykorzystywaniu ciasteczek

	$cookies = 'UWAGA !<br>
			Witryna wykorzystuje ciasteczka. Bez nich nie będzie działać poprawnie.<br>
			Witryna służy lekarzom i pacjentom do uzupełniania Rejestru Stwardnienia Rozsianego.<br>
			Wszystkie próby logowania się są monitorowane.<br><br>
			Podejmując próbę logowania wyrażasz zgodę na powyższe. <br><br>
			Jeżeli znalazłeś się tutaj przypadkiem możesz opuścić witrynę klikając np. 
			<a href="https://pl.wikipedia.org/wiki/Stwardnienie_rozsiane">tutaj</a>';
	

?>