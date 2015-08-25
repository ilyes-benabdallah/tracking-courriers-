<?php
	/*******************************************************************************
	* Eurequat Algérie                                                             *
	* Socle - Gestion des Contacts                                                 *
	* Version: 1.0                                                                 *
	* Date:    13 - 08 - 2015                                                      *
	* Auteur:  Ilyes BENABDALLAH                                                   *
	*******************************************************************************/
	
	class Contact 
	{
	
		/*
		La fonction creerContact :
		En entrée: tableau des adresses du client + l'identifiant technique du client
		En sortie: null
		*/
		function creerContact($idAdresse ,$idClient, $typeContact, $nom, $prenom, $intitule, $mail, $numTelephone)
		{
			$nom=mysql_real_escape_string($nom);
			$prenom=mysql_real_escape_string($prenom);
			$intitule=mysql_real_escape_string($intitule);
			$email=mysql_real_escape_string($email);
			$numTelephone=mysql_real_escape_string($numTelephone);
			$idClient=mysql_real_escape_string($idClient);
			$typeContact=mysql_real_escape_string($typeContact);
			
			for($j = 0; $j < count($idAdresse); ++$j)
			{
				$verifierLienClientAdresse=mysql_query("SELECT * FROM contact WHERE adresseID= '$idAdresse[$j]' and clientID='$idClient' and type='$typeContact'") or die(mysql_error());
				$existeLienClienAdresse=mysql_num_rows($verifierLienClientAdresse);
				
				if($existeLienClienAdresse==0)
				{
					$requeteAjouterLienClientAdresse[$j]= mysql_query("INSERT INTO contact (nom, prenom, intitule, email, numTelephone, clientID, adresseID, type) VALUES ('$nom', '$prenom', '$intitule', '$email', '$numTelephone', '$idClient', '$idAdresse[$j]', $typeContact)") or die(mysql_error());

				}
		
			}
			
		}// fin function creerContact
	
			

		/*
		La fonction supprimerContact :
		En entrée: tableau des adresses du client + l'identifiant technique du client
		En sortie: null
		*/
		function supprimerContact($idContact)
		{
			$idConatct=mysql_real_escape_string($idConatct);
			$verifierLienClientAdresse=mysql_query("SELECT * FROM contact WHERE contactID= '$idConatct'") or die(mysql_error());
			$existeLienClienAdresse=mysql_num_rows($verifierLienClientAdresse);
			
			if($existeLienClienAdresse!=0)
			{
				$supprimerContact=mysql_query("DELETE FROM contact WHERE contactID= '$idConatct'") or die(mysql_error());
		
			}
			
		}// fin function supprimerContact
		
		
		/*
		La fonction modifierContact :
		En entrée: tableau des adresses du client + l'identifiant technique du client
		En sortie: null
		*/
		function modifierContact($idContact, $nom, $prenom, $intitule, $email, $numTelephone) // a voir **************
		{
			$nom=mysql_real_escape_string($nom);
			$prenom=mysql_real_escape_string($prenom);
			$intitule=mysql_real_escape_string($intitule);
			$email=mysql_real_escape_string($email);
			$numTelephone=mysql_real_escape_string($numTelephone);
			$idContact=mysql_real_escape_string($idContact);
			
			
			$requeteModifierAdresse= mysql_query("
			UPDATE contact
			SET nom='$nom', prenom='$prenom', intitule= '$intitule', email= '$email', numTelephone= '$numTelephone'
			WHERE contactID = $idContact 		
			") or die(mysql_error());
			
		}// fin function creerContact
	
	} // fin class contact
?>