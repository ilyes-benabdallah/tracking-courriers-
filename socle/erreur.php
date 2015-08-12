<?php 

	function myErrorHandler($errno, $errstr, $errfile, $errline)
	{
		if (!(error_reporting() & $errno)) 
		{
			// Ce code d'erreur n'est pas inclus dans error_reporting()
			return;
		}

		switch ($errno) 
		{
			
			case E_USER_ERROR:
				echo "<b>Mon ERREUR</b> [$errno] $errstr<br />\n";
				echo "  Erreur fatale sur la ligne $errline dans le fichier $errfile";
				echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
				echo "Arrèt...<br />\n";
				//----------------------------------------------------------------//
				date_default_timezone_set('GMT');
				$info = getdate();
				$date = $info['mday'];
				$month = $info['mon'];
				$year = $info['year'];
				$hour = $info['hours'];
				$min = $info['minutes'];
				$sec = $info['seconds'];
				
				$current_date = "$date/$month/$year == $hour:$min:$sec";
				$file= file_get_contents('erreur.txt');
				$errstr="Mon ERREUR: ".$errstr ."   GMT:".$current_date." \r\n".$file;
				$monfichier = fopen('erreur.txt', 'r+');
				fputs($monfichier, $errstr);
				fclose($monfichier);
				
				
				//----------------------------------------------------------------//
				exit(1);
				break;
			
			case E_USER_WARNING:
				echo "<b>Mon ALERTE</b> [$errno] $errstr<br />\n";
				//----------------------------------------------------------------//
				date_default_timezone_set('GMT');
				$info = getdate();
				$date = $info['mday'];
				$month = $info['mon'];
				$year = $info['year'];
				$hour = $info['hours'];
				$min = $info['minutes'];
				$sec = $info['seconds'];
				
				$current_date = "$date/$month/$year == $hour:$min:$sec";
				$file= file_get_contents('erreur.txt');
				$errstr="Mon ALERTE: ".$errstr ."   GMT:".$current_date." \r\n".$file;
				$monfichier = fopen('erreur.txt', 'r+');
				fputs($monfichier, $errstr);
				fclose($monfichier);
				//file_put_contents('erreur.txt', $errstr, FILE_APPEND);
				
				//----------------------------------------------------------------//
				break;
				
			case E_USER_NOTICE:
				echo "<b>Mon AVERTISSEMENT</b> [$errno] $errstr<br />\n";
				
				echo "  Erreur fatale sur la ligne $errline dans le fichier $errfile";
				echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
				echo "Arrèt...<br />\n";
				//$monfichier = fopen('erreur.txt', 'r+');
				
				//2 : on fera ici nos opérations sur le fichier...
				
				// 3 : quand on a fini de l'utiliser, on ferme le fichier
				
				//fputs($monfichier, $errstr);
				//fclose($monfichier);
				date_default_timezone_set('GMT');
				$info = getdate();
				$date = $info['mday'];
				$month = $info['mon'];
				$year = $info['year'];
				$hour = $info['hours'];
				$min = $info['minutes'];
				$sec = $info['seconds'];
				
				$current_date = "$date/$month/$year == $hour:$min:$sec";
				$file= file_get_contents('erreur.txt');
				$errstr="Mon AVERTISSEMENT: ".$errstr ."   GMT:".$current_date." \r\n".$file;
				$monfichier = fopen('erreur.txt', 'r+');
				fputs($monfichier, $errstr);
				fclose($monfichier);
				//file_put_contents('erreur.txt', $errstr, FILE_APPEND);
				break;

			default:
				echo "Type d'erreur inconnu : [$errno] $errstr<br />\n";
				//----------------------------------------------------------------//
				date_default_timezone_set('GMT');
				$info = getdate();
				$date = $info['mday'];
				$month = $info['mon'];
				$year = $info['year'];
				$hour = $info['hours'];
				$min = $info['minutes'];
				$sec = $info['seconds'];
				
				$current_date = "$date/$month/$year == $hour:$min:$sec";
				$file= file_get_contents('erreur.txt');
				$errstr="erreur inconnu: ".$errstr ."   GMT:".$current_date." \r\n".$file;
				$monfichier = fopen('erreur.txt', 'r+');
				fputs($monfichier, $errstr);
				fclose($monfichier);
				
				
				//----------------------------------------------------------------//
				break;
		}
	
		/* Ne pas exécuter le gestionnaire interne de PHP */
		return true;
	}

	$old_error_handler = set_error_handler("myErrorHandler");
	//--------------------------------------------------------------------------------------------------------------------------------------//
	
?>