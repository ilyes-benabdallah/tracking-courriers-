<?php
session_start();

include('config/bd.php');
include('inc/login.php');
$objetLogin = new Login();
$objetLogin -> versLogin();
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
    <link href="assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="assets/plugins/metrojs/metrojs.css" rel="stylesheet">
    <!-- END PAGE LEVEL STYLE -->
	<!-- BEGIN PAGE LEVEL STYLE -->
    <link rel="stylesheet" href="assets/plugins/wizard/wizard.css">
    <link rel="stylesheet" href="assets/plugins/jquery-steps/jquery.steps.css">
    <!-- END PAGE LEVEL STYLE -->
	
	    <!-- BEGIN PAGE LEVEL STYLE -->
    <link href="assets/plugins/datetimepicker/jquery.datetimepicker.css" rel="stylesheet">
    <link href="assets/plugins/pickadate/themes/default.css" rel="stylesheet">
    <link href="assets/plugins/pickadate/themes/default.date.css" rel="stylesheet">
    <link href="assets/plugins/pickadate/themes/default.time.css" rel="stylesheet">
    <!-- END PAGE LEVEL STYLE -->
	
    <script src="assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!--script src="test.js"></script-->
	<script src="assets/jquery.min.js"></script>
	
	
	<style>
	#msform input, #msform textarea {
    padding: 5px!important;
	}
	
	</style>

</head>

<body data-page="dashboard">
    <!-- BEGIN TOP MENU -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <!--button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sidebar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button-->
                <!--a id="menu-medium" class="sidebar-toggle tooltips">
                    <i class="fa fa-outdent"></i>
                </a-->
				
					<a class="navbar-brand" >
						<!--img src="assets/img/logo.png" alt="logo" width="79" height="26"-->
						<img src="assets/img/logo.png" alt="logo" width="150px" height="" style="margin-left:20%;">
					</a>

            </div>
            <div class="navbar-center" style="    top: 18px;">
								<div>
						<form class="form-inline">
							<div class="form-group">
								<label for="exampleInputEmail2" style="color:white; margin-bottom: 0px; font-size:16px;">Numéro de bordreau : </label>
								<input type="email" class="form-control" id="exampleInputEmail2" placeholder="" style="height: 30;">
							</div>
							<button type="submit" class="btn btn-white btn-transparent" style="font-size: 12px;     /*margin-bottom: 10px;*/">
								<b><i class="fa fa-search"></i>&nbsp; Suivi</b>
							</button>
						</form>
					</div>
			
			</div>
            <div class="navbar-collapse collapse">
                <!-- BEGIN TOP NAVIGATION MENU -->
                <ul class="nav navbar-nav pull-right header-menu">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN MESSAGES DROPDOWN -->
                    
                    <!-- END MESSAGES DROPDOWN -->
                    <!-- BEGIN USER DROPDOWN -->
                    <li class="dropdown" id="user-header">
                        <a href="#" class="dropdown-toggle c-white" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img src="assets/img/avatars/avatar12.png" alt="user avatar" width="30" class="p-r-5">
                            <span class="username">M. <?php echo $_SESSION['prenom'];?> <?php echo $_SESSION['nom'];?></span>
                            <i class="fa fa-angle-down p-r-10"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="extra_profile.html">
                                    <i class="glyph-icon flaticon-account"></i> My Profile
                                </a>
                            </li>
                            <li>
                                <a href="calendar.html">
                                    <i class="glyph-icon flaticon-calendar"></i> My Calendar
                                </a>
                            </li>
                            <li>
                                <a href="calendar.html">
                                    <i class="glyph-icon flaticon-settings21"></i> Account Settings
                                </a>
                            </li>
                            <li class="dropdown-footer clearfix">
							<a href="javascript:;" class="toggle_fullscreen" title="Plein Écran">
								<i class="glyph-icon flaticon-fullscreen3"></i>
							</a>
							<!--a href="lockscreen.html" title="Lock Screen">
								<i class="glyph-icon flaticon-padlock23"></i>
							</a-->
							<a href="deconnexion.php" title="Déconnecter">
								<i class="fa fa-power-off"></i>
							</a>
						</li>
                        </ul>
                    </li>
                    <!-- END USER DROPDOWN -->
                    <!-- BEGIN CHAT HEADER -->
                 
                    <!-- END CHAT HEADER -->
                </ul>
                <!-- END TOP NAVIGATION MENU -->
            </div>
        </div>
    </nav>
    <!-- END TOP MENU -->
    <!-- BEGIN WRAPPER -->
    <div id="wrapper">
        <!-- BEGIN MAIN SIDEBAR -->
        <nav id="sidebar">
            <div id="main-menu">
                <ul class="sidebar-nav">
                   
                  
                    <li>
                        <a href="index.php" ><i class="fa fa-share"></i><span class="sidebar-text">Expédiions récentes </span></a>
                    </li>
					
                    <li>
                        <a href="expedier.php"><i class="glyph-icon flaticon-email"></i><span class="sidebar-text">Expédier</span><!--span class="fa arrow"></span--></a>
                      
                    </li>
                
					<li>
                        <a href="gestionAgences.php"><i class="fa fa-money"></i><span class="sidebar-text">Tarif</span><!--span class="fa arrow"></span--></a>
                      
                    </li>
					
                    <li>
                        <a href="gestionUtilisateursPda.php"><i class="fa fa-external-link"></i><span class="sidebar-text">Enlevement</span><!--span class="fa arrow"></span--></a>
                        
                    </li>
              
                    <li>
                        <a href="carnetAdresses.php"><i class="fa fa-thumb-tack"></i><span class="sidebar-text">Carnet d'adresses</span><!--span class="fa arrow"></span--></a>
                         
                    </li>
					
                    <li>
                        <a href="gestionClients.php"><i class="glyph-icon flaticon-account"></i><span class="sidebar-text">Mon profil</span><!--span class="fa arrow"></span--></a>
                         
                    </li>
					
					 <li class="">
                        <a href=""><i class="fa fa-archive"></i><span class="sidebar-text">Historique</span></a>
                    </li>
					
					<!--li>
                        <a href="maps.html"><i class="glyph-icon flaticon-world"></i><span class="sidebar-text">Google Maps</span></a>
                    </li-->

                </ul>
            </div>
            <div class="footer-widget">
                <img src="assets/img/gradient.png" alt="gradient effet" class="sidebar-gradient-img" />

                <div class="sidebar-footer clearfix">
                    <a class="pull-left" href="" rel="tooltip" data-placement="top" data-original-title="Réglages"><i class="glyph-icon flaticon-settings21"></i></a>
                    <a class="pull-left toggle_fullscreen" href="#" rel="tooltip" data-placement="top" data-original-title="Plein Écran"><i class="glyph-icon flaticon-fullscreen3"></i></a>
                    <!--a class="pull-left" href="lockscreen.html" rel="tooltip" data-placement="top" data-original-title="Lockscreen"><i class="glyph-icon flaticon-padlock23"></i></a-->
                    <a class="pull-left" href="deconnexion.php" rel="tooltip" data-placement="top" data-original-title="Déconnecter"><i class="fa fa-power-off"></i></a>
                </div> 
            </div>
        </nav>
        <!-- END MAIN SIDEBAR -->


        <!-- BEGIN MAIN CONTENT -->
        <div id="main-content" class="dashboard">
