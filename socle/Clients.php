<?php
	/*******************************************************************************
	* Eurequat Algérie                                                             *
	* Socle - Gestion des clients                                                  *
	* Version: 1.0                                                                 *
	* Date:    18 - 06 - 2015                                                      *
	* Auteur:  Ilyes BENABDALLAH                                                   *
	*******************************************************************************/
	include("socle/Adresses.php");
	class Client 
	{
    
	/*
	La fonction creerClient : cette fonction permet de créer un nouveau client, 
	En entrée: informations client 
	En sortie: id client (succée) ; méssage d'erreur (erreur)
	*/
		function creerClient($nomClient, $prenomClient, $emailClient, $telMobileClient, $telFixeClient, $telFaxClient, $raisonSocialeClient, $civilite, $numRegistreCommerceClient, $numFiscaleClient, $logoClient, $siteWebClient, $dateDebutContratClient, $dateFinContratClient, $statutClient, $adressesClient)
		{
			$idClient='';
			
			$nomClient=mysql_real_escape_string($nomClient);
			$prenomClient=mysql_real_escape_string($prenomClient);
			$emailClient=mysql_real_escape_string($emailClient);
			$telMobileClient=mysql_real_escape_string($telMobileClient);
			$telFixeClient=mysql_real_escape_string($telFixeClient);
			$telFaxClient=mysql_real_escape_string($telFaxClient);
			$raisonSocialeClient=mysql_real_escape_string($raisonSocialeClient);
			$civilite=mysql_real_escape_string($civilite);
			$numRegistreCommerceClient=mysql_real_escape_string($numRegistreCommerceClient);
			$numFiscaleClient=mysql_real_escape_string($numFiscaleClient);
			$logoClient=mysql_real_escape_string($logoClient);
			$siteWebClient=mysql_real_escape_string($siteWebClient);
			//$dateEnregistrementClient=mysql_real_escape_string($dateEnregistrementClient);
			$dateDebutContratClient=mysql_real_escape_string($dateDebutContratClient);
			$dateFinContratClient=mysql_real_escape_string($dateFinContratClient);
			$statutClient=mysql_real_escape_string($statutClient);
			
			if($nomClient=='' or $prenomClient=='' or $statutClient=='' or empty($adressesClient)) // vérification des entrées (obligatoire)
			{
				echo("Veillez remplir les champs obligatoires!"); 
				exit;
			}
			else
			{		
				$verifierClient=mysql_query("SELECT * FROM client WHERE nom='$nomClient' and prenom='$prenomClient' and email='$emailClient'") or die(mysql_error());
				$existeClient=mysql_num_rows($verifierClient);
				if( $existeClient != null)
				{
					echo("Ce client existe déja dans la base des donnees");
				}
				else
				{
					$requeteAjouterClient= mysql_query("INSERT INTO client (nom, prenom, email, telMobile, telFixe, telFax, raisonSociale, civilite, numRegistreCommerce, numFiscal, logo, siteWeb, dateDebutContrat, dateFinContrat, statut) VALUES ('$nomClient', '$prenomClient', '$emailClient', '$telMobileClient', '$telFixeClient', '$telFaxClient', '$raisonSocialeClient','$civilite', '$numRegistreCommerceClient', '$numFiscaleClient', '$logoClient', '$siteWebClient', '$dateDebutContratClient', '$dateFinContratClient', '$statutClient') ") or die(mysql_error());
					if($requeteAjouterClient) // vérifier ajoux du client 
					{
						
						$idClient=mysql_insert_id();
						//$idClient=1;
						$i=0;
						$objectAdresse = new Adresse();
						$ad= $objectAdresse->creerAdresse($adressesClient ,$idClient);
						
					}
					else
					{
						// erreur client non ajouté 
						echo("lien client non ajouté ");
						// trigger_error("lien client non ajouté ");
					}
				}
			
			}
			return $idClient;
			
		}
	// fin function creerClient(créer client)

	
	/*
	La fonction lireClient :
	En entrée: id client 	
	En sortie: informations du client
	*/
		function lireClient($idClient)
		{
			$idClient=mysql_real_escape_string($idClient);
			//Tester si le client existe dans la bdd
			if( $idClient != 0)
			{
				//Requete d'affichage des infos du client 
				$requete = mysql_query("SELECT * FROM client WHERE clientID ='$idClient'") or die(mysql_error());
				//Retourner le nombre de ligne
				$num_rows = mysql_num_rows($requete);
				
				//Tester si le nombre de ligne > 0 
				if ( $num_rows != NULL ) 
				{
					//retourner le résultat de la requete
					$client=mysql_fetch_assoc($requete);
					return $client;  
				}
				//sinon le nombre de ligne ==0
				else
				{
					echo ("Le client n'existe pas ");
					return 0;
				}
			}
			//Le client est introuvable 
			else
			{
				echo("idClient introuvable");
				// trigger_error("idClient introuvable");
			}	
		}

	// fin function 
	
	
	
	/*
	La fonction lireClient : lire les info du client en utlisant un id de l'espace privé
	En entrée: id client 	
	En sortie: informations du client
	*/
		function lireClientEspace($idEspacePrive)
		{
			$idEspacePrive=mysql_real_escape_string($idEspacePrive);
			//Tester si le client existe dans la bdd
			if( $idEspacePrive != 0)
			{
				//Requete d'affichage des infos du client 
				$requete = mysql_query("SELECT * FROM client WHERE espacePriveID ='$idEspacePrive'") or die(mysql_error());
				//Retourner le nombre de ligne
				$num_rows = mysql_num_rows($requete);
				
				//Tester si le nombre de ligne > 0 
				if ( $num_rows != NULL ) 
				{
					//retourner le résultat de la requete
					$client=mysql_fetch_assoc($requete);
					return $client;  
				}
				//sinon le nombre de ligne ==0
				else
				{
					echo ("<div style='text-align:center;'> cet espace n'est associé à aucun client </div>");
					return 0;
				}
			}
			//Le client est introuvable 
			else
			{
				echo("idEspacePrive introuvable");
				// trigger_error("idEspacePrive introuvable");
			}	
		}

	// fin function 
		/*
	La fonction lireClient :
	En entrée:
	En sortie:
	*/
		function modifierClient($idClient, $nomClient, $prenomClient, $emailClient, $telMobileClient, $telFixeClient, $telFaxClient, $raisonSocialeClient, $civilite, $numRegistreCommerceClient, $numFiscaleClient, $logoClient, $siteWebClient, $dateDebutContratClient, $dateFinContratClient, $statutClient, $adressesClient)
		{
			
			$idClient=mysql_real_escape_string($idClient);
			$vérifierClient=mysql_query("SELECT * FROM client WHERE clientID='$idClient'") or die(mysql_error());
			$existeClient=mysql_num_rows($vérifierClient);
			if($existeClient!=0)
			{
				$nomClient=mysql_real_escape_string($nomClient);
				$prenomClient=mysql_real_escape_string($prenomClient);
				$emailClient=mysql_real_escape_string($emailClient);
				$telMobileClient=mysql_real_escape_string($telMobileClient);
				$telFixeClient=mysql_real_escape_string($telFixeClient);
				$telFaxClient=mysql_real_escape_string($telFaxClient);
				$raisonSocialeClient=mysql_real_escape_string($raisonSocialeClient);
				$civilite=mysql_real_escape_string($civilite);
				$numRegistreCommerceClient=mysql_real_escape_string($numRegistreCommerceClient);
				$numFiscaleClient=mysql_real_escape_string($numFiscaleClient);
				$logoClient=mysql_real_escape_string($logoClient);
				$siteWebClient=mysql_real_escape_string($siteWebClient);
				//$dateEnregistrementClient=mysql_real_escape_string($dateEnregistrementClient);
				$dateDebutContratClient=mysql_real_escape_string($dateDebutContratClient);
				$dateFinContratClient=mysql_real_escape_string($dateFinContratClient);
				$statutClient=mysql_real_escape_string($statutClient);
				
							
				if($nomClient=='' or $prenomClient=='' or $statutClient=='' or empty($adressesClient)) // vérification des entrées (obligatoire)
				{
					echo("Veillez remplir les champs obligatoires!"); 
					exit;
				}
				else
				{		
					$verifierClient=mysql_query("SELECT * FROM client WHERE clientID!= $idClient and nom='$nomClient' and prenom='$prenomClient' and email='$emailClient'") or die(mysql_error());
					$existeClient=mysql_num_rows($verifierClient);
					if( $existeClient != null)
					{
						echo("Ce client existe déja dans la base des donnees");
					}
					else
					{
						$requetemodifierClient= mysql_query("
						UPDATE client
						SET nom='$nomClient', prenom='$prenomClient', email= '$emailClient', telMobile= '$telMobileClient', telFixe= '$telFixeClient', telFax= '$telFaxClient', raisonSociale= '$raisonSocialeClient', civilite= '$civilite', numRegistreCommerce= '$numRegistreCommerceClient', numFiscal= '$numFiscaleClient', logo= '$logoClient', siteWeb= '$siteWebClient', dateDebutContrat= '$dateDebutContratClient', dateFinContrat= '$dateFinContratClient', statut= '$statutClient'
						WHERE clientID = $idClient 		
						") or die(mysql_error());
						if($requetemodifierClient) // vérifier ajoux du client 
						{
							
							//echo $idClient;
							return $idClient;
							//$idClient=1;
							//$i=0;
							//$objectAdresse = new Adresse();
							//$ad= $objectAdresse->creerAdresse($adressesClient ,$idClient);
							
						}
						else
						{
							// erreur client non ajouté 
							echo("lien client non ajouté ");
							// trigger_error("lien client non ajouté ");
						}
					}
				
				}
				//return $idClient;
			}
			else
			{
				echo("Client introuvable");
				// trigger_error("Client introuvable");
			}
		}

	// fin function 
	
		/*
		La fonction lireClient :
		En entrée: id client
		En sortie:
		*/
		function supprimerClient($idClient)
		{
			$idClient=mysql_real_escape_string($idClient);
			//Tester si le client existe dans la bdd
			if( $idClient != null)
			{
				//selectionner le client pour tester si il existe dans la bdd 
				$requete = mysql_query('SELECT * FROM client WHERE clientID='.$idClient) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
				//Retourner le nombre de ligne
				$num_rows = mysql_num_rows($requete);
				//Tester si le nombre de ligne > 0 
				
				if ( $num_rows != NULL ) 
				{
				
					// supprimer les liens clients adresse -------------------------------------------- a ajouter
					$requteLienclienAdresse= mysql_query("SELECT * FROM lien_client_adresse WHERE clientID='$idClient'") or die(mysql_error());
					$nbrLienClientAdresse= mysql_num_rows($requteLienclienAdresse);
					if($nbrLienClientAdresse!=0)
					{
						while($lienClientAdresse=mysql_fetch_array($requteLienclienAdresse))
						{
							$lienClientAdresseID= $lienClientAdresse['lienClientAdresseID'];
							$deleteLienClientAdresse=mysql_query("DELETE FROM lien_client_adresse WHERE lienClientAdresseID='$lienClientAdresseID'");
						}
					}
					
					//suppimer mle client 
					$delete=mysql_query('DELETE FROM client WHERE clientID='.$idClient);
					
				
					$message="Client supprimé";
					return $message;
				}
				//sinon le nombre de ligne ==0
				else
				{
					echo ("Le client n'existe pas ");
					return 0;
				}
			}
			//Le client est introuvable 
			else
			{
				echo("idClient introuvable");
				// trigger_error("idClient introuvable");
			}	
			
		}// fin function 

	
	} // fin class Client


?>