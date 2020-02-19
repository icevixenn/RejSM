<?php 
/* Resent Result: wyświelenie najnowszych wyników pacjenta
 * Zapytania do bazy danych w: form/form_resent_results_query.php
 */
?>

<div class="container">
<div class="row">
	<div class="column">
<!-- STAN FUNKCJONALNY  -->
			<div class="heading">
		    	<h3 class="form-heading"><?php echo $RR_funcional?></h3><br>
		    </div>
		    <div class="form-group"><h6>
			EDSS: <?php if(empty($EDSS)) {echo $RR_empty;} else {echo $EDSS;} ?> <br><br>
			Ambulation Index: <?php if(empty($AI)) {echo $RR_empty;} else {echo $AI;} ?> <br><br>
			</h6><h5>
			MSFC: <br><br></h5><h6>
			&emsp;T25FT: <?php if(empty($T25FT)) {echo $RR_empty;} else {echo $T25FT;} ?> <br><br>
			&emsp;9HPT-DH: <?php if(empty($H9PT_dh)) {echo $RR_empty;} else {echo $H9PT_dh;} ?> <br><br>
			&emsp;9HPT-NDH: <?php if(empty($H9PT_ndh)) {echo $RR_empty;} else {echo $H9PT_ndh;} ?> <br><br>
			&emsp;PASAT: <?php if(empty($PASAT)) {echo $RR_empty;} else {echo $PASAT;} ?> <br><br><br>
			VFT: <?php if(empty($VFT)) {echo $RR_empty;} else {echo $VFT;} ?> <br><br>
			SDMT: <?php if(empty($SDMT)) {echo $RR_empty;} else {echo $SDMT;} ?> <br><br>
			</h6>
			</div>
	</div>	
<!-- ZMĘCZENIE I DEPRESJA -->
	<div class="column">
			<div class="heading">
		    	<h3 class="form-heading"><?php echo $RR_deppresion?></h3><br>
		    </div>
		    <div class="form-group"><h6>
		    BDI-II: <?php if(empty($BDI)) {echo $RR_empty;} else {echo $BDI;} ?> <br><br>
		    FSS: <?php if(empty($FSS)) {echo $RR_empty;} else {echo $FSS;} ?> <br><br>
		    MFIS: <?php if(empty($MFIS)) {echo $RR_empty;} else {echo $MFIS;} ?> <br><br>
		    </h6>
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

