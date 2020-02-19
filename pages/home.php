<?php 

	session_start();
	
	if ((!isset($_SESSION['login'])) || ($_SESSION['logged_in']==false))
	{
		session_destroy();
		header('Location: ../index.php');
	}
	
	require_once '../lang/conf_lang.php';
	require_once '../html_tools/produce_no_patients.php';
	require_once "../lang/$lang/text.php";
	require_once '../db_tools/queryDB.php';
	require_once '../html_tools/generate_table_patients.php';
	require_once 'session.php';
	require_once 'header.php';
	require_once 'menu.php';
?>
<!-- Powolne przejście miedzy fragmentami stron po ID --> 
<script src="../js/scroll.js"></script>
<!-- Przygotowanie tabeli DataTables po id=patient -->       
<script>
$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    $('#patient tfoot th').each( function () {
	        var title = $(this).text();
	        $(this).html( '<input class="form-control" type="text" placeholder="Wyszukaj: '+title+'" />' );
	    } );
	 
	    // DataTable
	    var table = $('#patient').DataTable();
	 
	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );
	// jeśli wybrano pacjenta z tabeli -> scroll do tabeli danych demograf pacjenta
	var theHash = "#patient_data";
	$('html, body').stop().animate({
		scrollTop: $(theHash).offset().top
	}, 1500,'easeInOutExpo');
	event.preventDefault();	
	} );
</script>

<!-- Status Wpisów -->
<div class="card-header"><h5>
     <i class="fa fa-list"></i><?php echo $entry_status;?></h5></div>
<div class="card-body">
   
<?php Patients_number(); ?>

</div>
</div>

<!-- Tabela pacjentów -->
<div class="card mb-3" id="PatientTable">
<div class="card-header"><h5>
     <i class="fa fa-table"></i><?php echo $patient_table;?></h5></div>
<div class="card-body">
<?php require_once '../html_tools/produce_patients_table.php';?>
</div>   
</div>

<!-- Wybór informacji wybranego pacjenta -->
<?php
if (isset($_POST['patient_id'])){
$_SESSION['patient_id'] = $_POST['patient_id'];
?>
<div class="card-header" id="patient_data"><h5>
     <i class="fa fa-address-card-o"></i><?php echo $str; ?></h5></div>
</div>
<!-- Cards: Demografic Data, Medical History, Diagnostics, Treatment and Resent Results -->
<div class="card-body">
<div class="card-deck">
        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		  <div class="card-header"><a class="text-white" href="./demografic_data.php"><?php echo $menuDemograficData;?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
		  <div class="card-body">
		    <h5 class="card-title"><?php echo $str_info;?></h5>
		    <p class="card-text"><?php echo $str_info_txt;?></p>
		  </div>
		</div>
		<br>
		<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		  <div class="card-header"><a class="text-white" href="./medical_history.php"><?php echo $menuMedHistory;?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
		  <div class="card-body">
		    <h5 class="card-title"><?php echo $str_hist;?></h5>
		    <p class="card-text"><?php echo $str_hist_txt;?></p>
		  </div>
		</div>
		<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		  <div class="card-header"><a class="text-white" href="./diagnostics.php"><?php echo $menuDiagnostic;?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
		  <div class="card-body">
		    <h5 class="card-title"><?php echo $str_diagn;?></h5>
		    <p class="card-text"><?php echo $str_diagn_txt;?></p>
		  </div>
		</div>
		<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		  <div class="card-header"><a class="text-white" href="./treatment.php"><?php echo $menuTreatment;?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
		  <div class="card-body">
		    <h5 class="card-title"><?php echo $str_drug;?></h5>
		    <p class="card-text"><?php echo $str_drug_txt;?></p>
		  </div>
		</div>
		<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		  <div class="card-header"><a class="text-white" href="./resent_results.php"><?php echo $menuResentResult;?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
		  <div class="card-body">
		    <h5 class="card-title"><?php echo $str_no_edit;?></h5>
		    <p class="card-text"><?php echo $str_no_edit_txt;?></p>
		  </div>
		</div>
</div>

<div class="card-header" id="clinimetrics"><h5>
     <i class="fa fa-address-card-o"></i><?php echo ' ' . $menuClinimetrics; ?></h5></div>
</div>
<!-- Cards: EDSS, Ambulation Index, MSFC, VFT/SDMT, BDI/FSS/MFIS -->
<div class="card-body">
<div class="card-deck">
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

<?php } ?>

<div class="card mb-3">
<div class="card-body">
<!-- Opis statusu (zalogowany/niezalogowany, szpital, jednostka etc.) -->
<?php require_once 'status.php'; ?>
<!-- Stopka -->
<?php require_once "footer.php";?>
