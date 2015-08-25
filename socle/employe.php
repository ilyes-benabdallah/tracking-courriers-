<?php
	/*******************************************************************************
	* Eurequat Algérie                                                             *
	* Socle - Gestion des employes                                                 *
	* Version: 1.0                                                                 *
	* Date:    30 - 06 - 2015                                                      *
	* Auteur:  Ileys BENABDALLAH / wafaa KAZI AOUEL                                *
	*******************************************************************************/

	class Employe 
	{
	/*
	La fonction creerEmploye : cette fonction permet de créer un nouveau employes, 
	En entrée: informations de l'employes
	En sortie: message de succés
	*/
		function creerEmploye($nomEmploye, $prenomEmploye, $emailEmploye,$telMobileEmploye,$telFixeEmploye,$telFaxEmploye,$civiliteEmploye)
		{
			//$idEmploye='';
			$nomEmploye=mysql_real_escape_string($nomEmploye);
			$prenomEmploye=mysql_real_escape_string($prenomEmploye);
			$emailEmploye=mysql_real_escape_string($emailEmploye);
			$telMobileEmploye=mysql_real_escape_string($telMobileEmploye);
			$telFixeEmploye=mysql_real_escape_string($telFixeEmploye);
			$telFaxEmploye=mysql_real_escape_string($telFaxEmploye);
			$civiliteEmploye=mysql_real_escape_string($civiliteEmploye);
			
			if($nomEmploye=='' or $prenomEmploye=='' or $emailEmploye=='' ) // vérification des entrées (obligatoire)
			{
				echo("Veuillez remplir les champs obligatoires!"); 
				exit;
			}
			else
			{		
				$verifierEmploye=mysql_query("SELECT * FROM employe WHERE nom='$nomEmploye' and prenom='$prenomEmploye' and email='$emailEmploye'") or die('Error Select 1 '.mysql_error());
				$existeEmploye=mysql_num_rows($verifierEmploye);
				if( $existeEmploye != null)
				{
					echo("Cet Employe existe déja dans la base des donnees");
				}
				else
				{
					$requeteAjouterEmploye= mysql_query("INSERT INTO employe (nom, prenom, email, telMobile, telFixe, telFax, civilite) VALUES ('$nomEmploye', '$prenomEmploye', '$emailEmploye', '$telMobileEmploye', '$telFixeEmploye', '$telFaxEmploye', '$civiliteEmploye') ") or die('Error Ajout'.mysql_error());
					if($requeteAjouterEmploye) // vérifier ajout de l'employe 
					{
						
						$message='Employe ajouté';
						return $message;
						
					}
					else
					{
						// erreur Employe non ajouté 
						trigger_error("lien employe non ajouté ");
					}
				}
			
			}
			//return $idEmploye;
			
		}//fin fonction creerEmploye
		
	/*
	La fonction lireEmploye : cette fonction permet de lire les informations d'un employe
	En entrée: informations de l'employe
	En sortie: tableau employe
	*/
		function lireEmploye($idEmploye)
		{
			$idEmploye=mysql_real_escape_string($idEmploye);
			
			//vérifier que l'espace existe dans la bdd
			if( $idEmploye != null)
			{
				//vérifier si l'employe existe dans la bdd (requete de sélection ) 
				$requete = mysql_query('SELECT * FROM employe where employeID='.$idEmploye) or die(mysql_error());
				//Retourner le nombre de ligne 
				$num=mysql_num_rows($requete);
				if($num != null)
				{
					//retourner le résultat de la requete dans un tableau
					$employe=mysql_fetch_assoc($requete);
					return $employe;
				}
				//employeID n'existe pas dans la bdd
				else
				{
					trigger_error("l'employe n'existe pas dans la bdd");
				}
			}
			//employeID est vide
			else
			{
				trigger_error("l'idEmploye n'existe pas");
			}
		}//fin fonction lireEmploye
		
		
		
		
	
	/*
	La fonction modifierEmploye : cette fonction permet de modifier un employe, 
	En entrée: informations employe
	En sortie: message de succés
	*/
		function modifierEmploye($idEmploye,$nomEmploye, $prenomEmploye, $emailEmploye,$telMobileEmploye,$telFixeEmploye,$telFaxEmploye,$civiliteEmploye)
		{
			$idEmploye=mysql_real_escape_string($idEmploye);
			$verifierEmploye=mysql_query("SELECT * FROM employe WHERE employeID='$idEmploye'") or die(mysql_error());
			$existeEmploye=mysql_num_rows($verifierEmploye);
			if($existeEmploye!=0)
			{
				$nomEmploye=mysql_real_escape_string($nomEmploye);
				$prenomEmploye=mysql_real_escape_string($prenomEmploye);
				$emailEmploye=mysql_real_escape_string($emailEmploye);
				$telMobileEmploye=mysql_real_escape_string($telMobileEmploye);
				$telFixeEmploye=mysql_real_escape_string($telFixeEmploye);
				$telFaxEmploye=mysql_real_escape_string($telFaxEmploye);
				$civiliteEmploye=mysql_real_escape_string($civiliteEmploye);
					
								
					if($nomEmploye=='' or $prenomEmploye=='' or $emailEmploye=='') // vérification des entrées (obligatoire)
					{
						echo("Veuillez remplir les champs obligatoires!"); 
						exit;
					}
					else
					{		
						$verifierEmploye=mysql_query("SELECT * FROM employe WHERE employeID !='$idEmploye' and nom='$nomEmploye' and prenom='$prenomEmploye' and email='$emailEmploye'") or die(mysql_error());
						$existeEmploye=mysql_num_rows($verifierEmploye);
						if( $existeEmploye != null)
						{
							echo("Cet employe existe déja dans la base des donnees");
						}
						else
						{
							$requetemodifierEmploye= mysql_query("
							UPDATE employe
							SET nom='$nomEmploye', prenom='$prenomEmploye', email= '$emailEmploye', telMobile= '$telMobileEmploye', telFixe= '$telFixeEmploye', telFax= '$telFaxEmploye',civilite= '$civiliteEmploye'
							WHERE employeID = '$idEmploye' 		
							") or die('Error Requete modification'.mysql_error());
							if($requetemodifierEmploye) // vérifier ajout de l'employe 
							{
								return $idEmploye;
							}
							else
							{
								// erreur Employe non ajouté
								trigger_error("lien Employe non ajouté ");
							}
						}
					
					}				//return $idEmploye;
			}
			else
			{
				trigger_error("Employe introuvable");
			}
		}//fin fonction modifierEmploye
	
	/*
	La fonction supprimerEmploye : cette fonction permet de supprimer un employe, 
	En entrée: id Employe
	En sortie: message succés
	*/
		function supprimerEmploye($idEmploye)
		{
			$idEmploye=mysql_real_escape_string($idEmploye);
			//Tester si l'employe existe dans la bdd
			if( $idEmploye != null)
			{
				//selectionner l'employe pour tester si il existe dans la bdd 
				$requete = mysql_query('SELECT * FROM employe WHERE employeID='.$idEmploye) or die('Erreur SQL Select'.mysql_error());
				
				//Retourner le nombre de ligne
				$num_rows = mysql_num_rows($requete);
				
				//Tester si le nombre de ligne > 0 
					if ( $num_rows != NULL ) 
					{
							//Requete suppimer l'espace 
							$delete=mysql_query('DELETE FROM employe WHERE employeID='.$idEmploye);
							//retourner un message de succés 
							$message="Employe supprimé";
							return $message;
					}
					//sinon le nombre de ligne ==0
					else  
					{
						echo ("L'employe n'existe pas ");
						return 0;
					}
			}
			//L'employe est introuvable 
			else
			{
				trigger_error("idEmploye introuvable");
			}	
			
		}//fin fonction supprimerEmploye
	}//fin classe