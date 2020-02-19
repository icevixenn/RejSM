<?php require_once "../lang/$lang/form_editDemogr.php";?>	
	<!-- Okno formularza edycji danych demograficznych -->
<div id="divEditDemogr" title="<?php echo $dem_data_edit?>">
 
  <form id="formEditDemogr" action="../db_tools/edit_demografic_data.php" method="POST" >
    <fieldset>
    <div>
    <input type="hidden" name="ID" value="<?php echo $patient_id ?>">
    <label for="mieszkanie"><?php echo $dem_address?></label>
      <select class="form-control" name ="mieszkanie" id="mieszkanie">
	      <option value="0"><?php echo $dem_no_data?></option>
	      <option value="1"><?php echo $dem_address1?></option>
	      <option value="2"><?php echo $dem_address2?></option>
      </select><br><br>
    
    <label for="porody"><?php echo $dem_labor?></label>
      <select class="form-control" name ="porody" id="porody">
	      <option value="0"><?php echo $dem_no_data?></option>
	      <option value="1">0</option>
	      <option value="2">1</option>
	      <option value="3">2</option>
	      <option value="4"><?php echo $dem_labor1?></option>
	      <option value="5"><?php echo $dem_labor2?></option>
      </select><br><br>
    
    <label for="praca"><?php echo $dem_job?></label>
      <select class="form-control" name ="praca" id="praca">
	      <option value="0"><?php echo $dem_no_data?></option>
	      <option value="1"><?php echo $dem_yes?></option>
	      <option value="2"><?php echo $dem_no?></option>
      </select><br><br>
      
      <label for="plec"><?php echo $dem_gender?></label>
      <select class="form-control" name ="plec" id="plec">
	      <option value="0"><?php echo $dem_no_data?></option>
	      <option value="1"><?php echo $dem_gender_male?></option>
	      <option value="2"><?php echo $dem_gender_female?></option>
      </select><br><br>
      
      <label for="recznosc"><?php echo $dem_hand?></label>
      <select class="form-control" name ="recznosc" id="recznosc">
	      <option value="0"><?php echo $dem_no_data?></option>
	      <option value="1"><?php echo $dem_hand_right?></option>
	      <option value="2"><?php echo $dem_hand_left?></option>
      </select><br><br>
      
      <label for="SM"><?php echo $dem_SM?></label>
      <select class="form-control" name ="SM" id="SM">
	      <option value="0"><?php echo $dem_no_data?></option>
	      <option value="1"><?php echo $dem_yes?></option>
	      <option value="2"><?php echo $dem_no?></option>
      </select><br><br>
      
      <label for="rodzina"><?php echo $dem_family?></label>
      <select class="form-control" name ="rodzina" id="rodzina">
	      <option value="0"><?php echo $dem_no_data?></option>
	      <option value="1"><?php echo $dem_family1?></option>
	      <option value="2"><?php echo $dem_family2?></option>
	      <option value="3"><?php echo $dem_family3?></option>
	      <option value="4"><?php echo $dem_family4?></option>
      </select><br><br>
      
      <label for="wojew"><?php echo $dem_province?></label>
      <select class="form-control" name ="wojew" id="wojew">
			
			<option value=0><?php echo $dem_no_data?></option>
			<option value=1><?php echo $dem_province1?></option>
			<option value=2><?php echo $dem_province2?></option>
			<option value=3><?php echo $dem_province3?></option>
			<option value=4><?php echo $dem_province4?></option>
			<option value=5><?php echo $dem_province5?></option>
			<option value=6><?php echo $dem_province6?></option>
			<option value=7><?php echo $dem_province7?></option>
			<option value=8><?php echo $dem_province8?></option>
			<option value=9><?php echo $dem_province9?></option>
			<option value=10><?php echo $dem_province10?></option>
			<option value=11><?php echo $dem_province11?></option>
			<option value=12><?php echo $dem_province12?></option>
			<option value=13><?php echo $dem_province13?></option>
			<option value=14><?php echo $dem_province14?></option>
			<option value=15><?php echo $dem_province15?></option>
			<option value=16><?php echo $dem_province16?></option>									
      </select>	<br><br>
      
      <label for="wykszt"><?php echo $dem_education?></label>
      <select class="form-control" name ="wykszt" id="wykszt">
	      <option value="0"><?php echo $dem_no_data?></option>
	      <option value="1"><?php echo $dem_education1?></option>
	      <option value="2"><?php echo $dem_education2?></option>
	      <option value="3"><?php echo $dem_education3?></option>
      </select><br><br>
      
      <label for="zarobek"><?php echo $dem_employ?></label>
      <select class="form-control" name ="zarobek" id="zarobek">
	      <option value="0"><?php echo $dem_no_data?></option>
	      <option value="1"><?php echo $dem_employ1?></option>
	      <option value="2"><?php echo $dem_employ2?></option>
	      <option value="3"><?php echo $dem_employ3?></option>
	      <option value="4"><?php echo $dem_employ4?></option>
      </select><br>
      

      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </div>
    </fieldset>
  </form>
</div>

