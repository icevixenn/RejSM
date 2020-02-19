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
	unset($_SESSION['added_patient']);
} ?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">	

<div class="container">
	<div class="row">
		<div class="stepwizard">
		    <div class="stepwizard-row setup-panel">
<!-- KOLEJNE KROKI DODAWANIA NOWEGO PACJENTA -->
		        <div class="stepwizard-step">
		            <a href="#step-1" type="button" class="btn btn-default btn-circle" disabled="disabled">1</a>
		            <p><?php echo $np_step1?></p>
		        </div>
		        <div class="stepwizard-step">
		            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
		            <p><?php echo $np_step2?></p>
		        </div>
		        <div class="stepwizard-step">
		            <a href="#step-3" type="button" class="btn btn-primary btn-circle">3</a>
		            <p><?php echo $np_step3?></p>
		        </div>
		    </div>
		</div>
	</div>
</div>

<!-- Przekierowania na inne strony -->
<div class="container">
	<div class="form-group"><br>
		<h3><?php echo $np_registry_3;?></h3>
	</div>
	<div class="form-group"><br>
		<h4><?php echo $np_further_registry;?></h4>
	</div>

<br>

<!-- Cards: Demografic Data, Medical History, Diagnostics, Treatment and Resent Results -->
<div class="card-body">
<div class="card-deck">
		<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		  <div class="card-header"><a class="text-white" href="./treatment.php"><?php echo $menuTreatment;?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
		  <div class="card-body">
		    <h5 class="card-title"><?php echo $str_drug;?></h5>
		    <p class="card-text"><?php echo $str_drug_txt;?></p>
		  </div>
		</div>
		<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		  <div class="card-header"><a class="text-white" href="./EDSS.php"><?php echo $menuEDSS;?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
		  <div class="card-body">
		    <h5 class="card-title"><?php echo $str_test;?></h5>
		    <p class="card-text"><?php echo $str_EDSS;?></p>
		  </div>
		</div>
		<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		  <div class="card-header"><a class="text-white" href="./amb_indx.php"><?php echo $menuAmbIndx;?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
		  <div class="card-body">
		    <h5 class="card-title"><?php echo $str_test;?></h5>
		    <p class="card-text"><?php echo $str_AI;?></p>
		  </div>
		</div>
</div>
</div>
<!-- Cards: EDSS, Ambulation Index, MSFC, VFT/SDMT, BDI/FSS/MFIS -->
<div class="card-body">
<div class="card-deck">
		
		<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		  <div class="card-header"><a class="text-white" href="./MSFC.php"><?php echo $menuMSFC;?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
		  <div class="card-body">
		    <h5 class="card-title"><?php echo $str_test;?></h5>
		    <p class="card-text"><?php echo $str_MSFC;?></p>
		  </div>
		</div>
		<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		  <div class="card-header"><a class="text-white" href="./VFT_SDMT.php"><?php echo $menuVFT_SDMT;?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
		  <div class="card-body">
		    <h5 class="card-title"><?php echo $str_test;?></h5>
		    <p class="card-text"><?php echo $str_EDSS;?></p>
		  </div>
		</div>
		<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		  <div class="card-header"><a class="text-white" href="./BDI_FSS_MFIS.php"><?php echo $menuBDI_FSS;?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
		  <div class="card-body">
		    <h5 class="card-title"><?php echo $str_test;?></h5>
		    <p class="card-text"><?php echo $str_AI;?></p>
		  </div>
		</div>
</div>
</div>

</div>

<!-- Przekierowanie na stronę główną (home.php) -->
	<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
	  <div class="input-group">
	  </div>
	  <div class="input-group">
	    <a href="home.php" align="right" class="btn btn-primary btn-lg" role="button"><?php echo $back;?>
	    <i class="fa fa-undo"></i></a>
	  </div>
	</div>

<!-- Stopka -->
<?php require_once "footer.php";?>
