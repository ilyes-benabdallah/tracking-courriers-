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
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>
<div id="contenuImprimer">
	<div class="row" style=" background-color: white;">
		<div class="col-md-6" style=" border:1px solid #000;">
			<br>
			<?php echo $codeProduit;?> <br>
			<?php echo $infoProduit;?> <br>
			<?php echo $expediteurID;?> <br>
			<?php echo $distinataireID;?> <br>
			<?php echo $dateEnvoi;?> <br>
			<?php echo $dateEnvoi;?> <br>
			<img src="barcode.php?text=<?php echo $codeProduit;?>&size=40" alt="testing" />
			<br>
			<br>
		</div>
		<div class="col-md-6" style=" border:1px solid #000;">
			<br>
			<?php echo $codeProduit;?> <br>
			<?php echo $infoProduit;?> <br>
			<?php echo $expediteurID;?> <br>
			<?php echo $distinataireID;?> <br>
			<?php echo $dateEnvoi;?> <br>
			<?php echo $dateEnvoi;?> <br>
			<img src="barcode.php?text=<?php echo $codeProduit;?>&size=40" alt="testing" />
			<br>
			<br>
		</div>
	</div>

	<br>
	<div class="row" style=" background-color: white;">
		<div class="col-md-6" style=" border:1px solid #000;">
			<br>
			<?php echo $codeProduit;?> <br>
			<?php echo $infoProduit;?> <br>
			<?php echo $expediteurID;?> <br>
			<?php echo $distinataireID;?> <br>
			<?php echo $dateEnvoi;?> <br>
			<?php echo $dateEnvoi;?> <br>
			<img src="barcode.php?text=<?php echo $codeProduit;?>&size=40" alt="testing" />
			<br>
			<br>
		</div>
		<div class="col-md-6" style=" border:1px solid #000;">
			<br>
			<?php echo $codeProduit;?> <br>
			<?php echo $infoProduit;?> <br>
			<?php echo $expediteurID;?> <br>
			<?php echo $distinataireID;?> <br>
			<?php echo $dateEnvoi;?> <br>
			<?php echo $dateEnvoi;?> <br>
			<img src="barcode.php?text=<?php echo $codeProduit;?>&size=40" alt="testing" />
			<br>
			<br>
		</div>
	</div>

	<br>
</div>
<div id="printable">
Your Content
</div>
<button class="print" onclick="print('index.php');"> Print this </button>


<?php
	}
	else echo "Cet actif n'existe pas";

}
else echo "Veillez selectionner un actif";

include('footer.php');
?>
<?php ob_flush(); ?>