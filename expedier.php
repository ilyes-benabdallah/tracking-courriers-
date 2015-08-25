<?php ob_start(); ?>
<?php
//session_start();
include('entete.php');
include('socle/Commande.php');

?>

<?php
//include('tableaux/expeditionsRecentes.php');
	if(isset($_POST['submit']))
	{
		if (($_POST['longeur']) !=''  and ($_POST['largeur'])!='' and  ($_POST['hauteur'])!="" and ($_POST['poid'])!='' )
		{
			$clientID=$_SESSION['idClient'];
			
			$expediteurID = $_POST['expediteur'];
			$distinataireID = $_POST['distinataire'];
			$dateEnvoi = $_POST['dateBdd'];
			
			$typeEnvoi = $_POST['typeEnvoi']; /// a voir ------
			$typeEnvoi = mysql_real_escape_string($typeEnvoi); /// a voir ------
			
			switch ($typeEnvoi)
			{
				case 'Envoi normal':
					$typeEnvoi="normal";
					break;
				case "Envoi en Recommandé":
					$typeEnvoi="recommande";
					break;
				case "Envoi en Express":
					$typeEnvoi="express";
					break;

			}
			
			$nbrPieces = $_POST['nbrPieces'];
			
			$longeur = $_POST['longeur'];
			$largeur = $_POST['largeur'];
			$hauteur = $_POST['hauteur'];
			$poid = $_POST['poid'];
				
			$prix = $_POST['prix'];
			
			$infoProduit="long: ".$longeur." cm; larg: ".$largeur." cm; haut:".$hauteur." cm; poid: ". $poid." kg; ".$nbrPieces." pièce(s); prix:".$prix." DZD.";
				
			$actif = array(
				array("statutActif" => "1", "typeEnvoi" => "$typeEnvoi" ,"intituleProduit" => "", "infoProduit" => "$infoProduit", "expediteurID" => "$expediteurID", "distinataireID" => "$distinataireID", "dateEnvoi" => "$dateEnvoi")
			);
			
			$objetCommande = new Commande();
			$idActif=$objetCommande -> creerCommande($typeEnvoi,'1',$actif,$clientID);
			//header("location:index.php");
			header("location:new.php?code=$idActif");
		}
		
	}

?>

<!-- datepicker -->
<!--link href="assets/jquery-ui.css" rel="stylesheet"-->

	
<style>


#main-content
{
	height: 100%;
	/*Image only BG fallback*/
	/*background: url('http://thecodeplayer.com/uploads/media/gs.png');*/
	/*background = gradient + image pattern combo*/
	/*background: 
		linear-gradient(rgba(196, 102, 0, 0.2), rgba(155, 89, 182, 0.2)), 
		url('http://thecodeplayer.com/uploads/media/gs.png');*/
	/*background: 
		linear-gradient(rgba(196, 102, 0, 0.2), rgba(155, 89, 182, 0.2));	*/
		background: 
		linear-gradient(rgba(175, 166, 155, 0.2), rgb(223, 229, 233));
		
		padding: 0px 0px;
}

/*form styles*/
#msform {
width: 100%;
margin: 50px auto;
text-align: center;
position: relative;
}
#msform fieldset {
background: white;
border: 0 none;
border-radius: 3px;
box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
padding: 20px 30px;
box-sizing: border-box;
width: 80%;
margin: 0 10%;
/*stacking fieldsets above each other*/
position: absolute;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
display: none;
}
/*inputs*/
#msform input, #msform textarea {
padding: 15px;
border: 1px solid #ccc;
border-radius: 3px;
margin-bottom: 10px;
width: 100%;
box-sizing: border-box;
font-family: montserrat;
color: #2C3E50;
font-size: 13px;
}
/*buttons*/
#msform .action-button {
width: 100px;
background: /*#27AE60*/ /*#12797D*/ #3598DB;
font-weight: bold;
color: white;
border: 0 none;
border-radius: 1px;
cursor: pointer;
padding: 10px 5px;
margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
box-shadow: 0 0 0 2px white, 0 0 0 3px /*#27AE60*/ /*#12797D*/ #3598DB;
}
/*headings*/
.fs-title {
font-size: 15px;
text-transform: uppercase;
color: #2C3E50;
margin-bottom: 10px;
}
.fs-subtitle {
font-weight: normal;
font-size: 13px;
color: #666;
margin-bottom: 20px;
}
/*progressbar*/
#progressbar {
margin-bottom: 30px;
overflow: hidden;
/*CSS counters to number the steps*/
counter-reset: step;
}
#progressbar li {
list-style-type: none;
/*color: white;*/
text-transform: uppercase;
/*font-size: 9px;*/
width: 33.33%;
float: left;
position: relative;
/* ---- */
font-weight: bold;
}
#progressbar li:before {
content: counter(step);
counter-increment: step;
width: 20px;
line-height: 20px;
display: block;
font-size: 10px;
color: #333;
background: white;
border-radius: 3px;
margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
content: '';
width: 100%;
height: 2px;
background: white;
position: absolute;
left: -50%;
top: 9px;
z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
/*connector not needed before the first step*/
content: none;
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before, #progressbar li.active:after {
background: /*#27AE60*/ /*#12797D*/ #3598DB;
color: white;
}

</style>

	<form id="msform" method="POST" action="#">
	<!-- progressbar -->
	<ul id="progressbar">
	<li class="active">Preparer un nouvel envoi</li>
	<li class="">Passer une commande</li>
	<li class="">Confirmer</li>

	</ul>
	<!-- fieldsets -->
	<fieldset>
	<h2 class="fs-title">Preparer un nouvel envoi</h2>
	<hr>
	<!--h3 class="fs-subtitle">This is step 1</h3-->
					<div class="row">

                        <div class="col-md-4" id="divExpediteur">
							
							<div class="form-group" >
                                <label for="field-4" class="control-label" >Envoi de : *</label>
								<br>
							
								
								<select  class="" id="expediteur" name="expediteur" onselect="test(id);" style="/*display: inherit !important; color:#000;*/">
								
								
								<?php
								
								$idClient=$_SESSION['idClient'];
								//$idClient=5;
								$getExpediteur = mysql_query("SELECT * FROM contact WHERE clientID ='$idClient' and type='expediteur'") or die(mysql_error());
								while($expediteur= mysql_fetch_array($getExpediteur))
								{
								$idcontact= $expediteur['contactID'];
								$intitule= $expediteur['intitule'];
								?>
									<option value="<?php echo $idcontact  ?>"><i class="fa fa-edit"> <?php echo $intitule  ?></option>

								<?php
								}
								?>
                                               
								</select>
																
					
							<script>
							$(document).ready(function(){
									var id = $("#expediteur").val();
									$("#infoExpediteur").load("load/expedier/infoContact.php?id="+id);
									$("#infoExpediteurConfirme").load("load/expedier/infoContact.php?id="+id);
							//$("#infoExpediteur").load("load/expedier/infoExpediteur.php");
								$("#expediteur").change(function(){
									var id = $("#expediteur").val();
									$("#infoExpediteur").load("load/expedier/infoContact.php?id="+id);
									$("#infoExpediteurConfirme").load("load/expedier/infoContact.php?id="+id);
								});
								
						
							});
							</script>
							
                            </div>
							<ul >
								<li>
									<a href=""><i class="glyph-icon flaticon-account"></i><span class="sidebar-text"> Mes adresses</span><!--span class="fa arrow"></span--></a>
									 
								</li>

							</ul>
							<hr>
							
							<div id="infoExpediteur">
								
							</div>
				
							
							


                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-4" class="control-label" >Envoi vers : *</label>
								<br>
								<select  class="" id="distinataire"  name="distinataire" onselect="test(id);" style="/*display: inherit !important; color:#000;*/">								
								<?php
								
								$idClient=$_SESSION['idClient'];
								//$idClient=5;
								$getdistinataire = mysql_query("SELECT * FROM contact WHERE clientID ='$idClient' and type='distinataire'") or die(mysql_error());
								while($distinataire= mysql_fetch_array($getdistinataire))
								{
								$idcontact= $distinataire['contactID'];
								$intitule= $distinataire['intitule'];
								?>
									<option value="<?php echo $idcontact  ?>"><i class="fa fa-edit"> <?php echo $intitule  ?></option>

								<?php
								}
								?>
                                               
								</select>

                            </div>
							<ul>

								<li>
									<a href=""><i class="fa fa-thumb-tack"></i><span class="sidebar-text"> Ouvrir mon carnet d'adresses</span><!--span class="fa arrow"></span--></a>
									 
								</li>

							</ul>
							
							<hr>
							<div id="infoDistinataire">
								
							</div>
							<script>
							$(document).ready(function(){
									var id = $("#distinataire").val();
									$("#infoDistinataire").load("load/expedier/infoContact.php?id="+id);
									$("#infoDistinataireConfirme").load("load/expedier/infoContact.php?id="+id);
							//$("#infoExpediteur").load("load/expedier/infoExpediteur.php");
								$("#distinataire").change(function(){
									var id = $("#distinataire").val();
									$("#infoDistinataire").load("load/expedier/infoContact.php?id="+id);
									$("#infoDistinataireConfirme").load("load/expedier/infoContact.php?id="+id);
								});
								
						
							});
							</script>
							
                        </div>

						<div class="col-md-4">

							<div class="form-group">
								<label for="field-6" class="control-label">Date d'expédition : *</label>
								<input class="pickadate form-control datepicker" type="text" placeholder="Cliquez-ici pour voir le calendrier" id="datepicker" onchange="" style="text-align:center;" value="<?php echo date("m/d/Y");?>">
								<label for="field-6" class="control-label">format de date (mois/jour/année)</label>
								<!--div id="datepicker"></div-->
								<script type="text/javascript">
								//datepicker

									$(function() {
										$('#datepicker').datepicker({dateFormat: 'dd/mm/yyyy'});
									});
								</script>

								
							</div>

							
							<!--ul style="text-align:left;">
								<li>
									<a href="gestionAdministrateurs.php"><i class="fa fa-thumb-tack"></i><span class="sidebar-text"> Ouvrir mon carnet d'adresses
								</li>
								
								<li>
									<a href="gestionClients.php"><i class="glyph-icon flaticon-account"></i><span class="sidebar-text"> Mes adresses</span>
								</li>
					
							
							</ul-->
							
				
						</div>
                    </div>

	<input type="button" name="nextw" class="nextw action-button" id="" value="Suivant"/>
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Passer une commande</h2>
		<!--h3 class="fs-subtitle">Your presence on the social network</h3-->
		
		<div class="row">
		<h2 class="fs-title">Information sur la commande</h2>
		<hr>
			<div class="col-md-3">
			
				<div class="form-group">
					<label for="field-4" class="control-label" >Type d'envoi : *</label>
					<select  class="" id="typeEnvoi" name="typeEnvoi" style="/*display: inherit !important; color:#000;*/">
						<option value="Envoi normal"><i class="fa fa-edit"> Envoi normal</option>
						<option value="Envoi en Recommandé"><i class="fa fa-edit"> Envoi en Recommandé</option>
						<option value="Envoi en Express"><i class="fa fa-edit"> Envoi en Express</option>
												   
					</select>

				</div>
				
				<div class="form-group">
					<label for="field-4" class="control-label" >Nombre total de pièces : *</label>
					<input type="text" name="nbrPieces" placeholder="" value="1" id="nbrPieces"  style="text-align:center;"/>


				</div>
				<!--div class="form-group">
				
					<label for="field-4" class="control-label" >Poid total (Kgs) : *</label>
					<input type="text" name="poid" placeholder="" id="poid"  style="text-align:center;"/>


				</div-->
			
			</div>
			<div class="col-md-4">
			
			
				<div class="form-group">
					<label for="field-4" class="control-label" >Longeur (cm) : *</label>
					<input type="text" name="longeur" placeholder="" id="longeur" value=""/>
				</div>
			
			<br>
			
				<div class="form-group">
					<label for="field-4" class="control-label" >Hauteur (cm) : *</label>
					<input type="text" name="hauteur" placeholder="" id="hauteur" value=""/>
				</div>	
		
				<div id="infoCommande" >

				<!--script>
					
					$("#infoCommande").load("load/expedier/infoCommande.php?nbrPieces=1");
					
				</script-->
				</div>
				
				<script>
					/*$(document).ready(function(){
					$("#nbrPieces").change(function(){
					var nbrPieces= $( "#nbrPieces" ).val();
					$("#infoCommande").load("load/expedier/infoCommande.php?nbrPieces="+nbrPieces);
					});
					});*/
				</script>
			</div>
			
		
					
			<div class="col-md-4">
			
			
				<div class="form-group">
					<label for="field-4" class="control-label" >Largeur (cm) : *</label>
					<input type="text" name="largeur" placeholder="" id="largeur" value=""/>
				</div>
			
			<br>
			
				<div class="form-group">
					<label for="field-4" class="control-label" >Poid (kg) : *</label>
					<input type="text" name="poid" placeholder="" id="poid" value="">
				</div>	
		
				
			</div>
			
		</div>
			<div class="row">

				<div id="prixCommande" style="">

				<p style="font-size:28px; font-weight: bold;"><b id="affichePrix">0.0</b> DZD</p>
				</div>
				

			</div>
		
		
		
		<input type="button" name="previous" class="previous action-button" value="Précédent" />
		<input type="button" name="nextw" id="confirmer" class=" nextw action-button" value="Suivant" />
	</fieldset>

	<fieldset>
	<h2 class="fs-title">Confirmer la commande</h2>
		<div class="alert alert-danger fade in" id="divAlert" style="display:none;">
		
			 <strong>Veillez remplir les champs obligatoires!</strong> les champs suivis d'une étoile sont obligatoires.
										  
		</div>
	<div id="divAlert1" style="display:none; color:red; font-weight: bold;"> Veillez remplir les champs obligatoires</div>
	<!--h3 class="fs-subtitle">We will never sell it</h3-->
				<div class="row">

                        <div class="col-md-2" style="color:#3598DB">
							<div class="panel panel-icon no-bd bg-transparent">
							<div class="panel-body bg-transparent">
								<div class="row">
									<div class="col-md-12">
										<div class="icon"><i class="fa fa-sign-out"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="panel-footer">
								<h4><strong>Expéditeur</strong></h4>
								
							</div>
							</div>
						
						</div>
						<div class="col-md-4">
							
							<div id="infoExpediteurConfirme">
								
							</div>

                        </div>
						
						
                        <div class="col-md-2" style="color:#3598DB">
							<div class="panel panel-icon no-bd bg-transparent">
							<div class="panel-body bg-transparent">
								<div class="row">
									<div class="col-md-12">
										<div class="icon" ><i class="fa fa-sign-in"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="panel-footer">
								<h4><strong>Distinataire</strong></h4>
								
							</div>
							</div>
						
						</div>
						
                        <div class="col-md-4">
                          

							<div id="infoDistinataireConfirme">
								
							</div>

							
                        </div>

                </div>
				<hr>
                <div class="row">
					<div class="col-md-9">	
						<p style="text-align: left; color: #000;">
						Un colis envoyé en  <b id="afficheType"> </b> le <b id="afficheDate"></b>, de <b id="afficheLongeur"> </b> cm de longeur, <b id="afficheLargeur"> </b> cm de largeur et <b id="afficheHauteur"> </b> de hauteur, qui pése <b id="affichePoid"> </b> kg contenant  <b id="afficheNbrPieces"></b> pièce(s).
						</p>
						<input type="hidden" id="dateBdd" name="dateBdd">
						<input type="hidden" id="prix" name="prix">
					
					</div>

					<div class="col-md-3">
					
					<img src="barcode.php?text=NumDeBordreau&size=40" alt="testing" />
					</div>
                </div>
	
	
	
	<!--textarea name="address" placeholder="Address"></textarea-->
	<input type="button" name="previous" class="previous action-button" value="Précédent" />
	<input type="submit" name="submit" class="action-button" value="Confrimer" id="submit" style="display:none;" disabled="disabled" >
	</fieldset>
	</form>


					
					
					<script>
				
					$(document).ready(function(){
					
					
					$("#confirmer").click(function(){
						
						var expediteur = $("#expediteur").val();
						var distinataire = $("#distinataire").val();
						
						var type = $("#typeEnvoie").val();
						$('#afficheType').text(type);
						
						
						var date = $("#datepicker").val();
						var mois = date.substring(0,2);
						var jour = date.substring(3,5);
						var annee = date.substring(6);
						var dateAffiche= jour+'-'+mois+'-'+annee;
						var dateBdd= annee+'-'+mois+'-'+jour;
						$('#afficheDate').text(dateAffiche);
						$("#dateBdd").val(dateBdd);						
						
						var longeur = $("#longeur").val();
						if(!longeur) {$('#afficheLongeur').text("longeur!");  $('#afficheLongeur').css("color", "red");}
						else {$('#afficheLongeur').text(longeur);  $('#afficheLongeur').css("color", "black");}		
						
						
						var largeur = $("#largeur").val();
						if(!largeur) {$('#afficheLargeur').text("largeur!");  $('#afficheLargeur').css("color", "red");}
						else {$('#afficheLargeur').text(largeur);  $('#afficheLargeur').css("color", "black");}	
						
						var hauteur = $("#hauteur").val();
						if(!hauteur) {$('#afficheHauteur').text("hauteur!");  $('#afficheHauteur').css("color", "red");}
						else {$('#afficheHauteur').text(hauteur);  $('#afficheHauteur').css("color", "black");}	
						
	
						
						var poid = $("#poid").val();
						if(!poid) {$('#affichePoid').text("poid!");  $('#affichePoid').css("color", "red");}
						else {$('#affichePoid').text(poid);  $('#affichePoid').css("color", "black");}	
							
						
						var nbrPieces = $("#nbrPieces").val();
						if(!nbrPieces) {$('#afficheNbrPieces').text("pieces!");  $('#afficheNbrPieces').css("color", "red");}
						else {$('#afficheNbrPieces').text(nbrPieces);  $('#afficheNbrPieces').css("color", "black");}	
						
						if(!expediteur || !distinataire ||!longeur || !largeur || !hauteur || !poid || !nbrPieces) {$('#submit').hide(); $("#submit").prop('disabled', true); $('#divAlert').show();}
						else {$('#submit').show(); $("#submit").prop('disabled', false); $('#divAlert').hide();}
					});

				
					 
					});
					</script>	
					
					<!----------------------------- script calcler prix------------------------>
					<script>
					$(document).ready(function(){
						prix();
						
						$( "#typeEnvoi" ).change(function(){
							prix();
							 //alert( "Handler for .change() called." );
						});
						  
						
						$( "#longeur" ).keyup(function() {
							prix();
						  
						});
						$( "#largeur" ).keyup(function() {
							prix();
						  
						});
						$( "#hauteur" ).keyup(function() {
							prix();
						  
						});
						
						$( "#poid" ).keyup(function() {
							prix();
						  
						});
						function prix() {
						   var type = $("#typeEnvoi").val();
						   if (type=="Envoi normal") type=2;
						   else if(type=="Envoi en Recommandé") type=5;
						   else if(type=="Envoi en Express") type=10;
						   else type=3;
						   
						   var longeur = $("#longeur").val();
						   if(longeur=='') longeur=0;
						   var longeur = parseFloat(longeur);
						   
						   var largeur = $("#largeur").val();
						   if(largeur=='') largeur=0;
						   var largeur = parseFloat(largeur);
						   
						   var hauteur = $("#hauteur").val();
						   if(hauteur=='') hauteur=0;
						   var hauteur = parseFloat(hauteur);
						   
						   var poid = $("#poid").val();
						   if(poid=='') poid=0;
						   var poid = parseFloat(poid);
						   
						   
						   var type = parseFloat(type);
		
						   var prix = longeur + largeur + hauteur + poid +type;
						   $('#affichePrix').text(prix);
						   $("#prix").val(prix);
							//alert(longeur);
						};
					});
					</script>
					
				

<script>
function myFunction() {
    var x = document.getElementById("fname").value;
    document.getElementById("demo").innerHTML = x;
}
</script>
	
<script>
$(function() {

//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".nextw").click(function(){

if(animating) return false;
animating = true;

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//activate next step on progressbar using the index of next_fs
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show(); 
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now, mx) {
//as the opacity of current_fs reduces to 0 - stored in "now"
//1. scale current_fs down to 80%
scale = 1 - (1 - now) * 0.2;
//2. bring next_fs from the right(50%)
left = (now * 50)+"%";
//3. increase opacity of next_fs to 1 as it moves in
opacity = 1 - now;
current_fs.css({'transform': 'scale('+scale+')'});
next_fs.css({'left': left, 'opacity': opacity});
}, 
duration: 800, 
complete: function(){
current_fs.hide();
animating = false;
}, 
//this comes from the custom easing plugin
easing: 'easeInOutBack'
});
});

$(".previous").click(function(){
if(animating) return false;
animating = true;

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//de-activate current step on progressbar
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show(); 
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now, mx) {
//as the opacity of current_fs reduces to 0 - stored in "now"
//1. scale previous_fs from 80% to 100%
scale = 0.8 + (1 - now) * 0.2;
//2. take current_fs to the right(50%) - from 0%
left = ((1-now) * 50)+"%";
//3. increase opacity of previous_fs to 1 as it moves in
opacity = 1 - now;
current_fs.css({'left': left});
previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
}, 
duration: 800, 
complete: function(){
current_fs.hide();
animating = false;
}, 
//this comes from the custom easing plugin
easing: 'easeInOutBack'
});
});

$(".submit").click(function(){
return false;
})

});
</script>



<?php
include('footer.php');
?>
<?php ob_flush(); ?>