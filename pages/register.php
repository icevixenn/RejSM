<?php

session_start();

require_once '../lang/conf_lang.php';
require_once "../lang/$lang/text.php";
require_once './session.php';
require_once './header.php';
require_once "./menu.php";

?>


<!-- Wyświetlanie informacji po przesłaniu formularza rejestracji -->
<script type="text/javascript">
function ok()
{alert("Prośba o rejestrację została wysłana do administratora. W przeciągu kilku dni dostaną Państwo potwierdzenie na podany adres mailowy o założeniu konta. Dziękujemy za skorzystanie z Rejestru.");}
function not_ok()
{alert("Wystąpił problem. Przepraszamy za niedogodności i prosimy spróbować później.");	}
</script>

<?php 
if(isset($_SESSION['mail'])){
	if($_SESSION['mail']==0){
		echo '
            <script type="text/javascript">
            not_ok();
            </script>
        ';	
		unset ($_SESSION['mail']);
	}
	else if($_SESSION['mail']==1){
		echo '
            <script type="text/javascript">
            ok();
            </script>
        ';
		unset ($_SESSION['mail']);
	}
}
?>

<!-- Okno formularza rejestracji pacjentów -->
<?php require_once '../form/form_register.php'; ?>

<!-- Walidacja formularza rejestracji dla lekarza -->
<script src = "../js/validate_register_doctor.js"></script>

<!-- Walidacja formularza rejestracji dla pacjenta -->
<script src = "../js/validate_register_patient.js"></script>

<!-- Stopka -->
<?php require_once "./footer.php";?>
