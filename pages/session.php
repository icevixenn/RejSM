<?php 

$now = time();			// czas trwania sesji w sekundach
$expiryTime = 1800;		// nowa sesja - ustaw czas początkowy sesji
if (!isset($_SESSION['last_trace']))
{
	$_SESSION['last_trace'] = $now;
}						// sesja wygasła
elseif ((int)$_SESSION['last_trace'] + $expiryTime < $now)
{
	$sessionName = session_name();
	$_SESSION = array();
	if (isset($_COOKIE[$sessionName]))
	{
		setcookie($sessionName, '', $now-3600, '/');
	}
	session_destroy();
	header('Location: ../index.php?msgExp=' . urlencode(base64_encode("Sesja wygasła! Zaloguj się ponownie.")));
}

?>