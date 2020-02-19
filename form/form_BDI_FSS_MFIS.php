<?php
/* Formularze edycji badania BDI-II, FSS, MFIS
 * Zapytania do bazy danych o dostępne opcje formularza w: form/form_BDI_FSS_MFIS_query.php
 * Dostępne jest 6 formularzy:
 * 1,2 - usunięcie oraz dodanie testu BDI-II (kolumna 1 po lewej)
 * 3,4 - usunięcie oraz dodanie testu FSS (kolumna 2 po prawej)
 * 5,6 - usunięcie oraz dodanie testu MFIS (poniżej, na całej szerokości)
 * Formularz edycji nr 5 w postaci tabeli
 */
?>

<div class="container">
<div class="row">
	<div class="column">
<!-- 1 FORM: DELETE BDI-II TEST  -->
		<form id="form_delete_BDI" action="../db_tools/delete_BDI.php" method="post" class="form-horizontal" role="form" style="display: block;">
			<div class="heading">
		    	<h3 class="form-heading"><?php echo $BDI_title?></h3><br>
		    </div>
		    <div class="form-group"><h6>
				<label for="delete_BDI"><?php echo $added_test_results?>
				<a href="#" data-toggle="tooltip" data-placement="right" title="<?php echo $tooltip?>"><i class="fa fa-question-circle-o"></i></a>	
				</label>
			    <select multiple class="form-control" id="delete_BDI" name="delete_BDI[]">
			      <?php                       
			      if(!(mysqli_num_rows($result_BDI)>0)) {
                                echo  '<option value="" disabled>Brak badań</option>';  
                            }
                            else {
                            	while($row_BDI = $result_BDI->fetch_assoc())
                            		echo  '<option value="'.$row_BDI['ID_BDI'].'">'.$row_BDI['Date'].'&nbsp;'.$result.$row_BDI['Result'].'</option>';
                            }
				?>
			    </select>
			</div>
			<div class="form-group"><h6>
				<button type="submit" name="remove_BDI" id="remove_BDI" class="btn btn-primary" <?php if(!(mysqli_num_rows($result_BDI)>0)) echo "disabled"?>>
				<i class="fa fa-times"></i> <?php echo $delete_entry?></button>
			</div>
		</form>
		<br>
<!-- 2 FORM: ADD BDI-II TEST -->
		<form id="form_add_BDI" action="../db_tools/add_BDI.php" method="post" class="form-horizontal" role="form" style="display: block;">
			<div class="heading">
		    	<h5 class="form-heading"><?php echo $BDI_add?></h5><br>
		    </div>
		    <div class="form-group">
		    	<input type="hidden" name="id" value="<?php echo $patient_id ?>">
		    	<div class="form-group"><h6>
					<label for="date_add"><?php echo $add_date?></label>
					<input type="date" name="date_add" id="date_add" value="<?php echo date("Y-m-d");?>">
				</div>
				<div class="form-group"><h6><br>
					<label for="result"><?php echo $result?></label>
					<select class="form-control" name="result" id="result">
						<?php for ($i = 0; $i <= 10; $i++) : ?>
				        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				    	<?php endfor; ?>
					</select>
				</div>
			</div>
			<div class="form-group"><h6>
				<button type="submit" name="add_BDI" id="add_BDI" class="btn btn-primary">
				<i class="fa fa-plus-circle"></i> <?php echo $add_entry?></button>
			</div>
		</form>
	</div>
	
	<div class="column">
<!-- 3 FORM: DELETE FSS TEST  -->
		<form id="form_delete_FSS" action="../db_tools/delete_FSS.php" method="post" class="form-horizontal" role="form" style="display: block;">
			<div class="heading">
		    	<h3 class="form-heading"><?php echo $FSS_title?></h3><br>
		    </div>
		    <div class="form-group"><h6>
				<label for="delete_FSS"><?php echo $added_test_results?>
				<a href="#" data-toggle="tooltip" data-placement="right" title="<?php echo $tooltip?>"><i class="fa fa-question-circle-o"></i></a>	
				</label>
			    <select multiple class="form-control" id="delete_FSS" name="delete_FSS[]">
			      <?php                       
			      if(!(mysqli_num_rows($result_FSS)>0)) {
                                echo  '<option value="" disabled>Brak badań</option>';  
                            }
                            else {
                            	while($row_FSS = $result_FSS->fetch_assoc())
                            		echo  '<option value="'.$row_FSS['ID_FSS'].'">'.$row_FSS['Date'].'&nbsp;'.$result. $row_FSS['Result'].'</option>';
                            }
				?>
			    </select>
			</div>
			<div class="form-group"><h6>
				<button type="submit" name="FSS_PASAT" id="FSS_PASAT" class="btn btn-primary" <?php if(!(mysqli_num_rows($result_FSS)>0)) echo "disabled"?>>
				<i class="fa fa-times"></i> <?php echo $delete_entry?></button>
			</div>
		</form>
		<br>
<!-- 4 FORM: ADD FSS TEST  -->
		<form id="form_add_FSS" action="../db_tools/add_FSS.php" method="post" class="form-horizontal" role="form" style="display: block;">
			<div class="heading">
		    	<h5 class="form-heading"><?php echo $FSS_add?></h5><br>
		    </div>
		    <div class="form-group">
		    	<input type="hidden" name="id" value="<?php echo $patient_id ?>">
		    	<div class="form-group"><h6>
					<label for="date_add"><?php echo $add_date?></label>
					<input type="date" name="date_add" id="date_add" value="<?php echo date("Y-m-d");?>">
				</div>
				<div class="form-group"><h6><br>
					<label for="result"><?php echo $result?></label>
					<select class="form-control" name="result" id="result">
						<?php for ($i = 0; $i <= 10; $i++) : ?>
				        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				    	<?php endfor; ?>
					</select>
				</div>
			</div>
			<div class="form-group"><h6>
				<button type="submit" name="add_FSS" id="add_FSS" class="btn btn-primary">
				<i class="fa fa-plus-circle"></i> <?php echo $add_entry?></button>
			</div>
		</form>
	</div>
</div>
</div>	
<!-- 5 FORM: DELETE MFIS TEST  -->
<div class="container">
<div class="row">
<div class="column">
	<!-- Przygotowanie tabeli DataTables po id = MFIS -->       
	<script>
		$(document).ready(function() {
		    // DataTable
		    var table = $('#MFIS').DataTable();	
		} );
	</script>
	<div class="heading">
	    <h3 class="form-heading"><?php echo $MFIS_title?></h3><br>
	</div>
	<div class="text-center">
		<?php 
		// Tabela wyników MFIS z możliwością usunięcia danego wpisu
		generateTableMFIS(
				$labels, 	// Etykiety
				$MFIS,	// Dane
				$id_table// ID tabelki do wyświetlenia
				);
		if(!$MFIS) $MFIS->free_result();
		?>
	</div>
<!-- 6 FORM: ADD MFIS TEST  -->
	<form id="form_add_MFIS" action="../db_tools/add_MFIS.php" method="post" class="form-horizontal" role="form" style="display: block;">
<br><br>
		<div class="heading">
	    	<h4 class="form-heading"><?php echo $MFIS_add?></h4><br>
	    </div>
	    <div class="form-group">
		    <input type="hidden" name="id" value="<?php echo $patient_id ?>">
	    	<div class="form-group"><h6>
				<label for="date_add"><?php echo $add_date?></label>
				<input type="date" name="date_add" id="date_add" value="<?php echo date("Y-m-d");?>">
			</div>
			<div class="form-group"><h6><br>
				<label for="physical"><?php echo $MFIS_phys_txt?></label>
				<select class="form-control" name="physical" id="physical">
					<?php for ($i = 0; $i <= 10; $i++) : ?>
			        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			    	<?php endfor; ?>
				</select>
			</div>
			<div class="form-group"><h6><br>
				<label for="cognitive"><?php echo $MFIS_cogn_txt?></label>
				<select class="form-control" name="cognitive" id="cognitive">
					<?php for ($i = 0; $i <= 10; $i++) : ?>
			        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			    	<?php endfor; ?>
				</select>
			</div>
			<div class="form-group"><h6><br>
				<label for="social"><?php echo $MFIS_social_txt?></label>
				<select class="form-control" name="social" id="social">
					<?php for ($i = 0; $i <= 10; $i++) : ?>
			        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			    	<?php endfor; ?>
				</select>
			</div>
		</div>
		<div class="form-group"><h6>
			<button type="submit" name="add_MFIS" id="add_MFIS" class="btn btn-primary">
			<i class="fa fa-plus-circle"></i> <?php echo $add_entry?></button>
		</div>
	</form>
</div>		
</div>
</div>

<div class="container">
<!-- Przekierowanie na stronę główną (home.php) -->
	<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
	  <div class="input-group">
	  </div>
	  <div class="input-group">
	    <a href="home.php" align="right" class="btn btn-primary btn-lg" role="button"><?php echo $back;?>
	    <i class="fa fa-undo"></i></a>
	  </div>
	</div>
</div>

