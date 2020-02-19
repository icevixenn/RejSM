<?PHP
session_start();
/*
 * RMP - registry mail (for patient)
 * TODO dodanie nowego pacjenta do bazy danych
 * przesyłanie maila do admina z informacją o pojawieniu się nowego pacjenta
 * w bazie danych
 * na adres mailowy administratora
 */
@$rmp_admin_email = 'aga.tracz9@gmail.com';
$rmp_subject = "RejSM - Rejestracja nowego pacjenta";
$rmp_intro = "W bazie danych pojawił się nowy pacjent o następujących danych: ";
// TODO które dane powinno przesyłać?
$rmp_pesel = "Numer PESEL: " . $_POST['pesel'] . ", ";
$rmp_email1= "E-mail: " . $_POST['email1'] . ", ";
$rmp_password1= "Hasło: " . $_POST['password1'];

$rmp_header = "From: $rmp_email1 \r\n";

@$rmp_message = $rmp_intro . $rmp_pesel. $rmp_email1. $rmp_password1;


// TODO przesyłanie informacji - po dodaniu do bazy danych dopiero info przesłać 
if (mail($rmp_admin_email, $rmp_subject, $rmp_message, $rmp_header)){
	$_SESSION['mail'] = '2';
	header('Location: ../pages/register.php');}
	else {
		$_SESSION['mail'] = '3';
		header('Location: ../pages/register.php');
	}
	
	?>
