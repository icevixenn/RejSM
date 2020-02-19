<?php 
/* Formularz edycji testu Ambulation Index pacjenta
 * Zapytania do bazy danych o dostępne opcje formularza w: form/form_ai_query.php
 */
require_once '../db_tools/queryDB.php';
require_once "../lang/$lang/form_ai.php";
// AI danego pacjenta
$query_AI = "SELECT * FROM AT_amb_indx WHERE ID = '$patient_id'";
$result_AI = queryDB($query_AI);
?>

<div class="container">
<div class="row">
	<div class="column">
<!-- 1 FORM: DELETE AI TEST  -->
		<form id="ai_delete_form" action="../db_tools/delete_ai.php" method="post" class="form-horizontal" role="form" style="display: block;">
			<div class="heading">
		    	<h3 class="form-heading"><?php echo $ai_title?></h3><br>
		    </div>
		    <div class="form-group"><h6>
				<label for="ai_delete"><?php echo $ai_show?>
				<a href="#" data-toggle="tooltip" data-placement="right" title="<?php echo $tooltip?>"><i class="fa fa-question-circle-o"></i></a>	
				</label>
			    <select multiple class="form-control" id="ai_delete" name="ai_delete[]">
			      <?php                       
			      if(!(mysqli_num_rows($result_AI)>0)) {
                                echo  '<option value="" disabled>Brak badań</option>';  
                            }
                            else {
                            	while($row_result_AI= $result_AI->fetch_assoc())
                            		echo  '<option value="'.$row_result_AI['ID_AI'].'">'.$row_result_AI['date'].'&nbsp;'.$ai_result . $row_result_AI['result'].'</option>';
                            }
				?>
			    </select>
			</div>
			<div class="form-group"><h6>
				<button type="submit" name="remove_ai" id="remove_ai" class="btn btn-primary" <?php if(!(mysqli_num_rows($result_AI)>0)) echo "disabled"?>>
				<i class="fa fa-times"></i> <?php echo $ai_delete?></button>
			</div>
		</form>
		
<!-- 2 FORM: ADD NEW AI TEST TO PATIENT -->
		<form id="form_add_ai" action="../db_tools/add_ai.php" method="post" class="form-horizontal" role="form" style="display: block;">
			<div class="heading">
		    	<h3 class="form-heading"><?php echo $ai_title?></h3><br>
		    </div>
		    <div class="form-group">
		    	<input type="hidden" name="id" value="<?php echo $patient_id ?>">
		    	<div class="form-group"><h6>
					<label for="date_add"><?php echo $ai_date?></label>
					<input type="date" name="date_add" id="date_add" value="<?php echo date("Y-m-d");?>">
				</div>
				<h6><?php echo $ai_result?>
				<select class="form-control" name="result" id="result">
					<?php for ($i = 0; $i <= 9; $i++) : ?>
			        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			    	<?php endfor; ?>
				</select>
			</div>
			<div class="form-group"><h6>
				<button type="submit" name="add_AI" id="add_AI" class="btn btn-primary">
				<i class="fa fa-plus-circle"></i> <?php echo $ai_add?></button>
			</div>
		</form>
	</div>
<!-- 3: DESCRIPTION OF RESULTS -->
	<div class="column">
		<div class="heading">
			    	<h3 class="form-heading"><?php echo $ai_desc_title?></h3><br>
			    </div>
		<h6><?php echo $ai_description ?></h6>
	</div>
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

