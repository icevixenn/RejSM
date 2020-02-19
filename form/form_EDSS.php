<?php 
/* Formularz edycji testu EDSS pacjenta
 * Zapytania do bazy danych o dostępne opcje formularza w: form/form_EDSS_query.php
 * Tabela wyników EDSS tworzona w html_tools/generate_table_EDSS.php
 */
?>
<div class="container">
<div class="row">
<!-- Przygotowanie tabeli DataTables po id=EDSS -->       
<script>
$(document).ready(function() {
    // DataTable
    var table = $('#EDSS').DataTable();	
} );
</script>
<div class="heading">
    <h3 class="form-heading"><?php echo $ed_title?></h3><br>
</div>
<?php 
// Tabela wyników EDSS z możliwością usunięcia danego wpisu 
generateTableEDSS(
		$labels, 	// Etykiety
		$EDSS,	// Dane
		$id_table// ID tabelki do wyświetlenia
		);
if(!$EDSS) $EDSS->free_result();
?>
</div>
</div>

<br><br>

<div class="container">
<div class="row">
	<div class="column">
<!-- ADD NEW EDSS TEST TO PATIENT -->
		<form id="form_add_EDSS" action="../db_tools/add_EDSS.php" method="post" class="form-horizontal" role="form" style="display: block;">
			<div class="heading">
		    	<h3 class="form-heading"><?php echo $ed_add?></h3><br>
		    </div>
		    <div class="form-group">
		    	<input type="hidden" name="id" value="<?php echo $patient_id ?>">
		    	<div class="form-group"><h6>
					<label for="date_add"><?php echo $ed_date_txt?></label>
					<input type="date" name="date_add" id="date_add" value="<?php echo date("Y-m-d");?>">
				</div>
				<h6><?php echo $ed_visual_txt?>
				<select class="form-control" name="visual" id="visual">
					<?php for ($i = 0; $i <= 10; $i++) : ?>
			        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			    	<?php endfor; ?>
				</select>
				<h6><?php echo $ed_brain_txt?>
				<select class="form-control" name="brain" id="brain">
					<?php for ($i = 0; $i <= 10; $i++) : ?>
			        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			    	<?php endfor; ?>
				</select>
				<h6><?php echo $ed_pyram_txt?>
				<select class="form-control" name="pyram" id="pyram">
					<?php for ($i = 0; $i <= 10; $i++) : ?>
			        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			    	<?php endfor; ?>
				</select>
				<h6><?php echo $ed_cerebellar_txt?>
				<select class="form-control" name="cerebellar" id="cerebellar">
					<?php for ($i = 0; $i <= 10; $i++) : ?>
			        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			    	<?php endfor; ?>
				</select>
				<h6><?php echo $ed_sens_txt?>
				<select class="form-control" name="sens" id="sens">
					<?php for ($i = 0; $i <= 10; $i++) : ?>
			        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			    	<?php endfor; ?>
				</select>
				<h6><?php echo $ed_bowel_txt?>
				<select class="form-control" name="bowel" id="bowel">
					<?php for ($i = 0; $i <= 10; $i++) : ?>
			        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			    	<?php endfor; ?>
				</select>
				<h6><?php echo $ed_cerebral_txt?>
				<select class="form-control" name="cerebral" id="cerebral">
					<?php for ($i = 0; $i <= 10; $i++) : ?>
			        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			    	<?php endfor; ?>
				</select>		
<!-- NAZEWNICTWO POBIERANE WCZEŚNIEJ Z BAZY DANYCH -->
				<h6><?php echo $ed_ai_txt?>
				<select class="form-control" name="amb_indx" id="amb_indx">
				<?php
				for ($i=0;$i<mysqli_num_rows($name_AmbIndx);$i++){
					echo "<option value=".$id_ai[$i].">".$name_ai[$i]."</option>"; }?>
				</select>
<!-- NAZEWNICTWO POBIERANE WCZEŚNIEJ Z BAZY DANYCH -->
				<h6><?php echo $ed_help_txt?>
				<select class="form-control" name="help" id="help">
				<?php
				for ($i=0;$i<mysqli_num_rows($result_name_help);$i++){
					echo "<option value=".$id_help[$i].">".$name_help[$i]."</option>"; }?>
				</select>
		
				<h6><?php echo $ed_end_result_txt?>
				<select class="form-control" name="result" id="result">
					<?php $a=0;
					for ($i = 0; $i <= 20; $i++){
						echo '<option value="'.$a.'">'.$a.'</option>';
						$a = $a + 0.5;
					}?>
				</select>
			</div>
			<br>
			<div class="form-group"><h6>
				<button type="submit" name="add_EDSS" id="add_EDSS" class="btn btn-primary">
				<i class="fa fa-plus-circle"></i> <?php echo $ed_add_EDSS?></button>
			</div>
		</form>
	</div>
	<div class="column">
		<div class="heading">
	    	<h3 class="form-heading"></h3><br>
	    </div>
		<h6><?php echo $ed_description?></h6>
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

