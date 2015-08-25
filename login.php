<?php ob_start(); ?>
<?php
	session_start();
	
	include('inc/login.php');
	$objetLogin = new Login();
	$objetLogin -> versIndex();
	
	//include('socle/erreur.php');

	include('config/bd.php');
	include('socle/EspacePrive.php');
	include('socle/Clients.php');
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- BEGIN META SECTION -->
    <meta charset="utf-8">
    <title>Tracking colis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->
    <link href="assets/css/icons/icons.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/plugins.min.css" rel="stylesheet">
    <link href="assets/css/style.min.css" rel="stylesheet">
    <!-- END  MANDATORY STYLE -->
    <!-- BEGIN PAGE LEVEL STYLE -->
    <link href="assets/css/animate-custom.css" rel="stylesheet">
    <!-- END PAGE LEVEL STYLE -->
    <!--script src="assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script-->
</head>

<body class="login fade-in" data-page="login">
    <!-- BEGIN LOGIN BOX -->
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        <img src="assets/img/account/user-icon.png" alt="Key icon">
                    </div>
                    <div class="login-logo">
                        <a href="#?login-theme-3">
                            <img src="assets/img/logo300-95.png" alt="Company Logo" width="150 px;">
                        </a>
                    </div>
                    <hr>
                    <div class="login-form">
                        <!-- BEGIN ERROR BOX -->
                        <div class="alert alert-danger hide">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4>Error!</h4>
                            Your Error Message goes here
                        </div>
                        <!-- END ERROR BOX -->
						<?php
						if(isset($_POST['submit']))
						{
							$identifiant=$_POST['identifiant']; 
							$motDePasse= $_POST['motDePasse'];
							if(($identifiant!='') and ($motDePasse!=''))
							{
								$motDePasse=md5($motDePasse);
								$idEspacePrive='';
								$objectEspacePrive = new EspacePrive();
								
								$idEspacePrive= $objectEspacePrive->existeEspace($identifiant, $motDePasse);
								
								if($idEspacePrive!= '')
								{
																		
									$objectClient = new client();
									$client = $objectClient->lireClientEspace($idEspacePrive);
									$_SESSION['idClient'] = $client['clientID'];
									$_SESSION['nom'] = $client['nom'];
									$_SESSION['prenom'] = $client['prenom'];
									
									if($_SESSION['idClient'] != '')
									{
										header('location:index.php');
									}
									else ("<div style='text-align:center;'> cet espace n'est associé à aucun client </div>");
								}

							}
							else echo("<div style='text-align:center;'> Veillez remplir tous les champs <div>");
						}
						
						?>
						
                        <form action="login.php" method="post">
                            <input type="text" placeholder="Login" name="identifiant"  class="input-field form-control user" value="<?php if(isset($_POST['identifiant'])) echo $_POST['identifiant'];?>"/>
                            <input type="password" name="motDePasse" placeholder="Mot de passe" class="input-field form-control password" />
                            <button type="submit" name="submit" class="btn btn-login">Connexion</button>
                        </form>
                        <div class="login-links">
                            <a href="password_forgot.html">Mot de passe oublié ?</a>
                            <!--br>
                            <a href="signup.html">Don't have an account? <strong>Sign Up</strong></a-->
                        </div>
                    </div>
                </div>
                <!--div class="social-login row">
                    <div class="fb-login col-lg-6 col-md-12 animated flipInX">
                        <a href="#" class="btn btn-facebook btn-block">Connect with <strong>Facebook</strong></a>
                    </div>
                    <div class="twit-login col-lg-6 col-md-12 animated flipInX">
                        <a href="#" class="btn btn-twitter btn-block">Connect with <strong>Twitter</strong></a>
                    </div>
                </div-->
            </div>
        </div>
    </div>
    <!-- END LOCKSCREEN BOX -->
    <!-- BEGIN MANDATORY SCRIPTS -->
    <script src="assets/plugins/jquery-1.11.js"></script>
    <script src="assets/plugins/jquery-migrate-1.2.1.js"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui-1.10.4.min.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- END MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <!--script src="assets/plugins/backstretch/backstretch.min.js"></script-->
    <script src="assets/js/account.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>
<?php ob_flush(); ?>