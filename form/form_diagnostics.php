<?php 
/* Formularz edycji badań MRI, CSF i potencjałów
 * Zapytania do bazy danych o dostępne opcje formularza w: form/form_diagnostics_query.php
 */
?>

<!-- DIAGNOSTICS FORM: CSF + potentials -->
<form id="diagnostics_form" action="../db_tools/edit_diagnostics.php" method="post" class="form-horizontal" role="form" style="display: block;">
<div class="container">
<div class="row">
    <div class="column">
    	<div class="heading">
	    	<h5 class="form-heading"><?php echo $diag_CSF; ?></h5>
	    </div><br>
	    <input type="hidden" name="id" value="<?php echo $patient_id ?>">
<!-- CSF test (po lewej stronie) -->
	    <div class="form-group"><h6>
			<input type="checkbox" name="CSF_checked" value="1"
			<?php if ($CSF_test == '1') echo 'checked="checked"';?> > <?php echo $_diag_test_made?><br>
		</div>
		<div class="form-group">
			<h6><?php echo $diag_olig_bands?></h6>
			<select class="form-control" name="CSF_bands" id="CSF_bands">
			
			<?php if ($CSF_test == '1') {echo "<option value=".$CSF_bands.">".$name_bands."</option>";}
			for ($i=0;$i<mysqli_num_rows($names_CSF);$i++){
				if ($CSF_test == '1'){
					if($id_CSF[$i] == $CSF_bands)
						continue;
					else
						echo "<option value=".$id_CSF[$i].">".$name_CSF[$i]."</option>";}
				else echo "<option value=".$id_CSF[$i].">".$name_CSF[$i]."</option>"; }?>
			</select>
		</div><br>
	</div>
<!-- POTENTIALS TEST (po prawej stronie) -->		
	<div class="column">
		<div class="heading">
	    	<h5 class="form-heading"><?php echo $diag_potentials; ?></h5>
	    </div><br>
		<div class="form-group"><h6>
			<input type="checkbox" name="potentials_checked" value="1"
			<?php if ($potentials== '1') echo 'checked="checked"';?> > <?php echo $_diag_test_made?><br>
		</div>
		<div class="form-group">
			<h6><?php echo $diag_pot_result?></h6>
			<select class="form-control" name="potential_sign" id="potential_sign">
			<?php if ($potentials== '1') {echo "<option value=".$pot_sign.">".$name_potentials."</option>";}
			for ($i=0;$i<mysqli_num_rows($names_pot);$i++){
				if ($potentials== '1'){
					if($id_pot[$i] == $pot_sign)
						continue;
					else
						echo "<option value=".$id_pot[$i].">".$name_pot[$i]."</option>";} 
				else echo "<option value=".$id_pot[$i].">".$name_pot[$i]."</option>";}?>
			</select>
		</div>
	</div>
	</div>

<!-- Przycisk z edycją danych  -->
<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
  <div class="input-group">
  	<a class="btn btn-primary" data-toggle="modal" data-target="#sure_edit">
    <i class="fa fa-pencil-square-o"></i> <?=$diag_edit?></a>
  </div>
</div>

<!-- Wyświetlanie okna z zapytaniem "czy na pewno chcesz edytować dane?"  -->
    <div class="modal fade" id="sure_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $edit?></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body"><?php echo $edit_sure?></div>
          <div class="modal-footer">  
            <button type="submit" name="edit_diagnostics" id="edit_diagnostics" class="btn btn-primary"><?php echo $diag_edit;?>
			<i class="fa fa-pencil-square-o"></i></button>
			<button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo $edit_back?></button>
          </div>
        </div>
      </div>
</div>

</div>
</div>
</form>

<br><br><br><br>
<!-- MRI FORM -->
<div class="container">
<div class="row">
<div class="column">
	<form id="MRI_form" action="../db_tools/delete_MRI.php" method="post" class="form-horizontal" role="form" style="display: block;">
	
			<div class="heading">
		    	<h5 class="form-heading"><?php echo $diag_MRI?></h5><br>
		    </div>
<!-- Usuń badanie MRI  -->
		    <div class="form-group"><h6>
				<label for="MRI_date_remove"><?php echo $diag_MRI_date?>
				<a href="#" data-toggle="tooltip" data-placement="right" title="<?php echo $tooltip?>"><i class="fa fa-question-circle-o"></i></a>	
				</label>
			    <select multiple class="form-control" id="MRI_date_remove" name="MRI_date_remove[]">
			      <?php                       
			      if(!(mysqli_num_rows($MRI_date)>0)) {
                                echo  '<option value="" disabled>Brak badań</option>';  
                            }
                            else {
                            	while($row_MRI_date = $MRI_date->fetch_assoc())
                            		echo  '<option value="'.$row_MRI_date['ID_MRI'].'">'.$row_MRI_date['Date'].'</option>';
                            }
				?>
			    </select>
			</div>
			<div class="form-group"><h6>
				<button type="submit" name="remove_MRI" id="remove_MRI" class="btn btn-primary" <?php if(!(mysqli_num_rows($MRI_date)>0)) echo "disabled"?>>
				<i class="fa fa-times"></i> <?php echo $diag_MRI_remove?></button> 
			</div>
	</form>
	<form id="MRI_form" action="../db_tools/add_MRI.php" method="post" class="form-horizontal" role="form" style="display: block;">
<!-- Dodaj nowe badanie MRI  -->
		    <div class="form-group"><h6>
		    	<input type="hidden" name="id" value="<?php echo $patient_id ?>">
		    	<label for="MRI_date_add"><?php echo $diag_MRI_date_add?></label>
				<input type="date" name="MRI_date_add" id="MRI_date_add">
			</div>
			<div class="form-group"><h6>
				<button type="submit" name="add_MRI" id="add_MRI" class="btn btn-primary">
				<i class="fa fa-plus-circle"></i> <?php echo $diag_MRI_add?></button>
			</div>
	</form>
</div>
</div>

<br><br><br>
<!-- Przekierowanie na stronę główną (home.php) -->
<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
  <div class="input-group">
  </div>
  <div class="input-group">
    <a href="home.php" align="right" class="btn btn-primary btn-lg" role="button"><?php echo $back;?>
    <i class="fa fa-undo"></i></a>
  </div>
</div>
<br>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
