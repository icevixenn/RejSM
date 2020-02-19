<?php 
/*
 * Formularz dodawania nowego pacjenta do Rejestru. Składa się z kilku etapów:
 * 1) Dane Demograficzne Pacjenta
 * 2) Wywiad i Diagnostyka
 * 3) Dalsze informacje - możliwość przekierowania na inne strony
 * 
 * Ta część zawiera tylko punkt 2), po czym następuje przekierowanie
 * Wykonuje się zapytanie do bazy, po czym przechodzi do strony add_new_patient_3.php
 * 
 */
$patient_id = $_SESSION['inserted_id'];
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">	

<div class="container">
	<div class="row">
		<div class="stepwizard">
		    <div class="stepwizard-row setup-panel">
<!-- KOLEJNE KROKI DODAWANIA NOWEGO PACJENTA -->
		        <div class="stepwizard-step">
		            <a href="#step-1" type="button" class="btn btn-default btn-circle" disabled="disabled">1</a>
		            <p><?php echo $np_step1?></p>
		        </div>
		        <div class="stepwizard-step">
		            <a href="#step-2" type="button" class="btn btn-primary btn-circle">2</a>
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

<!-- ETAP 2: DODAWANIE PACJENTA: WYWIAD I DIAGNOSTYKA -->

<div class="container">
<form id="patient_add_2_form" action="../db_tools/add_patient_2.php" method="post" role="form" style="display: block;">
	<div class="form-group"><br>
		<h3><?php echo $np_registry_2;?></h3>
	</div>
	<div class="row">
<!-- MEDICAL HISTORY SM -->
	    <div class="three-columns">
	    	<div class="heading">
		    	<h3 class="form-heading"><?php echo $mh_title_SM; ?></h3><br>
		    </div>
		    <input type="hidden" name="id" value="<?php echo $patient_id ?>">
		    <div class="form-group">
				<h6><?php echo $mh_I_symp_date;?></h6>
				<input type="text" name=I_symp_date id="I_symp_date" tabindex="1" class="form-control">
			</div>
			<div class="form-group">
				<h6><?php echo $mh_I_symp ?></h6>
				<select class="form-control" name="I_symp" id="I_symp">
				<?php for ($i=0;$i<mysqli_num_rows($SM_symp);$i++){
					echo "<option value=".$id_symp[$i].">".$name_symp[$i]."</option>"; }?>
				</select>
			</div>
			<div class="form-group">
				<h6><?php echo $mh_diagnosis_date;?></h6>
				<input type="text" name="diagnosis_date" id="diagnosis_date" tabindex="1" class="form-control">
			</div>
			<div class="form-group">
				<h6><?php echo $mh_form;?></h6>
				<select class="form-control" name="form" id="form">
				<?php for ($i=0;$i<mysqli_num_rows($SM_symp);$i++){
						echo "<option value=".$id_form[$i].">".$name_form[$i]."</option>"; }?>
				</select>
			</div>
		</div>
		
<!-- MEDICAL HISTORY GENERAL + KRYTERIA MCDONALDA -->
		<div class="three-columns">
			<div class="heading">
	        	<h3 class="form-heading"><?php echo $mh_title_gen?></h3><br>
	        </div>
	        <?php 
	        for ($i=0;$i<mysqli_num_rows($result_g);$i++){
	        	echo '<div class="form-group"><h6><input type="checkbox" name="'.$i.'" value="'.$id_disease[$i].'"> '.$name_disease[$i].'<br></div>';
	        }
	        ?>
		</div>
	    
			<div class="three-columns">
				<div class="heading">
			    	<h3 class="form-heading"><?php echo $np_diagnostic; ?></h3><br>
			    </div>
<!-- CSF test -->
			    <div class="form-group"><h6>
					<input type="checkbox" name="CSF_checked" value="1"> <?php echo $diag_CSF?><br>
				</div>
				<div class="form-group">
					<h6><?php echo $diag_olig_bands?></h6>
					<select class="form-control" name="CSF_bands" id="CSF_bands">
					<?php for ($i=0;$i<mysqli_num_rows($names_CSF);$i++){
						echo "<option value=".$id_CSF[$i].">".$name_CSF[$i]."</option>"; }?>
					</select>
				</div><br>
<!-- Potancjały test -->
				<div class="form-group"><h6>
					<input type="checkbox" name="potentials_checked" value="1"> <?php echo $diag_potentials?><br>
				</div>
				<div class="form-group">
					<h6><?php echo $diag_pot_result?></h6>
					<select class="form-control" name="potential_sign" id="potential_sign">
					<?php for ($i=0;$i<mysqli_num_rows($names_pot);$i++){
							echo "<option value=".$id_pot[$i].">".$name_pot[$i]."</option>"; }?>
					</select>
				</div><br>
<!-- MRI badanie -->
				<div class="form-group"><h6>
					<input type="checkbox" name="MRI_checked" value="1"> <?php echo $diag_MRI?><br>
				</div>
				<div class="form-group"><h6>
			    	<label for="MRI_date_add"><?php echo $diag_MRI_date_add?></label>
					<input type="date" name="MRI_date_add" id="MRI_date_add">
				</div>
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
