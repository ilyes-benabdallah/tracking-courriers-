<?php
	/*******************************************************************************
	* Eurequat Alg�rie                                                             *
	* Socle - Gestion des commandes                                                *
	* Version: 1.0                                                             	   *
	* Date:    19 - 07 - 2015                                                      *
	* Auteurs:  Ilyes BENABDALLAH / Wafaa KAZI AOUEL                               *
	*******************************************************************************/
	include("socle/actif.php");
	class commande
	{
	/*
	La fonction creerCommande : cette fonction permet de cr�er une nouvelle commande, 
	En entr�e: informations de la commande
	En sortie: id commande 
	*/
		function creerCommande($type,$statut,$actif)
		{
			$type=mysql_real_escape_string($type);
			$statut=mysql_real_escape_string($statut);
			
			// v�rification des entr�es (obligatoire)
			if($type=='' or $statut=='') 
			{
				echo("Les champs sont obligatoires!"); 
				exit;
			}
			else
			{		
				$verifierCommande=mysql_query("SELECT * FROM commande WHERE type='".$type."' and statut='".$statut."'") or die('Error Requete 1 '.mysql_error());
				$existeCommande=mysql_num_rows($verifierCommande);
				if( $existeCommande != null)
				{
					echo("Cette commande existe dans la base des donnees");
				}
				else
				{
					$requeteAjouterCommande= mysql_query("INSERT INTO commande (type, statut) VALUES ('".$type."','".$statut."') ") or die('Erreur Requete insertion'.mysql_error());
					if($requeteAjouterCommande)  
					{
						$idCommande= mysql_insert_id();
						$objetActif = new Actif();
						$actif= $objetActif->creerActif($actif,$idCommande);
						
					}
					else
					{
						// erreur client non ajout� 
						trigger_error("Actif non ajout� ");
					}

				}
			
			}
			return $idCommande;
			

		}
	
	
	
	
	/*
	La fonction lireCommande : cette fonction permet de lire les informations de la commande, 
	En entr�e: l'identifiant de la commande 
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
					//retourner le r�sultat de la requete
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
			//La commande est introuvable 
			else
			{
				trigger_error("idCommande introuvable");
			}



		}
	
	
	/*
	La fonction modifierCommande : cette fonction permet de modifier la commande, 
	En entr�e: id commande
	En sortie: message succ�s
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
				
				// v�rification des entr�es (obligatoire)			
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
						
						// v�rifier l'ajout de la commande
						if($requetemodifierCommande) 
						{
							return $idCommande;	
						}
						else
						{
							// erreur commande non ajout� 
							trigger_error("commande non ajout� ");
						}
					
				
				}
				
			}
			else
			{
				trigger_error("Commande introuvable");
			}


		}
		
		
		
	
	/*
	La fonction supprimerCommande : cette fonction permet de supprimer la commande, 
	En entr�e: id commande
	En sortie: message succ�s
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
					$delete=mysql_query("DELETE FROM actif WHERE commandeID='$idCommande'");
					$delete=mysql_query('DELETE FROM commade WHERE commandeID='.$idCommande);
					//retourner un message de succ�s 
					$message="Commande supprim�e";
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
					trigger_error("idCommande introuvable");
				}	
				
				
			
		}// fin fonction supprimerCommande()


		}
	
	}
?>