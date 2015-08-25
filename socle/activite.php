<?php
	/*******************************************************************************
	* Eurequat Algérie                                                             *
	* Socle - Gestion des activités                                                 *
	* Version: 1.0                                                                 *
	* Date:    16 - 08 - 2015                                                      *
	* Auteur:  wafaa KAZI AOUEL                                                   *
	*******************************************************************************/

	class activite
	{
	/*
	La fonction creerActivite : cette fonction permet de créer une nouvelle activité, 
	En entrée: informations de l'activité
	En sortie: message de succès
	*/
		function creerActivite($statutActivite,$dateFinActivite)
		{
			//$idActivite='';
			$statutActivite=mysql_real_escape_string($statutActivite);
			$dateFinActivite=mysql_real_escape_string($dateFinActivite);
			
			if($dateFinActivite=='' or $statutActivite=='' ) // vérification des entrées (obligatoire)
			{
				echo("Veuillez remplir les champs obligatoires!"); 
				exit;
			}
			else
			{		
				$verifierActivite=mysql_query("SELECT * FROM activite WHERE statut='$statutActivite' and $dateFin='$dateFinActiviter'") or die('Error Select 1 '.mysql_error());
				$existeActivite=mysql_num_rows($verifierActivite);
				if( $existeActivite != null)
				{
					echo("Cette activité existe déja dans la base des donnees");
				}
				else
				{
					$requeteAjouterActivite= mysql_query("INSERT INTO activite (statut, dateFin) VALUES ('$statutActivite','$dateFinActivite') ") or die('Error Ajout'.mysql_error());
					if($requeteAjouterActivite) // vérifier l'ajout de l'activité 
					{
						$message='Activite ajouté';
						return $message;
					}
					else
					{
						// erreur Activite non ajouté 
						trigger_error("lien Activite non ajouté ");
					}
				}
			
			}
			//return $idActivite;
			
		
		}//fin de la fonction creerActivite
		/*
	La fonction lireActivite : cette fonction permer de lire les informations d'une activite
	En entrée: informations de l'activite
	En sortie: tableau Activite
	*/
		function lireActivite($idActivite)
		{
			$idActivite=mysql_real_escape_string($idActivite);
			
			//vérifier que l'Activite existe dans la bdd
			if( $idActivite != null)
			{
				//vérifier si l'Activite existe dans la base de données 
				$requete = mysql_query('SELECT * FROM activite where activiteID='.$idActivite) or die(mysql_error());
				//Retourner le nombre de ligne 
				$num=mysql_num_rows($requete);
				if($num != null)
				{
					//retourner le résultat de la requete dans un tableau
					$activite=mysql_fetch_assoc($requete);
					return $activite;
				}
				//activiteID n'existe pas dans la bdd
				else
				{
					trigger_error("l'Activite n'existe pas dans la base de données");
				}
			}
			//activiteID est vide
			else
			{
				trigger_error("l'idActivite n'existe pas!");
			}
		}//fin fonction lireActivite
	
	/*
	La fonction modifierActivite : cette fonction permet de modifier une activite. 
	En entrée: informations activite
	En sortie: message de succès
	*/
		function modifierActivite($idActivite,$statutActivite, $dateFinActivite)
		{
			$idActivite=mysql_real_escape_string($idActivite);
			$verifierActivite=mysql_query("SELECT * FROM activite WHERE activiteID=$idActivite") or die('Error de SELECT 1'.mysql_error());
			$existeActivite=mysql_num_rows($verifierActivite);
			if($existeActivite!=0)
			{
				$statutActivite=mysql_real_escape_string($statutActivite);
				$dateFinActivite=mysql_real_escape_string($dateFinActivite);
						
				if($statutActivite=='' or $dateFinActivite=='' ) // vérification des entrées (obligatoire)
				{
					echo("Veuillez remplir les champs obligatoires!"); 
					exit;
				}
				else
				{		
					$verifierActivite=mysql_query("SELECT * FROM activite WHERE activiteID <> $idActivite and statut='$statutActivite' and dateFin='$dateFinActivite'") or die('Error SELECT 2'.mysql_error());
					$existeActivite=mysql_num_rows($verifierActivite);
					if( $existeActivite != null)
					{
						echo("Cette activité existe déja dans la base des donnees");
					}
							else
							{
								$requetemodifierActivite= mysql_query("
								UPDATE activite
								SET statut='$statutActivite' and dateFin='$dateFinActivite'
								WHERE activiteID = $idactivite		
								") or die('Error Requete modification'.mysql_error());
								if($requetemodifierActivite) // vérifier ajout de l'Activite
								{
									return $idActivite;
								}
								else
								{
									// erreur Activite non ajouté 
									trigger_error("lien Activite non ajouté ");
								}
							}
					
					}				//return $idActivite;
			}
			else
			{
				trigger_error("Activite introuvable");
			}
		}//fin fonction modifierActivite
	
	/*
	La fonction supprimerActivite : cette fonction permet de supprimer une Activité, 
	En entrée: id Activite
	En sortie: message succès
	*/
		function supprimerActivite($idActivite)
		{
			$idActivite=mysql_real_escape_string($idActivite);
			//Tester si l'Activite existe dans la bdd
			if( $idActivite != null)
			{
				//selectionner l'Activite pour tester si il existe dans la bdd 
				$requete = mysql_query('SELECT * FROM activite WHERE activiteID='.$idActivite) or die('Erreur SQL Select'.mysql_error());
				
				//Retourner le nombre de ligne
				$num_rows = mysql_num_rows($requete);
				
				//Tester si le nombre de ligne > 0 
					if ( $num_rows != NULL ) 
					{
							//Requete suppimer l'Activite 
							$delete=mysql_query('DELETE FROM activite WHERE activiteID='.$idActivite);
							//retourner un message de succès 
							$message="Activite supprimé";
							return $message;
					}
					//sinon le nombre de ligne ==0
					else  
					{
						echo ("L'Activite n'existe pas ");
						return 0;
					}
			}
			//L'Activite est introuvable 
			else
			{
				trigger_error("idActivite introuvable");
			}	
			
		}//fin fonction supprimerActivite
	
		
	}//fin de la classe