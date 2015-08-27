<?php ob_start(); ?>
<?php
//session_start();
include('entete.php');


if(isset($_GET['code']))
{

	$idActif= $_GET['code'];

	$actifQuey=mysql_query("SELECT * FROM actif WHERE actifID='$idActif'") or die(mysql_error());
	$existeActif=mysql_num_rows($actifQuey);
	if($existeActif!=0)
	{
		$actif=mysql_fetch_assoc($actifQuey);
		
		$codeProduit = $actif['codeProduit'];
		$infoProduit = $actif['infoProduit'];
		$expediteurID = $actif['expediteurID'];
		$distinataireID = $actif['distinataireID'];
		$dateEnvoi = $actif['dateEnvoi'];
		$commandeID = $actif['commandeID'];
		
?>

<div id="contenuImprimer" >
		<div class="row" style=" background-color: white;">
			<div class="" style=" border:1px solid #000; text-align:center;">
				
				
				<h1>Eurequat Algerie</h1>

				<img src="assets/img/logoe.png" alt="testing" />
				<p>Le spécialiste de l'identification et de la traçabilité</p>
				<br>
			</div>
			
		</div>
		
		<div class="row" style=" background-color: white;">
			<div class="col-md-6" style=" border:1px solid #000; float:left; width:50%;">
				
				<h1 style="text-align:center;">Expediteur</h1>
					<input type="hidden" id="expediteur" value="<?php echo $expediteurID?>">
					<div id="infoExpediteur"></div>

				
				<br>
			</div>
			<div class="col-md-6" style=" border:1px solid #000; float:right; width:50%;">
				
				<h1 style="text-align:center;">Distinataire</h1>
				<input type="hidden" id="distinataire" value="<?php echo $distinataireID?>">
				<div id="infoDistinataire"></div>
				
				<br>
			</div>
		</div>

	
			<script>
				$(document).ready(function(){
									var id = $("#expediteur").val();
									var id2 = $("#distinataire").val();
									$("#infoExpediteur").load("load/expedier/infoContact.php?id="+id);
									$("#infoDistinataire").load("load/expedier/infoContact.php?id="+id2);
								
							});
			</script>
		
		
		<div class="row" style=" background-color: white;">
			<div class="" style=" border:1px solid #000; text-align:center;">
				<br>
				
				<?php echo $infoProduit;?> <br>
				<?php echo $dateEnvoi;?> <br>
				 <br>

				
				<?php echo $codeProduit;?> <br>
				<img src="barcode.php?text=<?php echo $codeProduit;?>&size=40" alt="testing" />
				<br>
				<br>
			</div>
			
		</div>

		<br>
	
</div>

<!--button class="print" onclick="fctprint();" id="print"> Imprimer étiquette </button-->
<div class="" style="    " >
	
	<button style=" width: 280px;     margin-left: 40%;" type="button" class=" print btn btn-lg btn-block btn-info active" onclick="fctprint();" id="print"><i class="fa fa-print pull-left"></i>Imprimer étiquette</button>
	
</div>
<!--a href="newPrint.php?code=<?php echo $idActif;?>" target="_blank"> imprimer</a-->
	<script>
	function fctprint()
	{
		$("#sidebar").css("visibility", 'hidden');
		$(".navbar ").css("visibility", 'hidden');
		$(".print ").css("visibility", 'hidden');

		window.print();
		
		$("#sidebar").css("visibility", 'visible');
		$(".navbar ").css("visibility", 'visible');
		$(".print ").css("visibility", 'visible');
	}
	</script>

<?php //sidebar
	}
	else echo "Cet actif n'existe pas";

}
else echo "Veillez selectionner un actif";

include('footer.php');
?>
<?php ob_flush(); ?>

