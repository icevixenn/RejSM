<?php
	session_start();
	session_destroy();
	header('Location: ../index.php?msgLogout=' . urlencode(base64_encode("Zostałeś prawidłowo wylogowany!")));
?>	