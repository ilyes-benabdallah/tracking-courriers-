<div class="bd-blue" style="text-align:left;">
	<?php 
	include("../../config/bd.php");
	
	
	if (isset($_GET['id']))
	{
		$idContact= mysql_real_escape_string($_GET['id']);
		$getContact = mysql_query("SELECT * FROM contact WHERE contactID='$idContact'") or die(mysql_error());
		$contact = mysql_fetch_assoc($getContact);
		$nom= $contact['nom'];
		$prenom= $contact['prenom'];
		$intitule= $contact['intitule'];
		$email= $contact['email'];
		$numTelephone= $contact['numTelephone'];
		$idAdresse= $contact['adresseID'];
		
		$getAdresse=mysql_query("SELECT * FROM adresse WHERE adresseID='$idAdresse'") or die(mysql_error());
		$adresse= mysql_fetch_assoc($getAdresse);
		$numVoie=$adresse['numVoie'];
		$nomVoie=$adresse['nomVoie'];
		$cpltVoie=$adresse['cpltVoie'];
		$codePostal=$adresse['codePostal'];
		$commune=$adresse['commune'];
		$pays=$adresse['pays'];
	}
	?>
	
	
	
	<?php echo $prenom.' '.$nom;?> <br>
	<?php echo $intitule;?> <br>
	<?php if($numVoie!='') echo " N° ".$numVoie;?> <?php echo $nomVoie;?> <br>
	<?php echo $cpltVoie;?><br>
	<?php echo $commune;?><br>
	<?php if($pays!='') echo $pays.',';?> <?php echo $codePostal;?><br>
	<?php echo $numTelephone;?><br>
	<?php echo $email;?>
								
</div>