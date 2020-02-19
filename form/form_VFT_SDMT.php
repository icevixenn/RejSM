<?php
/* Formularze edycji badania VFT oraz SDMT
 * Zapytania do bazy danych o dostępne opcje formularza w: form/form_VFT_SDMT_query.php
 * Dostępne są 4 formularze:
 * 1,2 - usunięcie oraz dodanie testu VFT (kolumna po lewej)
 * 3,4 - usunięcie oraz dodanie testu SDMT (kolumna po prawej)
 * Formularz edycji nr 1 w postaci tabeli
 */
?>

<div class="container">
<div class="row">
	<div class="column">
<!-- 1 FORM: DELETE VFT TEST  -->

			<!-- Przygotowanie tabeli DataTables po id = VFT -->       
			<script>
				$(document).ready(function() {
				    // DataTable
				    var table = $('#VFT').DataTable();	
				} );
			</script>
			<div class="heading">
			    <h3 class="form-heading"><?php echo $VFT_title?></h3><br>
			</div>
			<div class="text-center">
				<?php 
				// Tabela wyników VFT z możliwością usunięcia danego wpisu
				generateTableVFT(
						$labels, 	// Etykiety
						$VFT,	// Dane
						$id_table// ID tabelki do wyświetlenia
						);
				if(!$VFT) $VFT->free_result();
				?>
			</div>
		

		<br>
<!-- 2 FORM: ADD VFT TEST -->
		<form id="form_add_VFT" action="../db_tools/add_VFT.php" method="post" class="form-horizontal" role="form" style="display: block;">
			<div class="heading">
		    	<h5 class="form-heading"><?php echo $VFT_add?></h5><br>
		    </div>
		    <div class="form-group">
		    	<input type="hidden" name="id" value="<?php echo $patient_id ?>">
		    	<div class="form-group"><h6>
					<label for="date_add"><?php echo $add_date?></label>
					<input type="date" name="date_add" id="date_add" value="<?php echo date("Y-m-d");?>">
				</div>
				<div class="form-group"><h6>
					<label for="p_100"><?php echo $VFT_sat_100?></label>
					<input type="number" class="form-control" name="p_100" id="p_100" min="0" max="60">
				</h6></div>
				<div class="form-group"><h6>
					<label for="p_25"><?php echo $VFT_sat_25?></label>
					<input type="number" class="form-control" name="p_25" id="p_25" min="0" max="60">
				</h6></div>
				<div class="form-group"><h6>
					<label for="p_125"><?php echo $VFT_sat_125?></label>
					<input type="number" class="form-control" name="p_125" id="p_125" min="0" max="60">
				</h6></div>
				<div class="form-group"><h6>
					<label for="snellen"><?php echo $snellen?></label>
					<select class="form-control" name="snellen" id="snellen">
						<option value="20/200">20/200</option>
						<option value="20/160">20/160</option>
						<option value="20/125">20/125</option>
						<option value="20/100">20/100</option>
						<option value="20/80">20/80</option>
						<option value="20/64">20/64</option>
						<option value="20/50">20/50</option>
						<option value="20/40">20/40</option>
						<option value="20/32">20/32</option>
						<option value="20/25">20/25</option>
						<option value="20/20">20/20</option>
						<option value="20/16">20/16</option>
					</select>
				</div>
			</div>
			<div class="form-group"><h6>
				<button type="submit" name="add_T25FW" id="add_T25FW" class="btn btn-primary">
				<i class="fa fa-plus-circle"></i> <?php echo $add_entry?></button>
			</div>
		</form>
	</div>
	
	<div class="column">
<!-- 3 FORM: DELETE SDMT TEST  -->
		<form id="form_delete_SDMT" action="../db_tools/delete_SDMT.php" method="post" class="form-horizontal" role="form" style="display: block;">
			<div class="heading">
		    	<h3 class="form-heading"><?php echo $SDMT_title?></h3><br>
		    </div>
		    <div class="form-group"><h6>
				<label for="delete_SDMT"><?php echo $SDMT_test_added?>
				<a href="#" data-toggle="tooltip" data-placement="right" title="<?php echo $tooltip?>"><i class="fa fa-question-circle-o"></i></a>	
				</label>
			    <select multiple class="form-control" id="delete_SDMT" name="delete_SDMT[]">
			      <?php                       
			      if(!(mysqli_num_rows($result_SDMT)>0)) {
                                echo  '<option value="" disabled>Brak badań</option>';  
                            }
                            else {
                            	while($row_SDMT= $result_SDMT->fetch_assoc())
                            		echo  '<option value="'.$row_SDMT['ID_SDMT'].'">'.$row_SDMT['Date'].'&nbsp;'.$SDMT_result.$row_SDMT['Result'].'</option>';
                            }
				?>
			    </select>
			</div>
			<div class="form-group"><h6>
				<button type="submit" name="remove_SDMT" id="remove_SDMT" class="btn btn-primary" <?php if(!(mysqli_num_rows($result_SDMT)>0)) echo "disabled"?>>
				<i class="fa fa-times"></i> <?php echo $delete_entry?></button>
			</div>
		</form>
		<br>
<!-- 4 FORM: ADD SDMT TEST  -->
		<form id="form_add_SDMT" action="../db_tools/add_SDMT.php" method="post" class="form-horizontal" role="form" style="display: block;">
			<div class="heading">
		    	<h5 class="form-heading"><?php echo $SDMT_add?></h5><br>
		    </div>
		    <div class="form-group">
		    	<input type="hidden" name="id" value="<?php echo $patient_id ?>">
		    	<div class="form-group"><h6>
					<label for="date_add"><?php echo $add_date?></label>
					<input type="date" name="date_add" id="date_add" value="<?php echo date("Y-m-d");?>">
				</div>
				<div class="form-group"><h6>
					<label for="result"><?php echo $SDMT_result_txt?></label>
					<input type="number" class="form-control" name="result" id="result" min="0" max="100">
				</h6></div>
			</div>
			<div class="form-group"><h6>
				<button type="submit" name="add_SDMT" id="add_SDMT" class="btn btn-primary">
				<i class="fa fa-plus-circle"></i> <?php echo $add_entry?></button>
			</div>
		</form>
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

