<?php
	
	include('erreur.php');
	include('db.php');
	include('Clients.php');
	/*
	$adressesClient = array ( 0  => array(
												"numVoie" => 09,
												"nomVoie" => "cité des jasmin",
												"cpltVoie" => "foo",
												"codePostal" => 1300,
												"commune" => "tlemcen",
												"pays" => "algerie"
													
												),
							1  => array(
												"numVoie" => 10,
												"nomVoie" => "cite des jasmin",
												"cpltVoie" => "foo",
												"codePostal" => 13100,
												"commune" => "tlemcqen",
												"pays" => "algeriqe"
													
												)
				
                 
							);
	
*/
	
	$adressesClient = array(
    array("statutActif" => "92", "typeEnvoi" => "cite des jasmin","intituleProduit" => "ffoo", "expediteurID" => "1300", "distinataireID" => "tlemcen", "dateEnvoi" => ""),
    array("numVoie" => "12", "nomVoie" => "1cite des jasmin", "cpltVoie" => "iov", "codePostal" => "2300", "commune" => "oran", "pays" => "1algerie21"),
    array("numVoie" => "222", "nomVoie" => "2citef des jasmin", "cpltVoie" => "iov", "codePostal" => "2300", "commune" => "paris", "pays" => "fr")
	);
	
	/*
	$adressesClient = array(
    "numVoie" => "09",
    "nomVoie" => "cité des jasmin",
    "cpltVoie" => "foo",
    "codePostal" => "1300",
    "commune" => "tlemcen",
    "pays" => "algerie",
    
	);
	*/
	$objectClient = new client();
	//$il= $objectClient->creerClient('tdsgfffdfbfsg', 'ilsyess', 'kira13_ilyes@shostmail.com', '0775383461', '', '', '', '', '0303541208', '', '', 'ilyes.com', '12/12/2010', '12/12/2015', '1', $adressesClient);
	$il= $objectClient->modifierClient(4,'tdsgfffdfsg', 'ilyess', 'kira13_ilyes@shosdtmail.com', '0775383461', '', '', '', '', '0303541208', '', '', 'ilyes.com', '12/12/2010', '12/12/2015', '1', $adressesClient);
	//echo $il;
	//$client = $objectClient->lireClient(2);
	

	//echo count($client);
		//echo "nom: ".$client['nom']."<br>";

	 
	//$client = $objectClient->supprimerClient(8);
?>