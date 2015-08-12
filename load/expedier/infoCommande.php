
<?php
$nbrPieces=$_GET['nbrPieces'];
for($i = 1; $i <= $nbrPieces; $i++)
{

?>

	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label for="field-4" class="control-label" >Longeur (cm) : *</label>
				<input type="text" name="" placeholder="" id=""/>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="field-4" class="control-label" >Largeur (cm) : *</label>
				<input type="text" name="" placeholder="" id=""/>
			</div>	
		</div>	
		<div class="col-md-3">
			<div class="form-group">
				<label for="field-4" class="control-label" >Hauteur (cm) : *</label>
				<input type="text" name="" placeholder="" id=""/>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="field-4" class="control-label" >Poid (kg) : *</label>
				<input type="text" name="" placeholder="" id=""/>
			</div>
		</div>
	</div>
<?php
}

?>