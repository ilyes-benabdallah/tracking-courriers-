<?php
	/*******************************************************************************
	* Eurequat Algérie                                                             *
	* Socle - Gestion des adresses                                                 *
	* Version: 1.0                                                                 *
	* Date:    21 - 06 - 2015                                                      *
	* Auteur:  Ilyes BENABDALLAH                                                   *
	*******************************************************************************/
	include("socle/Contact.php");
	class Adresse 
	{

		/*
		La fonction creerAdresseExpediteur :
		En entrée: tableau des adresses du client + l'dentifiant technique du client
		En sortie: null
		*/
		function creerAdresseExpediteur($adressesClient ,$idClient, $intitule)
		{
		$objectContact = new Contact();
			$idAdresse=array();
			$verifierAdresse= $objectContact->verifierAdresse($adressesClient);
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
				
				$numVoie[$i]= mysql_real_escape_string($numVoie[$i]);
				$nomVoie[$i]= mysql_real_escape_string($nomVoie[$i]);
				$cpltVoie[$i]= mysql_real_escape_string($cpltVoie[$i]);
				$codePostal[$i]= mysql_real_escape_string($codePostal[$i]);
				$commune[$i]= mysql_real_escape_string($commune[$i]);
				$pays[$i]= mysql_real_escape_string($pays[$i]);
				
				
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
			
			
			$infoClientQuery = mysql_query("SELECT * FROM client WHERE clientID= '$idClient'") or die(mysql_error());
			$infoClient = mysql_fetch_assoc($infoClientQuery);
		
			$nom =$infoClient['nom'];
			$prenom =$infoClient['nom'];
			$email =$infoClient['email'];
			
			if(($infoClient['telMobile'])!= '')
			{
				$numTelephone =$infoClient['telMobile'];
			}
			elseif(($infoClient['telFixe'])!='')
			{
				$numTelephone =$infoClient['telFixe'];
			}
			else $numTelephone =$infoClient['telMobile'];
			
			$intitule = mysql_real_escape_string($intitule);
			
			
			$ajouterConatct=$objectContact->creerContact($idAdresse ,$idClient,'expediteur' , $nom, $prenom, $intitule, $mail, $numTelephone);

			
		}// fin function CreerAdresse
		
		
		/*
		La fonction creerAdresseDistinataire :
		En entrée: tableau des adresses d'un contact client + l'dentifiant technique du client
		En sortie: null
		*/
		function creerAdresseDistinataire($adressesClient ,$idClient, $nom, $prenom, $intitule, $email, $numTelephone)
		{
				$objectContact= new Contact();
				
				$nomContact= $nom;
				$prenomContact= $prenom;
				$intitueContact= $intitule;
				$mailContact= $email;
				$numTelephoneContact= $numTelephone;
				$numVoie= $adressesClient['numVoie'];
				$nomVoie= $adressesClient['nomVoie'];
				$cpltVoie= $adressesClient['cpltVoie'];
				$codePostal= $adressesClient['codePostal'];
				$commune= $adressesClient['commune'];
				$pays= $adressesClient['pays'];
				
				
				
			
				$nomContact= mysql_real_escape_string($nomContact);
				$prenomContact= mysql_real_escape_string($prenomContact);
				$intitueContact= mysql_real_escape_string($intitueContact);
				$mailContact= mysql_real_escape_string($mailContact);
				$numTelephoneContact= mysql_real_escape_string($numTelephoneContact);
				$numVoie= mysql_real_escape_string($numVoie);
				$nomVoie= mysql_real_escape_string($nomVoie);
				$cpltVoie= mysql_real_escape_string($cpltVoie);
				$codePostal= mysql_real_escape_string($codePostal);
				$commune= mysql_real_escape_string($commune);
				$pays= mysql_real_escape_string($pays);
				
				
				$verifierAdresse=mysql_query("SELECT adresse.adresseID FROM adresse WHERE numVoie = '$numVoie' and nomVoie = '$nomVoie' and commune = '$commune' and pays = '$pays'") or die(mysql_error());
				$adresseExiste=mysql_num_rows($verifierAdresse);
					
				if($adresseExiste== null)
				{
						
					$requeteAjouterAdresse1= mysql_query("INSERT INTO adresse(numVoie, nomVoie, cpltVoie, codePostal, commune, pays) VALUES('$numVoie', '$nomVoie', '$cpltVoie', '$codePostal', '$commune', '$pays') ") or die(mysql_error());
					$idAdresse=mysql_insert_id();
					
				}
				else
				{
					while($adresses=mysql_fetch_array($verifierAdresse))
					{
						$adresseID= $adresses['adresseID'];
						$idAdresse=$adresseID;
		
					}
					
				}
	
		
			
			$ajouterConatct=$objectContact->creerContact($idAdresse ,$idClient,'distinataire' , $nom, $prenom, $intitule, $mail, $numTelephone);

			
		}// fin function CreerAdresse
		
				/*
		La fonction modifierAdresse :
		En entrée: tableau des adresses du client + l'dentifiant technique du client
		En sortie: null
		*/
		function modifierAdresse($adressesClient ,$idAdresse, $nom, $prenom, $intitule, $email, $numTelephone, $idContact)
		{
			$idAdresse=mysql_real_escape_string($idAdresse);
			$verfierAdresse=mysql_query("SELECT * FROM adresse WHERE adresseID ='$idAdresse'") or die(mysql_error());
			$existeAdresse= mysql_num_rows($verfierAdresse);
			if($existeAdresse !=0)
			{
				$objectContact= new Contact();
				$numVoie= $adressesClient['numVoie'];
				$nomVoie= $adressesClient['nomVoie'];
				$cpltVoie= $adressesClient['cpltVoie'];
				$codePostal= $adressesClient['codePostal'];
				$commune= $adressesClient['commune'];
				$pays= $adressesClient['pays'];
				
				if ($nomVoie!='' and $commune!='' and $pays!='')
				{
					
					$verifierAdresse=mysql_query("SELECT adresse.adresseID FROM adresse WHERE adresseID !='$idAdresse' and numVoie = '$numVoie' and nomVoie = '$nomVoie' and commune = '$commune' and pays = '$pays'") or die(mysql_error());
					$adresseExiste=mysql_num_rows($verifierAdresse);
						
					if($adresseExiste=0)
					{
							
						$requeteModifierAdresse= mysql_query("
						UPDATE adresse
						SET numVoie='$numVoie', nomVoie='$nomVoie', cpltVoie= '$cpltVoie', codePostal= '$codePostal', commune= '$commune', pays= '$pays'
						WHERE adresseID = $idAdresse 		
						") or die(mysql_error());
						$ajouterConatct=$objectContact->modifierContact($idContact, $nom, $prenom, $intitule, $email, $numTelephone);
						return $idAdresse;
						
					}
					else
					{
						
							trigger_error("Cette adresse existe déja dans la base de données ");
			
						
						
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
		


		
	} // fin class Adresse 


?>