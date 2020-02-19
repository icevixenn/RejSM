<?PHP
session_start();
/*
 * RM - registry mail
 * Obsługa przesyłania formularza rejestracji 
 * na adres mailowy administratora
 */

@$rm_admin_email = 'aga.tracz9@gmail.com';
$rm_subject = "RejSM - Prośba lekarza o rejestrację";
$rm_intro = "Formularz rejestracji wypełniony następującymi danymi: ";
$rm_name = "Imię: " . $_POST['name'] . ", ";
$rm_surname= "Nazwisko: " . $_POST['surname'] . ", ";
$rm_email= "E-mail: " . $_POST['email'] . ", ";
$rm_hospital= "Szpital: " . $_POST['hospital'] . ", ";
$rm_password= "Hasło: " . $_POST['password'];
$rm_header = "From: $rm_email \r\n";

@$rm_message = $rm_intro . $rm_name . $rm_surname . $rm_email . $rm_hospital . $rm_password;

if (mail($rm_admin_email, $rm_subject, $rm_message, $rm_header)){
	$_SESSION['mail'] = '1';
	header('Location: ../pages/register.php');}
	else {
		$_SESSION['mail'] = '0';
		header('Location: ../pages/register.php');
	}
	
?>
