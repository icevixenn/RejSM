<?php

session_start();
	
	require_once 'lang/conf_lang.php';
	require_once "lang/$lang/text.php";
	require_once 'pages/session.php';
	require_once 'header.php';
	require_once "menu.php";
	require_once "form/form_login.php";


// POWIADOMIENIA
		if ((isset($_GET['msgExp'])) && $_GET['msgExp']) // Wiadomość o wygaśnięciu sesji
		{
			echo '<div class="alert alert-danger">' . base64_decode(urldecode($_GET['msgExp'])) . '</div>';
		}
		if ((isset($_GET['msgLogout'])) && $_GET['msgLogout']) // Wiadomość o prawidłowym wylogowaniu użytkownika
		{
			echo '<div class="alert alert-success">' . base64_decode(urldecode($_GET['msgLogout'])) . '</div>';
		}
		if ((isset($_GET['msgErr'])) && $_GET['msgErr']) // Wiadomość o złym zalogowaniu
		{
			echo '<div class="alert alert-danger">' . base64_decode(urldecode($_GET['msgErr'])) . '</div>';
		}
// POWIADOMIENIA KONIEC	
?>

<!-- zamkniecie pierwszego okna (poczatek w menu.php) i otwarcie nowego (koniec w footer.php) -->
</div>
<div class="card mb-3">

<!-- Opis statusu (zalogowany/niezalogowany, szpital, jednostka etc.) -->
<?php require_once ('pages/status.php'); ?>

</div>
<div class="card mb-3">
<h6 align="center">
		<?php echo $cookies;?>	
</h6>

		

<!-- Stopka -->
<?php require_once "footer.php";?>


