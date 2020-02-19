<link href="css/registry.css" rel="stylesheet" type="text/css">

<!-- JS przenoszenie widoku -->
<script>
$(function() {

    $('#login-form-link').click(function(e) {
    	$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});
</script>
<!-- POCZĄTEK LOGOWANIA -->
<div class="card-header">
	<h3><?=$lgLog?></h3>
</div>
<div class="card-body">
<br><br>
<div class="container">
        <div class="row">
<!-- LEKARZ BĄDŹ PACJENT WYBÓR -->
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
							<div class="col-xs-6">
								<h3><a href="#" class="active" id="login-form-link"><?php echo $lgDoctor?><i class="fa fa-user-md" aria-hidden="true"></i></a></h3>
							</div>
							<div class="col-xs-6">
								<h3><a href="#" id="register-form-link"><?php echo $lgPatient?><i class="fa fa-user" aria-hidden="true"></i></a></h3>
							</div>
					</div>
					<div class="panel-body">
							<div class="col-lg-12">
<!-- FORMULARZ LOGOWANIA LEKARZA -->
								<form id="login-form" action="log/login.php" method="post">
									<div class="form-group">
										<label><h6><?=$lgEmailLab?></h6></label>
										<i class="fa fa-envelope-o fa-fw"></i>
										<input class="form-control" type="email" name="login" id="uLogin" required autofocus placeholder="<?=$lgEmail?>">
									</div>
									<div class="form-group">
									<label><h6><?=$lgPassLab?></h6></label>
									<i class="fa fa-lock" aria-hidden="true"></i>
										<input class="form-control" type="password" name="haslo" required placeholder="<?=$lgPass?>">
									</div>
									<input type="submit" class="btn btn-primary btn-block" name="login-submit" id="login-submit" tabindex="4" value="Zaloguj się">
								</form>
								
<!-- FORMULARZ LOGOWANIA PACJENTA -->
<?php 
// TODO logowanie pacjenta jescze nie ma 
?>
								<form id="register-form" action="#" method="post" role="form" style="display: none;">
									<div class="form-group">							
										<label><h6><?=$lgEmailLab?></h6></label>
										<i class="fa fa-envelope-o fa-fw"></i></span>
										<input class="form-control" type="email" name="login" id="uLogin" required autofocus placeholder="<?=$lgEmail?>">
									</div>
									<div class="form-group">
									<label><h6><?=$lgPassLab?></h6></label>
									<i class="fa fa-lock" aria-hidden="true"></i>
										<input class="form-control" type="password" name="haslo" required placeholder="<?=$lgPass?>">
									</div>
									<input type="submit" class="btn btn-primary btn-block" name="login-submit" id="login-submit" tabindex="4" value="Zaloguj się">
								</form>
								
								<div class="text-center">
<?php // TODO forget password ?>
									<a class="d-block small mt-3" href="#"><h6><?=$lgForget?></h6></a>
									<a class="d-block small" href="pages/register.php"><h6><?=$lgRej?></h6></a>
						        </div>
						        <br<br><br>
						   </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
			
							