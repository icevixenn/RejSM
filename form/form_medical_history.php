<?php 
/* Formularz edycji historii choroby pacjenta (wywiadu)
 * Zapytania do bazy danych o dostępne opcje formularza w: form/form_medical_history_query.php
 * TODO lepszy sposób na checkboxy 
 */
?>


<form id="med_history_form" action="../db_tools/edit_medical_history.php" method="post" class="form-horizontal" role="form" style="display: block;">
<div class="container">
<div class="row">
<!-- MEDICAL HISTORY SM -->
    <div class="column">
    	<div class="heading">
	    	<h3 class="form-heading"><?php echo $mh_title_SM; ?></h3>
	    </div>
	    <input type="hidden" name="id" value="<?php echo $patient_id ?>">
	    <div class="form-group">
			<h6><?php echo $mh_I_symp_date;?></h6>
			<input type="text" name=I_symp_date id="I_symp_date" tabindex="1" class="form-control" value="<?php echo $I_symp_date; ?>">
		</div>
		<div class="form-group">
			<h6><?php echo $mh_I_symp ?></h6>
			<select class="form-control" name="I_symp" id="I_symp">
			<?php echo "<option value=".$I_symp.">".$name_mh_symp."</option>";
			for ($i=0;$i<mysqli_num_rows($SM_symp);$i++){
				if($id_symp[$i] == $I_symp)
				continue;
				else
				echo "<option value=".$id_symp[$i].">".$name_symp[$i]."</option>";
			}?>
			</select>
		</div>
		<div class="form-group">
			<h6><?php echo $mh_diagnosis_date;?></h6>
			<input type="text" name="diagnosis_date" id="diagnosis_date" tabindex="1" class="form-control" value="<?php echo $diagnosis_date; ?>">
		</div>
		<div class="form-group">
			<h6><?php echo $mh_form;?></h6>
			<select class="form-control" name="form" id="form">
			<?php echo "<option value=".$form.">".$name_mh_SM_form."</option>";
			for ($i=0;$i<mysqli_num_rows($SM_form);$i++){
				if($id_form[$i] == $form)
				continue;
				else
					echo "<option value=".$id_form[$i].">".$name_form[$i]."</option>";
			}?>
			</select>
		</div>
		<div class="form-group"><h6>
			<input type="checkbox" name="McDonald" value="6" 
			<?php if(isset ($id_disease)) if (in_array('6',$id_disease)) echo 'checked="checked"';?> ><?php echo $mh_McDonald?><br>
		</div>
	</div>
	
<!-- MEDICAL HISTORY GENERAL -->	
	<div class="column">
		<div class="heading">
        	<h3 class="form-heading"><?php echo $mh_title_gen?></h3><br>
        </div>	
		<div class="form-group"><h6>
			<input type="checkbox" name="hipertension" value="1" 
			<?php if(isset ($id_disease)) if (in_array('1',$id_disease)) echo 'checked="checked"';?> ><?php echo $mh_hipertension?><br>
		</div>
		<div class="form-group"><h6>
			<input type="checkbox" name="optical_neuritis" value="7" 
			<?php if(isset ($id_disease)) if (in_array('7',$id_disease)) echo 'checked="checked"';?> ><?php echo $mh_optical_neuritis?><br>
		</div>
		<div class="form-group"><h6>
			<input type="checkbox" name="diabetes" value="2" 
			<?php if(isset ($id_disease)) if (in_array('2',$id_disease)) echo 'checked="checked"';?> ><?php echo $mh_diabetes?><br>
		</div>
		<div class="form-group"><h6>
			<input type="checkbox" name="thyroid" value="3" 
			<?php if(isset ($id_disease)) if (in_array('3',$id_disease)) echo 'checked="checked"';?> ><?php echo $mh_thyroid?><br>
		</div>
		<div class="form-group"><h6>
			<input type="checkbox" name="thromboembolism" value="4" 
			<?php if(isset ($id_disease)) if (in_array('4',$id_disease)) echo 'checked="checked"';?> ><?php echo $mh_thromboembolism?><br>
		</div>
		<div class="form-group"><h6>
			<input type="checkbox" name="cancer" value="5" 
			<?php if(isset ($id_disease)) if (in_array('5',$id_disease)) echo 'checked="checked"';?> ><?php echo $mh_cancer?><br>
		</div>	
	</div>
	<br>

<!-- Przycisk z edycją danych  -->
<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
  <div class="input-group">
  	<a class="btn btn-primary" data-toggle="modal" data-target="#sure_edit">
    <i class="fa fa-pencil-square-o"></i><?=$mh_edit?></a>
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
            <button type="submit" name="edit_medical_history" id="edit_medical_history" class="btn btn-primary"><?php echo $mh_edit;?>
			<i class="fa fa-pencil-square-o"></i></button>
			<button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo $edit_back?></button>
          </div>
        </div>
      </div>
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
    <i class="fa fa-undo" aria-hidden="true"></i></a>
  </div>
</div>





