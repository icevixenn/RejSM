<?php 
session_start();

if ((!isset($_SESSION['login'])) || ($_SESSION['logged_in']==false))
{
	session_destroy();
	header('Location: ../index.php');
}
require_once '../lang/conf_lang.php';
require_once "../lang/$lang/text.php";
require_once 'session.php';
require_once 'header.php';
require_once 'menu.php';
require_once "../lang/$lang/form_new_patient.php";
?>
<!-- Powolne przejście miedzy fragmentami stron po ID --> 
<script src="../js/scroll.js"></script>
<!-- zamkniecie pierwszego okna (poczatek w menu.php) i otwarcie nowego (koniec w footer.php) -->

<!-- POCZĄTEK REJESTRACJI -->
<div class="card-header">
	<h3><i class="fa fa-plus"></i> <?=$np?></h3>
</div>
<div class="card-body">

<!-- Info o zmianie danych -->
<?php 
if(isset($_SESSION['added_patient'])){
	echo '<div class="alert alert-success"><strong>' . $_SESSION['added_patient'] . '</strong></div>';
} ?>


<!-- Walidacja formularza rejestracji dla lekarza -->
<script src = "../js/validate_add_patient.js"></script>

<?php require_once "../form/form_new_patient_query.php";?>
<?php require_once "../form/form_new_patient.php";?>



<!-- Stopka -->
<?php require_once "footer.php";?>
