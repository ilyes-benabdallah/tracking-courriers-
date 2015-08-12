<?php
	/*******************************************************************************
	* Eurequat Algérie                                                             *
	* Socle - Gestion des adresses                                                 *
	* Version: 1.0                                                                 *
	* Date:    21 - 06 - 2015                                                      *
	* Auteur:  Ilyes BENABDALLAH                                                   *
	*******************************************************************************/

	class Adresse 
	{

		/*
		La fonction creerAdresseExpediteur :
		En entrée: tableau des adresses du client + l'dentifiant technique du client
		En sortie: null
		*/
		function creerAdresseExpediteur($adressesClient ,$idClient)
		{
			$idAdresse=array();
			$verifierAdresse= self::verifierAdresse($adressesClient);
			if($verifierAdresse==0) echo("adresse incorrect");
			//$nbrLigne = count($adressesClient);
			$i=0;
			
			
			for($i = 0; $i < count($adressesClient); ++$i)
			{
				
				$numVoie[$i]= $adressesClient[$i]['numVoie'];
				$nomVoie[$i]= $adressesClient[$i]['nomVoie'];
				$cpltVoie[$i]= $adressesClient[$i]['cpltVoie'];
				$codePostal[$i]= $adressesClient[$i]['codePostal'];
				$commune[$i]= $adressesClient[$i]['commune'];
				$pays[$i]= $adressesClient[$i]['pays'];
				
				
				$verifierAdresse=mysql_query("SELECT adresse.adresseID FROM adresse WHERE numVoie = '$numVoie[$i]' and nomVoie = '$nomVoie[$i]' and commune = '$commune[$i]' and pays = '$pays[$i]'") or die(mysql_error());
				$adresseExiste=mysql_num_rows($verifierAdresse);
					
				if($adresseExiste== null)
				{
						
					$requeteAjouterAdresse1= mysql_query("INSERT INTO adresse(numVoie, nomVoie, cpltVoie, codePostal, commune, pays) VALUES('$numVoie[$i]', '$nomVoie[$i]', '$cpltVoie[$i]', '$codePostal[$i]', '$commune[$i]', '$pays[$i]') ") or die(mysql_error());
					$idAdresse[$i]=mysql_insert_id();
					
				}
				else
				{
					while($adresses=mysql_fetch_array($verifierAdresse))
					{
						$adresseID= $adresses['adresseID'];
						$idAdresse[$i]=$adresseID;
		
					}
					
				}
	
			}
			
			$ajouterLienClientAdresse=self::creerLienClientAdresse($idAdresse ,$idClient,'expediteur');

			
		}// fin function CreerAdresse
		
				/*
		La fonction modifierAdresse :
		En entrée: tableau des adresses du client + l'dentifiant technique du client
		En sortie: null
		*/
		function modifierAdresse($adressesClient ,$idAdresse)
		{
			$idAdresse=mysql_real_escape_string($idAdresse);
			$verfierAdresse=mysql_query("SELECT * FROM adresse WHERE adresseID ='$idAdresse'") or die(mysql_error());
			$existeAdresse= mysql_num_rows($verfierAdresse);
			if($existeAdresse !=0)
			{

				$numVoie= $adressesClient['numVoie'];
				$nomVoie= $adressesClient['nomVoie'];
				$cpltVoie= $adressesClient['cpltVoie'];
				$codePostal= $adressesClient['codePostal'];
				$commune= $adressesClient['commune'];
				$pays= $adressesClient['pays'];
				
				if ($nomVoie!='' and $commune!='' and $pays!='')
				{
					
					$verifierAdresse=mysql_query("SELECT adresse.adresseID FROM adresse WHERE adresseID='$idAdresse' and numVoie = '$numVoie[$i]' and nomVoie = '$nomVoie[$i]' and commune = '$commune[$i]' and pays = '$pays[$i]'") or die(mysql_error());
					$adresseExiste=mysql_num_rows($verifierAdresse);
						
					if($adresseExiste=0)
					{
							
						$requeteModifierAdresse= mysql_query("
						UPDATE adresse
						SET numVoie='$numVoie', nomVoie='$nomVoie', cpltVoie= '$cpltVoie', codePostal= '$codePostal', commune= '$commune', pays= '$pays'
						WHERE adresseID = $idAdresse 		
						") or die(mysql_error());
						
						return $idAdresse;
						
					}
					else
					{
						while($adresses=mysql_fetch_array($verifierAdresse))
						{
							trigger_error("Cette adresse existe déja dans la base de données ");
			
						}
						
					}
				}
				else
				{
					trigger_error("Adresse incorrecte");
				}
			}
			else
			{
				trigger_error("Adresse introuvable");
			}

			
		}// fin function modifierAdresse
		
		/*
		La fonction supprimerAdresse :
		En entrée: id adresse
		En sortie:
		*/
		function supprimerAdresse($idAdresse , $idClient)
		{
			$idAdresse=mysql_real_escape_string($idAdresse);
			//Tester si le Adresse existe dans la bdd
			if( $idAdresse != null)
			{
				//selectionner le Adresse pour tester si il existe dans la bdd 
				$requete = mysql_query('SELECT * FROM adresse WHERE adresseID='.$idAdresse) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
				//Retourner le nombre de ligne
				$num_rows = mysql_num_rows($requete);
				//Tester si le nombre de ligne > 0 
				
				if ( $num_rows != NULL ) 
				{
				
					
					// supprimer le lien client adresse 
					$requteLienclientAdresse= mysql_query("SELECT * FROM contact WHERE adresseID='$idAdresse' and clientID='$idClient'") or die(mysql_error());
					$nbrLienClientAdresse= mysql_num_rows($requteLienclientAdresse);
					if($nbrLienClientAdresse!=0)
					{
						while($lienClientAdresse=mysql_fetch_array($requteLienclientAdresse))
						{
							$lienClientAdresseID= $lienClientAdresse['lienClientAdresseID'];
							$deleteLienClientAdresse=mysql_query("DELETE FROM contact WHERE lienClientAdresseID='$lienClientAdresseID'");
						}
					}
					
					
					//suppimer l' adresse 
					$verifierLienclienAdresse= mysql_query("SELECT * FROM contact WHERE adresseID='$idAdresse'") or die(mysql_error());
					$existeLienClientAdresse= mysql_num_rows($verifierLienclienAdresse);
					if($existeLienClientAdresse ==0)
					{
						$deleteAdresse=mysql_query("DELETE FROM adresse WHERE adresseID='$idAdresse'");
						$message="Adresse supprimé";
						return $message;
					}
					
				}
				//sinon le nombre de ligne ==0
				else
				{
					echo ("Le Adresse n'existe pas ");
					return 0;
				}
			}
			//Le Adresse est introuvable 
			else
			{
				trigger_error("idAdresse introuvable");
			}	
			
		}// fin function 
		
		/*La fonction verifierAdresse :
		En entrée: tableau des adresses du client
		En sortie: 0 --> adresse non correcte et 1 --> adresse correcte
		*/
		function verifierAdresse($adressesClient)
		{
			
			for($i = 0; $i < count($adressesClient); ++$i)
			{
				$numVoie[$i]= $adressesClient[$i]['numVoie'];
				$nomVoie[$i]= $adressesClient[$i]['nomVoie'];
				$cpltVoie[$i]= $adressesClient[$i]['cpltVoie'];
				$codePostal[$i]= $adressesClient[$i]['codePostal'];
				$commune[$i]= $adressesClient[$i]['commune'];
				$pays[$i]= $adressesClient[$i]['pays'];
				
				if ($nomVoie=='' or $commune=='' or $pays=='') // vérifier l'adresse (les champs obligatoires)
				{
					return 0;
					trigger_error("lien cleint adresse non ajouté ");
					exit;
						
				}
				else
				{
					return 1;
				}
			}
			
			
		}// fin function verifierAdresse
		
//--------------------------------------------------------------------------------------------- lien adresse-client	----------------------------------------------------------------	
		/*
		La fonction CreerLienClientAdresse :
		En entrée: tableau des adresses du client + l'identifiant technique du client
		En sortie: null
		*/
		function creerLienClientAdresse($idAdresse ,$idClient)
		{
			
			
			for($j = 0; $j < count($idAdresse); ++$j)
			{
				$verifierLienClientAdresse=mysql_query("SELECT * FROM contact WHERE adresseID= '$idAdresse[$j]' and clientID='$idClient'") or die(mysql_error());
				$existeLienClienAdresse=mysql_num_rows($verifierLienClientAdresse);
				
				if($existeLienClienAdresse==0)
				{
					$requeteAjouterLienClientAdresse[$j]= mysql_query("INSERT INTO contact (clientID, adresseID) VALUES ('$idClient', '$idAdresse[$j]')") or die(mysql_error());

				}
		
			}
			
		}// fin function CreerLienClientAdresse
	
			

		/*
		La fonction supprimerLienClientAdresse :
		En entrée: tableau des adresses du client + l'identifiant technique du client
		En sortie: null
		*/
		function supprimerLienClientAdresse($idLienClientAdresse)
		{
			$idLienClientAdresse=mysql_real_escape_string($idLienClientAdresse);
			$verifierLienClientAdresse=mysql_query("SELECT * FROM contact WHERE lienClientAdresseID= '$idLienClientAdresse'") or die(mysql_error());
			$existeLienClienAdresse=mysql_num_rows($verifierLienClientAdresse);
			
			if($existeLienClienAdresse!=0)
			{
				$supprimerLienClientAdresse=mysql_query("DELETE FROM contact WHERE lienClientAdresseID= '$idLienClientAdresse'") or die(mysql_error());
		
			}
			
		}// fin function supprimerLienClientAdresse
		
	} // fin class Adresse 


?>