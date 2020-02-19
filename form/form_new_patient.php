<?php 
/*
 * Formularz dodawania nowego pacjenta do Rejestru. Składa się z kilku etapów:
 * 1) Dane Demograficzne Pacjenta
 * 2) Wywiad i Diagnostyka
 * 3) Dalsze informacje - możliwość przekierowania na inne strony
 * 
 * Ta część zawiera tylko punkt 1), po czym następuje przekierowanie
 * Wykonuje się zapytanie do bazy, po czym przechodzi do strony add_new_patient_2.php
 */
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">	

<div class="container">
	<div class="row">
		<div class="stepwizard">
		    <div class="stepwizard-row setup-panel">
<!-- KOLEJNE KROKI DODAWANIA NOWEGO PACJENTA -->
		        <div class="stepwizard-step">
		            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
		            <p><?php echo $np_step1?></p>
		        </div>
		        <div class="stepwizard-step">
		            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
		            <p><?php echo $np_step2?></p>
		        </div>
		        <div class="stepwizard-step">
		            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
		            <p><?php echo $np_step3?></p>
		        </div>
		    </div>
		</div>
	</div>
</div>
<!-- KOLEJNE FORMULARZE DODAWANIA PACJENTA I JEGO DANYCH -->

<!-- ETAP 1: DODAWANIE PACJENTA: Inicjały, PESEL i Dane Demograficzne -->

<div class="container">
<form id="patient_add_form" action="../db_tools/add_patient.php" method="post" role="form" style="display: block;">
	<div class="form-group"><br>
		<h3><?php echo $np_registry_1;?></h3>
	</div>
	<div class="row">
		<div class="three-columns">
				<div class="form-group">
					<h6><?php echo $np_sc_name;?></h6>
					<input type="text" name="sc_name" id="name" tabindex="1" class="form-control">
				</div>
				<div class="form-group">
					<h6><?php echo $np_sc_surname;?></h6>
					<input type="text" name="sc_surname" id="surname" tabindex="1" class="form-control" placeholder="" value="">
				</div>
				<div class="form-group">
					<h6><?php echo $np_PESEL;?></h6>
					<input type="text" name="pesel" id="pesel" tabindex="1" class="form-control" placeholder="" value="">
				</div>	
				<div class="form-group">
					<h6><?php echo $dem_year ?></h6>
					<input type="text" name="year" id="year" tabindex="1" class="form-control" placeholder="" value="">
				</div>
				<div class="form-group">
					<h6><label for="month"><?php echo $dem_month?></label>
					<select class="form-control" name="month" id="month">
						<?php for ($i = 1; $i <= 9; $i++) : ?>
				        <option value="0<?php echo $i; ?>">0<?php echo $i; ?></option>
				        <?php endfor; ?>
				        <option value="10">10</option>
				        <option value="11">11</option>
				        <option value="12">12</option>
				    	
					</select>
				</div>	
		</div>
		
		<div class="three-columns">	
			    <h6><?php echo $dem_address;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="address" id="address">
				      <option value="0"><?php echo $dem_no_data?></option>
				      <option value="1"><?php echo $dem_address1?></option>
				      <option value="2"><?php echo $dem_address2?></option>
			      </select><br><br></h6>
			    
			      <h6><?php echo $dem_labor;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="labor" id="labor">
				      <?php
				     	for ($i=0;$i<mysqli_num_rows($SM_labor);$i++){
				      		echo "<option value=".$id_labor[$i].">".$name_labor[$i]."</option>";
						}?>
					</select><br><br></h6>
			    
			    <h6><?php echo $dem_job;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="job" id="job">
				      <option value="0"><?php echo $dem_no_data?></option>
				      <option value="1"><?php echo $dem_yes?></option>
				      <option value="2"><?php echo $dem_no?></option>
			      </select><br><br></h6>
			      
			      <h6><?php echo $dem_gender;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="gender" id="gender">
				      <option value="0"><?php echo $dem_no_data?></option>
				      <option value="1"><?php echo $dem_gender_male?></option>
				      <option value="2"><?php echo $dem_gender_female?></option>
			      </select><br><br></h6>
			      
			      <h6><?php echo $dem_hand;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="hand" id="hand">
				      <option value="0"><?php echo $dem_no_data?></option>
				      <option value="1"><?php echo $dem_hand_right?></option>
				      <option value="2"><?php echo $dem_hand_left?></option>
			      </select><br><br></h6>
			</div>    
			<div class="three-columns"><h6>
			      <h6><?php echo $dem_SM;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="SM" id="SM">
				      <option value="0"><?php echo $dem_no_data?></option>
				      <option value="1"><?php echo $dem_yes?></option>
				      <option value="2"><?php echo $dem_no?></option>
			      </select><br><br></h6>
			      
			      <h6><?php echo $dem_family;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="family" id="family">
				      <?php
						for ($i=0;$i<mysqli_num_rows($family);$i++){
							echo "<option value=".$id_family[$i].">".$name_family[$i]."</option>";
						}?>
					</select><br><br></h6>
			      
			      <h6><?php echo $dem_province;?>
			     	<select class="custom-select mr-sm-2 pull-right" name ="province" id="province">
						<?php
						for ($i=0;$i<mysqli_num_rows($province);$i++){
							echo "<option value=".$id_prov[$i].">".$name_prov[$i]."</option>";
						}?>
					</select><br><br></h6>
			      
			      <h6><?php echo $dem_education;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="education" id="education">
				      <option value="0"><?php echo $dem_no_data?></option>
				      <option value="1"><?php echo $dem_education1?></option>
				      <option value="2"><?php echo $dem_education2?></option>
				      <option value="3"><?php echo $dem_education3?></option>
			      </select><br><br></h6>
			      
			      <h6><?php echo $dem_employ;?>
			      <select class="custom-select mr-sm-2 pull-right" name ="employ" id="employ">
				      <?php
						for ($i=0;$i<mysqli_num_rows($employ);$i++){
							echo "<option value=".$id_employ[$i].">".$name_employ[$i]."</option>";
						}?>
					</select><br><br></h6>
			</div>		
</div>		
	<div class="row">
		<div class="col-sm-4 col-sm-offset-3">
			<h3><input type="submit" name="register-submit" id="patient_add_submit" tabindex="4" class="btn btn-primary btn-lg btn-block" value="<?php echo $np_add_patient; ?>"></h3>
		</div>
	</div>
</form>
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
