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
?>
<!-- Powolne przejście miedzy fragmentami stron po ID --> 
<script src="../js/scroll.js"></script>

<?php
if (isset($_SESSION['patient_id'])){?>
<div class="card mb-3" id="#">
<div class="card-header"><h5>
     <i class="fa fa-heartbeat"></i> <?php echo $medical_history;?></h5>
</div></div>
<div class="card-body">




<!-- Info o zmianie danych -->
<?php 
if(isset($_SESSION['data_changed'])){
	echo '<div class="alert alert-success"><strong>' . $_SESSION['data_changed'] . '</strong></div>';
	unset($_SESSION['data_changed']);
}?>

<?php
$patient_id = $_SESSION['patient_id'];

// zapytania do bazy danych o dostępne opcje w formularzu
require_once '../form/form_medical_history_query.php';
// okno formularza edycji historii choroby (wywiadu)
require_once '../form/form_medical_history.php'; ?>
<!-- Walidacja formularza edycji historii choroby -->
<script src = "../js/validate_medical_history.js"></script>
	
</div>   
</div>


<?php } ?>

<!-- Stopka -->
<?php require_once "footer.php";?>
