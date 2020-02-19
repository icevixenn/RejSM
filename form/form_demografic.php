<?php 
/* Formularz edycji danych demograficznych
 * Zapytania do bazy danych o dostępne opcje formularza w: form/form_demografic_query.php
 */
?>

<!-- DEMOGRAFIC FORM: 2 COLUMNS -->
<form id="demografic_form" action="../db_tools/edit_demografic.php" method="post" class="form-horizontal" role="form" style="display: block;">
<div class="container">
	<div class="form-group"><br>
		<h3><?php echo $dem_title;?></h3>
	</div>
<div class="row">
		<div class="three-columns">
				<input type="hidden" name="id" value="<?php echo $patient_id ?>">
				<div class="form-group">
					<h6><?php echo $dem_year ?></h6>
					<input type="text" name="year" id="year" tabindex="1" class="form-control" placeholder="" value="<?php echo $year?>" disabled>
				</div>
				<div class="form-group">
					<h6><?php echo $dem_month?></h6>
					<input type="text" name="month" id="month" tabindex="1" class="form-control" placeholder="" value="<?php echo $month?>" disabled>
				</div>
		</div>	
		<div class="three-columns">	
			    <h6><?php echo $dem_address;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="address" id="address">
				      <?php echo "<option value=".$address.">".$address_name."</option>";
				      for ($i=0;$i<mysqli_num_rows($result_address);$i++){
			      		if($id_address[$i] == $address)
			     			continue;
			     		else
			     			echo "<option value=".$id_address[$i].">".$name_address[$i]."</option>";
						}?>
			      </select><br><br></h6>
			    
			      <h6><?php echo $dem_labor;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="labor" id="labor">
			      <?php echo "<option value=".$labor.">".$labor_name."</option>";
			     	for ($i=0;$i<mysqli_num_rows($SM_labor);$i++){
			     		if($id_labor[$i] == $labor)
			     			continue;
			     		else
			      			echo "<option value=".$id_labor[$i].">".$name_labor[$i]."</option>";
					}?>
					</select><br><br></h6>	
								    
			    <h6><?php echo $dem_job;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="job" id="job">
				  <?php echo "<option value=".$job.">".$job_name."</option>";
				  	for ($i=0;$i<mysqli_num_rows($result_job);$i++){
				  		if($id_job[$i] == $job)
			     			continue;
			     		else
			     			echo "<option value=".$id_job[$i].">".$name_job[$i]."</option>";
					}?>
			      </select><br><br></h6>
			      
			      <h6><?php echo $dem_gender;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="gender" id="gender">
			      <?php echo "<option value=".$gender.">".$gender_name."</option>";
			      	for ($i=0;$i<mysqli_num_rows($result_gender);$i++){
			     		if($id_gender[$i] == $gender)
			     			continue;
			     		else
			     			echo "<option value=".$id_gender[$i].">".$name_gender[$i]."</option>";
					}?>
			      </select><br><br></h6>
			      
			      <h6><?php echo $dem_hand;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="hand" id="hand">
				      <?php echo "<option value=".$hand.">".$hand_name."</option>";
				      	for ($i=0;$i<mysqli_num_rows($result_hand);$i++){
				      		if($id_hand[$i] == $hand)
				     			continue;
				     		else
				     			echo "<option value=".$id_hand[$i].">".$name_hand[$i]."</option>";
						}?>
			      </select><br><br></h6>
			</div>    
			<div class="three-columns"><h6>
			      <h6><?php echo $dem_SM;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="SM" id="SM">
				  <?php echo "<option value=".$SM_in_family.">".$SM_in_family_name."</option>";
				  	for ($i=0;$i<mysqli_num_rows($result_SM_in_family);$i++){
				  		if($id_SM[$i] == $SM_in_family)
			     			continue;
			     		else
			     			echo "<option value=".$id_SM[$i].">".$name_SM[$i]."</option>";
					}?>
			      </select><br><br></h6>
			      
			      <h6><?php echo $dem_family;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="family" id="family">
			      <?php echo "<option value=".$family_status.">".$family_status_name."</option>";
			      	for ($i=0;$i<mysqli_num_rows($family);$i++){
			      		if($id_family[$i] == $family_status)
			     			continue;
			     		else
			     			echo "<option value=".$id_family[$i].">".$name_family[$i]."</option>";
					}?>
					</select><br><br></h6>
			      
			      <h6><?php echo $dem_province;?>
			     	<select class="custom-select mr-sm-2 pull-right" name ="province" id="province">
					<?php echo "<option value=".$province.">".$province_name."</option>";
						for ($i=0;$i<mysqli_num_rows($result_province);$i++){
							if($id_prov[$i] == $province)
			     			continue;
			     		else
			     			echo "<option value=".$id_prov[$i].">".$name_prov[$i]."</option>";
					}?>
					</select><br><br></h6>
			      
			      <h6><?php echo $dem_education;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="education" id="education">
				  <?php echo "<option value=".$education.">".$education_name."</option>";
			  		for ($i=0;$i<mysqli_num_rows($SM_education);$i++){
			  			if($id_education[$i] == $education)
		     			continue;
		     		else
		     			echo "<option value=".$id_education[$i].">".$name_education[$i]."</option>";
					}?>
			      </select><br><br></h6>
			      
			      <h6><?php echo $dem_employ;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="employ" id="employ">
				   <?php echo "<option value=".$employ.">".$employ_name."</option>";
				   for ($i=0;$i<mysqli_num_rows($result_employ);$i++){
				   		if($id_prov[$i] == $employ)
			     			continue;
			     		else
			     			echo "<option value=".$id_employ[$i].">".$name_employ[$i]."</option>";
					}?>
					</select><br><br></h6>
			</div>

<!-- Przycisk z edycją danych  -->
<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
  <div class="input-group">
  	<a class="btn btn-primary" data-toggle="modal" data-target="#sure_edit">
    <i class="fa fa-pencil-square-o"></i> <?=$dem_data_edit?></a>
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
            <button type="submit" name="edit_diagnostics" id="edit_diagnostics" class="btn btn-primary"><?php echo $dem_data_edit;?>
			<i class="fa fa-pencil-square-o"></i></button>
			<button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo $edit_back?></button>
          </div>
        </div>
      </div>
</div>

</div>
</div>
</form>

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

