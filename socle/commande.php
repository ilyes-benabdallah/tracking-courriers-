<?php
	/*******************************************************************************
	* Eurequat Algérie                                                             *
	* Socle - Gestion des commandes                                                *
	* Version: 1.0                                                             	   *
	* Date:    19 - 07 - 2015                                                      *
	* Auteurs:  Ilyes BENABDALLAH / Wafaa KAZI AOUEL                               *
	*******************************************************************************/
	include("socle/Actif.php");
	class Commande
	{
	/*
	La fonction creerCommande : cette fonction permet de créer une nouvelle commande, 
	En entrée: informations de la commande
	En sortie: id commande 
	*/
		function creerCommande($type,$statut,$actif,$idClient)
		{
			$type=mysql_real_escape_string($type);
			$statut=mysql_real_escape_string($statut);
			$idClient=mysql_real_escape_string($idClient);
			
			// vérification des entrées (obligatoire)
			if($type=='' or $statut=='') 
			{
				echo("Les champs sont obligatoires!"); 
				exit;
			}
			else
			{		

					$requeteAjouterCommande= mysql_query("INSERT INTO commande (type, statut,clientID) VALUES ('".$type."','".$statut."','$idClient') ") or die('Erreur Requete insertion'.mysql_error());
					if($requeteAjouterCommande)  
					{
						$idCommande= mysql_insert_id();
						
						$objetActif = new Actif();
						$actif= $objetActif->creerActif($actif,$idCommande);
						
					}
					else
					{
						// erreur client non ajouté 
						// trigger_error("Actif non ajouté ");
						echo("Commande non ajouté ");
					}
			
			}
			return $actif;
			

		}
	
	
	
	
	/*
	La fonction lireCommande : cette fonction permet de lire les informations de la commande, 
	En entrée: l'identifiant de la commande 
	En sortie: un tableau qui contient les info de la commande
	*/
		function lireCommande($idCommande)
		{
			//Requete d'affichage des informations de la commande 
				$requete = mysql_query("SELECT * FROM commande WHERE commandeID ='".$idCommande."'") or die(mysql_error());
				//Retourner le nombre de ligne
				$num_rows = mysql_num_rows($requete);
				
				//Tester si le nombre de ligne > 0 
				if ( $num_rows != NULL ) 
				{
					//retourner le résultat de la requete
					$commande=mysql_fetch_assoc($requete);
					return $commande;  
				}
				//sinon le nombre de ligne ==0
				else
				{
					echo ("La commande n'existe pas ");
					return 0;
				}
		



		}
	
	
	/*
	La fonction modifierCommande : cette fonction permet de modifier la commande, 
	En entrée: id commande
	En sortie: message succés
	*/
		function modifierCommande($idCommande)
		{
			$idCommande=mysql_real_escape_string($idCommande);
			$verifierCommande=mysql_query("SELECT * FROM commande WHERE commandeID='$idCommande'") or die(mysql_error());
			$existeCommande=mysql_num_rows($verifierCommande);
			if($existeCommande!=0)
			{
				$typeCommande=mysql_real_escape_string($typeCommande);
				$statutCommande=mysql_real_escape_string($statutCommande);
				
				// vérification des entrées (obligatoire)			
				if($statutCommande=='' or $typeCommande=='' ) 
				{
					echo("Veillez remplir les champs obligatoires!"); 
					exit;
				}
				else
				{		
					
						$requetemodifierClient= mysql_query("
						UPDATE commande
						SET statut='$statutCommande', type='$typeCommande'
						WHERE commandeID = $idCommande 		
						") or die('Error! Requete Modif'.mysql_error());
						
						// vérifier l'ajout de la commande
						if($requetemodifierCommande) 
						{
							return $idCommande;	
						}
						else
						{
							// erreur commande non ajouté 
							// trigger_error("commande non ajouté ");
							echo("commande non ajouté ");
						}
					
				
				}
				
			}
			else
			{
				// trigger_error("Commande introuvable");
				echo("Commande introuvable");
			}


		}
		
		
		
	
	/*
	La fonction supprimerCommande : cette fonction permet de supprimer la commande, 
	En entrée: id commande
	En sortie: message succés
	*/
		function supprimerCommande($idCommande)
		{
			$idCommande=mysql_real_escape_string($idCommande);
			
			//Tester si la commande existe dans la bdd
			if( $idCommande != null)
			{
				//selectionner la commande pour tester si il existe dans la bdd 
				$requete = mysql_query('SELECT * FROM commande WHERE commandeID='.$idCommande) or die('Erreur SQL Select!<br>'.mysql_error());
					
				//Retourner le nombre de ligne
				$num_rows = mysql_num_rows($requete);
					
				//Tester si le nombre de ligne > 0 
				if ( $num_rows != NULL ) 
				{
					//Requete suppimer l'espace 
					//$delete=mysql_query("DELETE FROM actif WHERE commandeID='$idCommande'");
					$delete=mysql_query('DELETE FROM commande WHERE commandeID='.$idCommande);
					//supprimer les actifs 
					
					//récupérer  l'idActif
					$requeteActif=mysql_query('SELECT * FROM actif WHERE commandeID='.$idCommande) or die('Erreur SQL Select actif'.mysql_error());
					$nbrActif = mysql_num_rows($requeteActif);
					if($nbrActif !=null)
					{
						$objetActif = new Actif();
						//Supp tous les actifs
						while ($rowActif = mysql_fetch_array($requeteActif)) 
						{
							$actif= $objetActif->supprimerActif($rowActif["actifID"]);
						}
					}
					//retourner un message de succès 
					$message="Commande supprimée";
					return $message;
				}
				//sinon le nombre de ligne ==0
				else
				{
					echo ("La commande n'existe pas ");
					return 0;				
				}
			}
			//La commande est introuvable 
			else
			{
				// trigger_error("idCommande introuvable");
				echo("idCommande introuvable");
			}	
			
		}// fin fonction supprimerCommande()


		
	
	}
?>