<?php
/* Formularze edycji badania MSFC: T25FW, PASAT, 9HPT
 * Zapytania do bazy danych o dostępne opcje formularza w: form/form_MSFC_query.php
 * Dostępne jest 6 formularzy:
 * 1,2 - usunięcie oraz dodanie testu T25FW (kolumna 1 po lewej)
 * 3,4 - usunięcie oraz dodanie testu PASAT (kolumna 2 po prawej)
 * 5,6 - usunięcie oraz dodanie testu 9HPT (poniżej, na całej szerokości)
 * Formularz edycji nr 5 w postaci tabeli
 */
?>

<div class="container">
<div class="row">
	<div class="column">
<!-- 1 FORM: DELETE T25FW TEST  -->
		<form id="form_delete_T25FW" action="../db_tools/delete_T25FW.php" method="post" class="form-horizontal" role="form" style="display: block;">
			<div class="heading">
		    	<h3 class="form-heading"><?php echo $MSFC_T25FW?></h3><h5><?php echo $T25FW?></h5><br>
		    </div>
		    <div class="form-group"><h6>
				<label for="delete_T25FW"><?php echo $MSFC_title?>
				<a href="#" data-toggle="tooltip" data-placement="right" title="<?php echo $tooltip?>"><i class="fa fa-question-circle-o"></i></a>	
				</label>
			    <select multiple class="form-control" id="delete_T25FW" name="delete_T25FW[]">
			      <?php                       
			      if(!(mysqli_num_rows($result_T25FW)>0)) {
                                echo  '<option value="" disabled>Brak badań</option>';  
                            }
                            else {
                            	while($row_T25FW = $result_T25FW->fetch_assoc())
                            		echo  '<option value="'.$row_T25FW['ID_25FWT'].'">'.$row_T25FW['date'].'&nbsp;'.$I_try.$row_T25FW['I_try'].'&nbsp;'.$II_try.$row_T25FW['II_try'].'</option>';
                            }
				?>
			    </select>
			</div>
			<div class="form-group"><h6>
				<button type="submit" name="remove_T25FW" id="remove_T25FW" class="btn btn-primary" <?php if(!(mysqli_num_rows($result_T25FW)>0)) echo "disabled"?>>
				<i class="fa fa-times"></i> <?php echo $delete_entry?></button>
			</div>
		</form>
		<br>
<!-- 2 FORM: ADD T25FW TEST -->
		<form id="form_add_T25FW" action="../db_tools/add_T25FW.php" method="post" class="form-horizontal" role="form" style="display: block;">
			<div class="heading">
		    	<h5 class="form-heading"><?php echo $add_test?></h5><br>
		    </div>
		    <div class="form-group">
		    	<input type="hidden" name="id" value="<?php echo $patient_id ?>">
		    	<div class="form-group"><h6>
					<label for="date_add"><?php echo $add_date?></label>
					<input type="date" name="date_add" id="date_add" value="<?php echo date("Y-m-d");?>">
				</div>
				<h6><?php echo $T25FW_I_try?>
				<input type="number" class="form-control" name="I_try" id="I_try" min="0" max="120">
				<h6><?php echo $T25FW_II_try?>
				<input type="number" class="form-control" name="II_try" id="II_try" min="0" max="120">
				<div class="form-group"><h6><br>
					<label for="unable"><?php echo $MSFC_unable?></label>
					<input type="checkbox" name="unable" value="unable">
				</div>
			</div>
			<div class="form-group"><h6>
				<button type="submit" name="add_T25FW" id="add_T25FW" class="btn btn-primary">
				<i class="fa fa-plus-circle"></i> <?php echo $add_entry?></button>
			</div>
		</form>
	</div>
	
	<div class="column">
<!-- 3 FORM: DELETE PASAT TEST  -->
		<form id="form_delete_PASAT" action="../db_tools/delete_PASAT.php" method="post" class="form-horizontal" role="form" style="display: block;">
			<div class="heading">
		    	<h3 class="form-heading"><?php echo $MSFC_PASAT?></h3><h5><?php echo $PASAT?></h5><br>
		    </div>
		    <div class="form-group"><h6>
				<label for="delete_PASAT"><?php echo $MSFC_title?>
				<a href="#" data-toggle="tooltip" data-placement="right" title="<?php echo $tooltip?>"><i class="fa fa-question-circle-o"></i></a>	
				</label>
			    <select multiple class="form-control" id="delete_PASAT" name="delete_PASAT[]">
			      <?php                       
			      if(!(mysqli_num_rows($result_PASAT)>0)) {
                                echo  '<option value="" disabled>Brak badań</option>';  
                            }
                            else {
                            	while($row_PASAT= $result_PASAT->fetch_assoc())
                            		echo  '<option value="'.$row_PASAT['ID_PASAT'].'">'.$row_PASAT['date'].'&nbsp;'.$PASAT_form. $row_PASAT['form'].'&nbsp;'.$score. $row_PASAT['score'].'</option>';
                            }
				?>
			    </select>
			</div>
			<div class="form-group"><h6>
				<button type="submit" name="remove_PASAT" id="remove_PASAT" class="btn btn-primary" <?php if(!(mysqli_num_rows($result_PASAT)>0)) echo "disabled"?>>
				<i class="fa fa-times"></i> <?php echo $delete_entry?></button>
			</div>
		</form>
		<br>
<!-- 4 FORM: ADD PASAT TEST  -->
		<form id="form_add_PASAT" action="../db_tools/add_PASAT.php" method="post" class="form-horizontal" role="form" style="display: block;">
			<div class="heading">
		    	<h5 class="form-heading"><?php echo $add_test?></h5><br>
		    </div>
		    <div class="form-group">
		    	<input type="hidden" name="id" value="<?php echo $patient_id ?>">
		    	<div class="form-group"><h6>
					<label for="date_add"><?php echo $add_date?></label>
					<input type="date" name="date_add" id="date_add" value="<?php echo date("Y-m-d");?>">
				</div>
				<h6><?php echo $PASAT_score?>
				<input type="number" class="form-control" name="result" id="result" min="0" max="60">
				<h6><?php echo $PASAT_form?>
				<select class="form-control" name="form" id="form">
					<option value="A">A</option>
					<option value="B">B</option>
				</select>
				<div class="form-group"><h6><br>
					<label for="unable"><?php echo $MSFC_unable?></label>
					<input type="checkbox" name="unable" value="unable">
				</div>
			</div>
			<div class="form-group"><h6>
				<button type="submit" name="add_PASAT" id="add_PASAT" class="btn btn-primary">
				<i class="fa fa-plus-circle"></i> <?php echo $add_entry?></button>
			</div>
		</form>
	</div>
	
<!-- 5 FORM: DELETE 9HPT TEST  -->
<div class="container">
<div class="row">
	<!-- Przygotowanie tabeli DataTables po id = H9PT -->       
	<script>
		$(document).ready(function() {
		    // DataTable
		    var table = $('#H9PT').DataTable();	
		} );
	</script>
	<div class="heading">
	    <h3 class="form-heading"><?php echo $H9PT_txt?></h3><br>
	</div>
	<div class="text-center">
		<?php 
		// Tabela wyników H9PT z możliwością usunięcia danego wpisu
		generateTableH9PT(
				$labels, 	// Etykiety
				$H9PT,	// Dane
				$id_table// ID tabelki do wyświetlenia
				);
		if(!$H9PT) $H9PT->free_result();
		?>
	</div>

<!-- 6 FORM: ADD 9HPT TEST  -->
	<form id="form_add_9HPT" action="../db_tools/add_9HPT.php" method="post" class="form-horizontal" role="form" style="display: block;">
<br><br>
		<div class="heading">
	    	<h4 class="form-heading"><?php echo $add_test?></h4>
	    </div>
	    <div class="form-group">
		    <input type="hidden" name="id" value="<?php echo $patient_id ?>">
	    	<div class="form-group" align="center"><h6>
				<label for="date_add"><?php echo $add_date?></label>
				<input type="date" name="date_add" id="date_add" value="<?php echo date("Y-m-d");?>">
			</div>
			
			<div class="column">
				<div class="heading">
			    	<h5 class="form-heading"><?php echo $H9PT_d?></h5><br>
			    </div>
				<h6><?php echo $T25FW_I_try?>
				<input type="number" class="form-control" name="I_try_d" id="I_try_d" min="0" max="120">
				<h6><?php echo $T25FW_II_try?>
				<input type="number" class="form-control" name="II_try_d" id="II_try_d" min="0" max="120">
				<div class="form-group"><h6><br>
					<label for="unable"><?php echo $MSFC_unable?></label>
					<input type="checkbox" name="unable_d" value="unable_d">
				</div>
			</div>
			
			<div class="column">
				<div class="heading">
			    	<h5 class="form-heading"><?php echo $H9PT_nd?></h5><br>
			    </div>
				<h6><?php echo $T25FW_I_try?>
				<input type="number" class="form-control" name="I_try_nd" id="I_try_nd" min="0" max="120">
				<h6><?php echo $T25FW_II_try?>
				<input type="number" class="form-control" name="II_try_nd" id="II_try_nd" min="0" max="120">
				<div class="form-group"><h6><br>
					<label for="date_add"><?php echo $MSFC_unable?></label>
					<input type="checkbox" name="unable_nd" value="unable_nd">
				</div>
			</div>
			
		</div>
		<div class="form-group"><h6>
			<button type="submit" name="add_9HPT" id="add_9HPT" class="btn btn-primary">
			<i class="fa fa-plus-circle"></i> <?php echo $add_entry?></button>
		</div>
	</form>
		
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

