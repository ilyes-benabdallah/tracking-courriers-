<?php ob_start(); ?>
<?php 
include('config/bd.php');
if($_GET['code'])
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
	<?php echo $codeProduit;?> <br>
	<?php echo $infoProduit;?> <br>
	<?php echo $expediteurID;?> <br>
	<?php echo $distinataireID;?> <br>
	<?php echo $dateEnvoi;?> <br>
	<?php echo $dateEnvoi;?> <br>
	<img src="barcode.php?text=<?php echo $codeProduit;?>&size=40" alt="testing" />
<?php
	}
	else echo "Cet actif n'existe pas";

}
?>
<?php ob_flush(); ?>
<!--img src="barcode.php?text=testing" alt="testing" />


<img src="barcode.php?text=testing&size=40" alt="testing" />

<img src="barcode.php?text=testin&size=40" alt="testing" />


<img src="barcode.php?text=123456789&size=40" alt="testing" />

<img src="barcode.php?text=123jkgh456789&size=40" alt="testing" />

<img src="barcode.php?text=ilyes&size=40" alt="testing" /-->