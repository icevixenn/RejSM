<?php 
/* Formularz edycji leczenia pacjenta (spożywanych leków)
 * Zapytania do bazy danych o dostępne opcje formularza w: form/form_treatment_query.php
 */
?>
<div class="container">
<div class="row">
<!-- 1 FORM: DELETE DRUGS: LEKI IMMUNOMODULUJĄCE I OBJAWOWE -->
	<div class="column">
		<form id="delete_drug_form" action="../db_tools/delete_drugs.php" method="post" class="form-horizontal" role="form" style="display: block;">
		    	<div class="heading">
			    	<h4 class="form-heading"><?php echo $tr_title; ?></h4>
			    </div><br>
			    <input type="hidden" name="id" value="<?php echo $patient_id ?>">
				<div class="form-group"><h6>
					<label for="drug_remove"><?php echo $tr_drug_remove?>
					<a href="#" data-toggle="tooltip" data-placement="right" title="<?php echo $tooltip?>"><i class="fa fa-question-circle-o"></i></a>	
					</label>
				    <select multiple class="form-control" id="drug_remove" name="drug_remove[]">
				      <?php               
				      if(!(mysqli_num_rows($drug_intake)>0)) {
							echo  '<option value="" disabled>Brak danych</option>';  
						}
						else {
							while($row_di= $drug_intake->fetch_assoc())
								echo  '<option value="'.$row_di['ID_drug_intake'].'">'.$row_di['name_drug']. '&emsp;'.
								$tr_from. $row_di['date_from'] . $tr_to. $row_di['date_to'] . $tr_end . '</option>';
							}
					?>
				    </select>
				</div><br>
		
<!-- Przycisk z edycją danych  -->
				<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
				  <div class="input-group">
				  	<a class="btn btn-primary <?php if(!(mysqli_num_rows($drug_intake)>0)) echo 'disabled'?>" data-toggle="modal" data-target="#sure_edit">
				    <i class="fa fa-times"></i> <?=$tr_remove_drug?></a>
				  </div>
				</div>
<!-- Wyświetlanie okna z zapytaniem "czy na pewno chcesz edytować dane?"  -->
			    <div class="modal fade" id="sure_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			      <div class="modal-dialog" role="document">
			        <div class="modal-content">
			          <div class="modal-header">
			            <h5 class="modal-title" id="exampleModalLabel"><?php echo $tr_remove_drug?></h5>
			            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
			              <span aria-hidden="true">×</span>
			            </button>
			          </div>
			          <div class="modal-body"><?php echo $tr_remove_sure?></div>
			          <div class="modal-footer">  
			            <button type="submit" name="edit_diagnostics" id="edit_diagnostics" class="btn btn-primary">
			            <i class="fa fa-times"></i> <?php echo $tr_remove_drug;?></button>
						<button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo $edit_back?></button>
			          </div>
			        </div>
			      </div>
				</div>
				
			<br>
			
		</form>
	</div>

<!-- 2 FORM: ADD NEW DRUG TO PATIENT -->
	<div class="column">
		<form id="form_add_drug" action="../db_tools/add_drug.php" method="post" class="form-horizontal" role="form" style="display: block;">
				<div class="heading">
			    	<h4 class="form-heading"><?php echo $tr_add_drug?></h4><br>
			    </div>
			    <div class="form-group">
			    	<input type="hidden" name="id" value="<?php echo $patient_id ?>">
					<h6><?php echo $tr_choose_drug?>
					<select class="form-control" name="add_drug" id="add_drug">
					<?php
					for ($i=0;$i<mysqli_num_rows($drug_names);$i++){
						echo "<option value=".$id_drug[$i].">".$name_drug[$i]."</option>"; }?>
					</select>
				</div>
				<div class="form-group"><h6>
					<label for="date_from_add"><?php echo $tr_date_from?></label>
					<input type="date" name="date_from_add" id="date_from_add" value="<?php echo date("Y-m-d");?>">
				</div>
				<div class="form-group"><h6>
					<label for="date_to_add"><?php echo $tr_date_to?></label>
					<input type="date" name="date_to_add" id="date_to_add" value="<?php echo date("Y-m-d");?>">
				</div>
				<div class="form-group"><h6>
					<button type="submit" name="remove_sm" id="remove_sm" class="btn btn-primary">
					<i class="fa fa-plus-circle"></i> <?php echo $tr_add_drug?></button>
				</div>
		</form>
	</div>
	
</div>
</div>

<div class="container">
<div class="row">
	<div class="column">
<!-- 3 FORM: DELETE SOLUMEDROL: LEK IMMUNOSUPRESYJNY - SOLUMEDROL -->
		<form id="delete_solumedrol" action="../db_tools/delete_solumedrol.php" method="post" class="form-horizontal" role="form" style="display: block;">
				<div class="heading">
			    	<h4 class="form-heading"><?php echo $tr_sm_title?></h4><br>
			    </div>
			<!-- DELETE SOLUMEDROL -->
			    <div class="form-group"><h6>
			    	<label for="sm_remove"><?php echo $tr_sm_date?>
			    	<a href="#" data-toggle="tooltip" data-placement="right" title="<?php echo $tooltip?>"><i class="fa fa-question-circle-o"></i></a>	
			    	</label>
			    <select multiple class="form-control" id="sm_remove" name="sm_remove[]">
			      <?php               
					if(!(mysqli_num_rows($result_sm)>0)) {
						echo  '<option value="" disabled>Brak danych</option>';  
					}
					else {
						while($row_sm= $result_sm->fetch_assoc())
							echo  '<option value="'.$row_sm['ID_SoluMedrol'].'">'.$row_sm['Date'].'</option>';
						}
				?>
			    </select>
			</div>
			<div class="form-group"><h6>
				<button type="submit" name="remove_sm" id="remove_sm" class="btn btn-primary" <?php if(!(mysqli_num_rows($result_sm)>0)) echo "disabled"?>>
				<i class="fa fa-times"></i> <?php echo $tr_sm_remove?></button>
			</div>
		</form>

<!-- 4 FORM: ADD SOLUMEDROL  -->
		<form id="add_solumedrol" action="../db_tools/add_solumedrol.php" method="post" class="form-horizontal" role="form" style="display: block;">
			<div class="form-group"><h6>
				<input type="hidden" name="id" value="<?php echo $patient_id ?>">
				<label for="solumedrol_add"><?php echo $tr_sm_date_add?></label>
				<input type="date" name="solumedrol_add" id="solumedrol_add" value="<?php echo date("Y-m-d");?>">
			</div>
			<div class="form-group"><h6>
				<button type="submit" name="add_solumedrol" id="add_solumedrol" class="btn btn-primary">
				<i class="fa fa-plus-circle"></i> <?php echo $tr_sm_add?></button>
			</div>
		</form>
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

