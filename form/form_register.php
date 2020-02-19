<?php 

/* REGISTER FORM
 *
 * Dwie opcje rejestracji: lekarz (default) i pacjent
 * Walidacja rejestracji poprzez JS w js/validate_register_doctor.js oraz js/validate_register_patient.js
 * Rejestracja lekarza: przesyłanie maila z formularza do db_tools/register_mail_doctor.php -> pobieranie POSTem danych
 * TODO rejestracja pacjenta w db_tools/register_mail_patient.php
 */


require_once "../lang/$lang/form_register.php";
require_once '../db_tools/connectToDB.php';
?>
<link href="../css/registry.css" rel="stylesheet" type="text/css">

<!-- JS przenoszenie widoku -->
<script>
$(function() {

    $('#doctor-form-link').click(function(e) {
    	$("#doctor-form").delay(100).fadeIn(100);
 		$("#patient-form").fadeOut(100);
		$('#patient-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#patient-form-link').click(function(e) {
		$("#patient-form").delay(100).fadeIn(100);
 		$("#doctor-form").fadeOut(100);
		$('#doctor-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});
</script>
<!-- POCZĄTEK REJESTRACJI -->
<div class="card-header">
	<h3><?=$rej?></h3>
</div>
<div class="card-body">


<div class="container">
        <div class="row">
<!-- LEKARZ BĄDŹ PACJENT WYBÓR -->
			<div class="col-md-8 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
							<div class="col-xs-6">
								<h3><a href="#" class="active" id="doctor-form-link"><?php echo $rejDoc?><i class="fa fa-user-md" aria-hidden="true"></i></a></h3>
							</div>
							<div class="col-xs-6">
								<h3><a href="#" id="patient-form-link"><?php echo $rejPat?><i class="fa fa-user" aria-hidden="true"></i></a></h3>
							</div>
					</div>
					<div class="panel-body">
							<div class="col-lg-12">
<!-- FORMULARZ REJESTRACJI LEKARZA -->
								<form id="doctor-form" action="../db_tools/register_mail_doctor.php" method="post" role="form" style="display: block;">
									<div class="form-group">
									<h6><?php echo $rejName;?><i class="fa fa-id-card-o" aria-hidden="true"></i></h6>
										<input type="text" name="name" id="name" tabindex="1" class="form-control">
									</div>
									<div class="form-group">
									<h6><?php echo $rejSurname;?><i class="fa fa-id-card-o" aria-hidden="true"></i></h6>
										<input type="text" name="surname" id="surname" tabindex="1" class="form-control" placeholder="" value="">
									</div>
									<div class="form-group">
									<h6><?php echo $rejEmail;?><i class="fa fa-envelope-o fa-fw"></i></h6>
										<input type="email" name="email" id="email" tabindex="2" class="form-control" placeholder="">
									</div>
									<div class="form-group">
									<h6><?php echo $rejHospital?><i class="fa fa-hospital-o" aria-hidden="true"></i>
									      <select id="hospital" name="hospital" class="form-control">
										  <?php	require_once '../html_tools/produce_hospital_names.php';?>   
									      </select></h6>
									</div>
									<div class="form-group">
									<h6><?php echo $rejPass;?><i class="fa fa-lock" aria-hidden="true"></i></h6>
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="">
									</div>
									<div class="form-group">
									<h6><?php echo $rejRepPass;?><i class="fa fa-lock" aria-hidden="true"></i></h6>
										<input type="password" name="pass_rep" id="pass_rep" tabindex="2" class="form-control" placeholder="">
									</div>
									<div class="form-group">
										
										<input type="checkbox" name="consent" id="consent" tabindex="2" class="form-group auto-width pull-left">
										<label><h6><?php echo $rejConsent;?></h6></label>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<h3><input type="submit" name="register-submit" id="doctor_register_submit" tabindex="4" class="btn btn-primary btn-block" value="<?php echo $rejConfirm; ?>"></h3>
											</div>
										</div>
									</div>
								</form>
								
<!-- FORMULARZ REJESTRACJI PACJENTA -->
								<form id="patient-form" action="../db_tools/register_mail_patient.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<h6><?php echo $rejPESEL;?><i class="fa fa-id-card-o" aria-hidden="true"></i></h6>
										<input type="text" name="pesel" id="pesel" tabindex="1" class="form-control" placeholder="" value="">
									</div>
									<div class="form-group">
										<h6><?php echo $rejEmail;?><i class="fa fa-envelope-o fa-fw"></i></h6>
										<input type="email" name="email1" id="email1" tabindex="1" class="form-control" placeholder="" value="" />
									</div>
									<div class="form-group">
										<h6><?php echo $rejPass;?><i class="fa fa-lock" aria-hidden="true"></i></h6>
										<input type="password" name="password1" id="password1" tabindex="2" class="form-control" placeholder="">
									</div>
									<div class="form-group">
										<h6><?php echo $rejRepPass;?><i class="fa fa-lock" aria-hidden="true"></i></h6>
										<input type="password" name="confirm_password" id="confirm_password" tabindex="2" class="form-control" placeholder="">
									</div>
									<div class="form-group">
										<label><input type="checkbox" name="consent1" id="consent1" tabindex="2" class="form-control" placeholder=""><h6><?php echo $rejConsent;?></h6></label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<h3><input type="submit" name="register-submit" id="patient_register_submit" tabindex="4" class="btn btn-primary btn-block" value="<?php echo $rejConfirm; ?>"></h3>
											</div>
										</div>
									</div>
								</form>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- REGULAMIN REJESTRACJI -->
<div class="text-justify">
	        <h3><?=$rejReg?></h3>
		    <h6><?=$rejTerms?></h6>
</div>

		