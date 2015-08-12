<?php


class Login {

	function versLogin()
	{
		if (!isset($_SESSION["idClient"]))
			{
				header("location: login.php");
				//echo "<script>window.location.replace('login.php');</script>";
				//exit;
			}
	}
	
	function versIndex()
	{
		if (isset($_SESSION["idClient"]))
			{
				header("location: index.php");
				//echo "<script>window.location.replace('index.php');</script>";
				//exit;
			}
	}


}



?>