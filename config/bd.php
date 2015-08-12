<?php
	//  hostname de la base de données, par defaut localhsot
	$mysql_hostname = "localhost"; 



	//  utilisateur de la base de données
	$mysql_utilisateur = "root";



	//  mot de passe d'utilisateur de la abase de donnée
	$mysql_pass = "";  



	// nom de la base de données
	$mysql_database = "tracking2";


	//  etablir la connexion a la base de donnée
	$bd = mysql_connect($mysql_hostname, $mysql_utilisateur, $mysql_pass) ; 
	if ($bd)
	{
		//echo"connexion reussi";
	}
	else if(!$bd)
	{
		trigger_error("impossible de se connecter ");
	}


	//  selectionner la base de données
	$connctbdd=mysql_select_db($mysql_database, $bd) ;
	if($connctbdd)
	{

	}
	else if (!$connctbdd)
	{
		trigger_error("impossible de2 se connecter a la bdd");
	}

	//  encoder les caractéres envoyées a la base de données
	mysql_query("SET NAMES 'utf8'");  
?>