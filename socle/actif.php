<?php
	/*******************************************************************************
	* Eurequat Algérie                                                             *
	* Socle - Gestion des actifs                                                   *
	* Version: 1.0                                                                 *
	* Date:    24 - 07 - 2015                                                      *
	* Auteurs: Ilyes BENABDALLAH / Wafaa KAZI AOUEL                                *
	*******************************************************************************/

	class actif
	{
		/*
		La fonction creerActif : cette fonction permet de créer un actif, 
		En entrée: informations de l'actif
		En sortie: id actif
		*/
			function creerActif($actif,$idCommande)
			{
				
				
				
				for($i = 0; $i < count($actif); ++$i)
				{
					$statutActif[$i]=$actif[$i]['statutActif'];
					$typeEnvoi[$i]= $actif[$i]['typeEnvoi'];//int
					$intituleProduit[$i]= $actif[$i]['intituleProduit'];
					
					$ran= rand (1000,9999);
					$typeEnvoi[$i] = substr($typeEnvoi[$i], 0, 3); 
					$intituleProduit[$i] = substr($intituleProduit[$i], 0, 3); 
					$codeProduit[$i]= $typeEnvoi[$i].$ran.$intituleProduit[$i];
					
					$verifierActif=mysql_query("SELECT actif.actifID FROM actif WHERE codeProduit = '$codeProduit[$i]' ") or die(mysql_error());
					$actifExiste=mysql_num_rows($verifierActif);
						
					if($actifExiste== null)
					{
							
						$requeteAjouterActif1= mysql_query("INSERT INTO actif(statut,codeProduit,commandeID) VALUES('statutActif[$i]', '$codeProduit[$i]',$idCommande") or die(mysql_error());
						$idActif[$i]=mysql_insert_id();
						
					}
					else
					{
						while($actif=mysql_fetch_array($verifierActif))
						{
							$actifID= $actif['actifID'];
							$idActif[$i]=$actifID;
			
						}
						
					}
		
				}
				

			}
			//fin de la fonction creerActif()
			
		
		/*
		La fonction lireActif : cette fonction permet de lire les informations de l'actif, 
		En entrée: l'identifiant de l'actif 
		En sortie: un tableau qui contient les info de l'actif
		*/
			function lireActif($idActif)
			{
				$idActif=mysql_real_escape_string($idActif);
				//Tester si l'actif existe dans la bdd
				if( $idActif != null)
				{
					//Requete d'affichage des infos de l'actif 
					$requete = mysql_query('SELECT * FROM actif where actifID='.$idActif) or die('Erreur SQL 1!'.mysql_error());
					//Retourner le nombre de ligne
					$num_rows = mysql_num_rows($requete);
					//Tester si le nombre de ligne > 0 
						if ( $num_rows != NULL ) 
							{
								//retourner le résultat de la requete dans un tableau "$actif"
								$actif=mysql_fetch_array($requete);
								return $actif; 
							}
						//sinon le nombre de ligne ==0
						else
							{
								trigger_error ("L'actif n'existe pas ");
								
							}
				}
			//L'actif est introuvable 
			else
				{
					trigger_error("idActif est introuvable");
				}
			
			}
			//fin de la fonction lireActif()
			
			
		
			
			/*
		La fonction modifierActif : cette fonction permet de modifier l'actif, 
		En entrée: id actid
		En sortie: idActif
		*/
			function modifierActif($idActif,$actif,$idCommande)
			{
				$idActif=mysql_real_escape_string($idActif);
				$verfierActif=mysql_query("SELECT * FROM actif WHERE actifID ='$idActif'") or die(mysql_error());
				$existeActif= mysql_num_rows($verfierActif);
				if($existeActif !=0)
				{
					$monActif=mysql_fetch_asoc($verfierActif);
					$codeProduit=$monActif['codeProduit'];
					$rand=substr($codeProduit,3,7);
					
					
					$statutActif=$actif['statutActif'];
					$typeEnvoi= $actif['typeEnvoi'];
					$intituleProduit= $actif['intituleProduit'];
					
					$codeProduit= $typeEnvoi.$rand.$intituleProduit;
					
					
					if ($statutActif!='' and $typeEnvoi!='' and $intituleProduit!='')
					{
						
						$verifierActif=mysql_query("SELECT actif.actifID FROM actif WHERE actifID <> '$idActif' and codeProduit = '$codeProduit'") or die(mysql_error());
						$actifExiste=mysql_num_rows($verifierActif);
							
						if($actifExiste=0)
						{
								
							$requeteModifierActif= mysql_query("
							UPDATE actif
							SET codeProduit = '$codeProduit' and statut='$statutActif'
							WHERE actifID = $idActif 		
							") or die(mysql_error());
							
							return $idActif;
							
						}
						else
						{
							while($actif=mysql_fetch_array($verifierActif))
							{
								trigger_error("Cet actif existe déja dans la base de données ");
				
							}
							
						}
					}
					else
					{
						trigger_error("Actif incorrect");
					}
				}
				else
				{
					trigger_error("Adresse introuvable");
				}

				
			}
			//fin de la fonction modifierActif()
			
			
			
			
		/*
		La fonction supprimerActif : cette fonction permet de supprimer l'actif, 
		En entrée: id actif
		En sortie: message succès
		*/
			function supprimerActif($idActif)
			{
				$idActif=mysql_real_escape_string($idActif);
				//Tester si l'actif existe dans la bdd
				if( $idActif != null)
				{
					//selectionner l'actif pour tester si il existe dans la bdd 
					$requete = mysql_query('SELECT * FROM actif WHERE actifID='.$idActif) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
					//Retourner le nombre de ligne
					$num_rows = mysql_num_rows($requete);
					//Tester si le nombre de ligne > 0 
					
					if ( $num_rows != NULL ) 
					{
					
						//suppimer l'actif 
						$delete=mysql_query('DELETE FROM actif WHERE actifID='.$idActif);
						$message="Actif supprimé";
						return $message;
					}
					//sinon le nombre de ligne ==0
					else
					{
						echo ("L'actif n'existe pas ");
						return 0;
					}
				}
				//L'actif est introuvable 
				else
				{
					trigger_error("idActif est introuvable");
				}	
				
			}
			//fin de la fonction supprimerActif()
			
			
	}//fin de la classe