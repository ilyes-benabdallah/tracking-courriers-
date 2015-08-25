<?php
	/*******************************************************************************
	* Eurequat Algérie                                                             *
	* Socle - Gestion du suivi d'actif                                             *
	* Version: 1.0                                                                 *
	* Date:    13 - 08 - 2015                                                      *
	* Auteur:  Ilyes BENABDALLAH / Wafaa KAZI AOUEL                                *
	*******************************************************************************/

	class suiviActif
	{
		/*
		La fonction lireSuiviActif : cette fonction permet de lire les informations d'un suivi d'actif, 
		En entrée: l'id du suivi d'actif
		En sortie: tableau 
		*/
			function lireSuiviActif($codeProduit)
			{
				$codeProduit=mysql_real_escape_string($codeProduit);
				//Tester si le suivi existe dans la bdd
				if( $codeProduit != null)
				{
					//Requete d'affichage des infos du suivi d'actif
					//récupérer l'actifID depuis la table Actif à partir du codeProduit
					$requete = mysql_query("SELECT actifID FROM actif 
											WHERE codeProduit='$codeProduit'") or die('Erreur SQL 1!'.mysql_error());
					$row = mysql_fetch_assoc($requete);
					
						//récupérer l'actifID
						$actifID=$row["actifID"];
						//Requete pour avoir les info du suivi
						$requeteSuivi=mysql_query('SELECT * FROM suiviactif 
											WHERE actifID=$row["actifID"]') or die('Erreur SQL 2'.mysql_error());
						
						//Retourner le nombre de ligne
						$num_rows = mysql_num_rows($requete);
						//Tester si le nombre de ligne > 0 
						if ( $num_rows != NULL ) 
							{
								//retourner le résultat de la requete dans un tableau "$suiviActif"
								$suiviActif=mysql_fetch_array($requete);
								return $suiviActif; 
							}
						//sinon le nombre de ligne ==0
						else
							{
								trigger_error ("Le suivi d'actif n'existe pas ");
								
							}
				
											 
											 
					
				
			}//fin de la fonction lireSuiviActif()
	}//fin de la classe
?>