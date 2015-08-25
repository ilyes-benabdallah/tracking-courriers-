<?php
	/*******************************************************************************
	* Eurequat Algérie                                                             *
	* Socle - Gestion des espaces privé                                            *
	* Version: 1.0                                                                 *
	* Date:    21 - 06 - 2015                                                      *
	* Auteur:  Ilyes BENABDALLAH                                                   *
	*******************************************************************************/

	class EspacePrive 
	{
		/*
		La fonction creerEspace : cette fonction permet de créer un nouveau client, 
		En entrée: informations de l'espace prive
		En sortie: id espace prive
		*/
		function creerEspace($identifiant, $motDePasse, $sphere)
		{
			$identifiant=mysql_real_escape_string($identifiant);
			$motDePasse=mysql_real_escape_string($motDePasse);
			$motDePasse= md5($motDePasse);
			$sphere=mysql_real_escape_string($sphere);
			if ($identifiant !=Null )
			{
				if ($motDePasse != Null)
				{
				
					//vérifier si l'identifiant existe dans la bdd
					$reqIdentifiant=mysql_query('SELECT * FROM espace_prive WHERE identifiant="'.$identifiant.'"') or die(mysql_error());
					//Retourner le nombre de ligne 
					$numIdentifiant=mysql_num_rows($reqIdentifiant);
					//si le nombre de ligne==0 alors lancer la requete d'ajout
					if ( $numIdentifiant == null)
					{   
						//la requete d'ajout
						$requete=mysql_query("INSERT INTO espace_prive (identifiant, motDePasse,sphere)
											VALUES ('".$identifiant."', '".$motDePasse."', '".$sphere."')
											")or die('Erreur SQL !<br>'.mysql_error());
											
						//Retourner un message 
						$espace="Espace créé";
						return $espace;
					}
					//identifiant existe dans la bdd
					else
					{
						echo("l'identifiant existe dans la bdd");
						// trigger_error("l'identifiant existe dans la bdd");
					}
				}
				//mot de passe vide
				else
				{
					echo('mot de passe vide');
					// trigger_error('mot de passe vide');
				}
			}
			//identifiant vide
			else
			{
				echo('identifiant vide');
				// trigger_error('identifiant vide');
			}
			
		}// fin function creerEspace
	

	
		/*
		La fonction lireEspace : fonction permet d'afficher les informations de l'espace
		En entrée: id espace 	
		En sortie: tableau l'espace privé
		*/
		function lireEspace($idEspace)
		{			
			$idEspace=mysql_real_escape_string($idEspace);
			//Tester si l'espace existe dans la bdd
			if( $idEspace != null)
			{
				//Requete d'affichage des infos de l'espace 
				$requete = mysql_query('SELECT * FROM espace_prive where espaceID='.$idEspace) or die('Erreur SQL !<br>'.mysql_error());
				//Retourner le nombre de ligne
				$num_rows = mysql_num_rows($requete);
				//Tester si le nombre de ligne > 0 
					if ( $num_rows != NULL ) 
					{
						//retourner le résultat de la requete dans un tableau "$espace"
						$espace=mysql_fetch_assoc($requete);
						return $espace; 
					}
					//sinon le nombre de ligne ==0
					else
					{
						echo ("L'espace n'existe pas ");
						// trigger_error ("L'espace n'existe pas ");
							
					}
			}
			//L'espace est introuvable 
			else
			{
				echo("idEspace est introuvable");
				// trigger_error("idEspace est introuvable");
			}	
				
		}// fin function lireEspace

		
		
	
		/*
		La fonction existeEspace : fonction permet de virifier l'existance de l'espace privé
		En entrée: id espace 	
		En sortie: tableau l'espace privé
		*/
		function existeEspace($identifiant, $motDePasse)
		{			
			$identifiant=mysql_real_escape_string($identifiant);
			$motDePasse=mysql_real_escape_string($motDePasse);
			//Tester si l'espace existe dans la bdd
			if( $identifiant != null and $motDePasse!= null )
			{
				//Requete d'affichage des infos de l'espace 
				$requete = mysql_query("SELECT * FROM espace_prive where identifiant='$identifiant' and motDePasse='$motDePasse'") or die('Erreur SQL !<br>'.mysql_error());
				//Retourner le nombre de ligne
				$num_rows = mysql_num_rows($requete);
				//Tester si le nombre de ligne > 0 
					if ( $num_rows != 0 ) 
					{
						//retourner l' id de  "$espace"
						$espace=mysql_fetch_assoc($requete);
						$idEspace= $espace['espacePriveID'];
						return $idEspace; 
					}
					//sinon le nombre de ligne ==0
					else
					{
						echo ("<div style='text-align:center;'> L'espace n'existe pas </div>");
						// trigger_error ("L'espace n'existe pas ");
							
					}
			}
			//L'espace est introuvable 
			else
			{
				echo("Identifiant ou mot de passe est introuvable");
				// trigger_error("Identifiant oumot de passe est introuvable");
			}	
				
		}// fin function existeEspace
		
		
		
	
		/*
		La fonction modifierEspace :
		En entrée:information client
		En sortie: tableau espaceModifier
		*/
		function modifierEspace($idEspace,$identifiant,$motDePasse,$sphere) //------------------------------- erreur 
		{
			$idEspace=mysql_real_escape_string($idEspace);
			$identifiant=mysql_real_escape_string($identifiant);
			$motDePasse=mysql_real_escape_string($motDePasse);
			$motDePasse=md5($motDePasse);
			$sphere=mysql_real_escape_string($sphere);
			
			//vérifier que l'idEspace n'est pas null
			if ($idEspace != NULL)
			{
				//vérifier que l'idEspace existe dans la bdd
			    $requeteEspace=mysql_query('SELECT * FROM espace_prive WHERE espacePriveID='.$idEspace) or die('1'.mysql_error());
				
				//Retourner le nombre de ligne 
				$numEspace=mysql_num_rows($requeteEspace);
				
				//l'espace existe dans la bdd
				if($numEspace !=NULL)
				{	
					//vérification du mot de passe
					if ($motDePasse !=NUll)
					{	
						//Vérification de l'identifiant 
						if($identifiant != NULL)
						{
							//vérifier que le nouveau identifiant n'existe pas dans la bdd
							$requete=mysql_query('SELECT * FROM espace_prive WHERE identifiant="'.$identifiant.'"') or die(mysql_error());
							
							//retourner le nombre de ligne
							$numIdentifiant=mysql_num_rows($requete);
							//si l'identifiant n'existe pas dans la bdd
							
							if ($numIdentifiant == 0 )
							{
								//Requete de modification
								$requeteModif=mysql_query('UPDATE espace_prive SET identifiant="'.$identifiant.'",motDePasse="'.$motDePasse.'",sphere="'.$sphere.'" WHERE espacePriveID='.$idEspace)or die('3'.mysql_error());
								//retourner un message de succès 
								$message='espace modifié';
								return $message;
							}
							
							// l'identifiant existe dans la bdd
							else
							{
								echo("L'identifiant existe dans la bdd");
								// trigger_error("L'identifiant existe dans la bdd");
							}
						
						}
						//identifiant vide
						else
						{
							echo("identifiant obligatoire");
							// trigger_error("identifiant obligatoire");
						}
					}
					//mot de passe vide
					else 
					{
						echo("mot de passe obligatoire");
						// trigger_error("mot de passe obligatoire");
					}
				}
				//l'espace n'existe pas dans la bdd
				else
				{
					// trigger_error("Espace privé n'existe pas dans la bdd");
					echo("Espace privé n'existe pas dans la bdd");
				}
			
			}
			//idEspace introuvable
			else
			{
				// trigger_error("l'idEspace introuvable");
				echo("l'idEspace introuvable");
			}
			
		}// fin function modifierEspace
	
		/*
		La fonction supprimerEspace :
		En entrée: idEspace
		En sortie: message de sortie
		*/
		function supprimerEspace($idEspace)
		{
			$idEspace=mysql_real_escape_string($idEspace);
			//Tester si l'espace privé existe dans la bdd
			if( $idEspace != null)
			{
				//selectionner l'espace pour tester si il existe dans la bdd 
				$requete = mysql_query('SELECT * FROM espace_prive WHERE espacePriveID='.$idEspace) or die('Erreur SQL !<br>'.mysql_error());
				
				//Retourner le nombre de ligne
				$num_rows = mysql_num_rows($requete);
				
				//Tester si le nombre de ligne > 0 
					if ( $num_rows != NULL ) 
					{
						//Requete suppimer l'espace 
						$delete=mysql_query('DELETE FROM espace_prive WHERE espacePriveID='.$idEspace);
						//retourner un message de succès 
						$message="Espace privé supprimé";
						return $message;
					}
					//sinon le nombre de ligne ==0
					else
					{
						echo ("L'espace n'existe pas ");
						return 0;
					}
			}
			//Le client est introuvable 
			else
			{
				// trigger_error("idEspace introuvable");
				echo("idEspace introuvable");
			}	
			
		}// fin function supprimerEspace

	}//fin de la classe EspacePrive