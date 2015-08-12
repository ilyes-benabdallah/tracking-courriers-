<?php
//session_start();
include('entete.php');

?>

<?php
//include('tableaux/expeditionsRecentes.php');
?>

<!-- datepicker -->
<!--link href="assets/jquery-ui.css" rel="stylesheet"-->



<style>


#main-content
{
	height: 100%;
	/*Image only BG fallback*/
	background: url('http://thecodeplayer.com/uploads/media/gs.png');
	/*background = gradient + image pattern combo*/
	background: 
		linear-gradient(rgba(196, 102, 0, 0.2), rgba(155, 89, 182, 0.2)), 
		url('http://thecodeplayer.com/uploads/media/gs.png');
	background: 
		linear-gradient(rgba(196, 102, 0, 0.2), rgba(155, 89, 182, 0.2));
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
background: /*#27AE60*/ #12797D;
font-weight: bold;
color: white;
border: 0 none;
border-radius: 1px;
cursor: pointer;
padding: 10px 5px;
margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
box-shadow: 0 0 0 2px white, 0 0 0 3px /*#27AE60*/ #12797D;
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
background: /*#27AE60*/ #12797D;
color: white;
}

</style>

	<form id="msform">
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

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-4" class="control-label" >Envoi de : *</label><br>
								<select  class="" id="expediteur" style="/*display: inherit !important; color:#000;*/">
									<option value="homme"><i class="fa fa-edit"> Eurequat (Alger)</option>
									<option value="femme"><i class="fa fa-edit"> Eurequat (Tlemcen)</option>
                                               
								</select>

                            </div>
							<ul >
								<li>
									<a href=""><i class="glyph-icon flaticon-account"></i><span class="sidebar-text"> Mes adresses</span><!--span class="fa arrow"></span--></a>
									 
								</li>

							</ul>
							<hr>
							
							<div id="infoExpediteur">
								
							</div>
							<script>
							$(document).ready(function(){
								$("#expediteur").change(function(){
									$("#infoExpediteur").load("load/expedier/infoExpediteur.php");
									$("#infoExpediteurConfirme").load("load/expedier/infoExpediteur.php");
								});
							});
							</script>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-4" class="control-label" >Envoi vers : *</label>
								<select  class="" id="distinateur" style="/*display: inherit !important; color:#000;*/">
									<option value="homme"><i class="fa fa-edit"> SOLINF (Tlemcen)</option>
									<option value="femme"><i class="fa fa-edit"> SOLINF (Oran)</option>
                                               
								</select>

                            </div>
							<ul>

								<li>
									<a href=""><i class="fa fa-thumb-tack"></i><span class="sidebar-text"> Ouvrir mon carnet d'adresses</span><!--span class="fa arrow"></span--></a>
									 
								</li>

							</ul>
							
							<hr>
							<div id="infoDistinateur">
								
							</div>
							<script>
							$(document).ready(function(){
								$("#distinateur").change(function(){
									$("#infoDistinateur").load("load/expedier/infoDistinateur.php");
									$("#infoDistinateurConfirme").load("load/expedier/infoDistinateur.php");
								});
							});
							</script>
							
                        </div>

						<div class="col-md-4">

							<div class="form-group">
								<label for="field-6" class="control-label">Date d'expédition : *</label>
								<input class="pickadate form-control" type="text" placeholder="Cliquez-ici pour voir le calendrier" id="datepicker" onchange="myFunction()"/ style="text-align:center;">
								<!--div id="datepicker"></div-->
								<script type="text/javascript">
								//datepicker
									
									$(function() {
										$('#datepicker').datepicker();
									});
								</script>
								<script>
								function myFunction() {
									//alert(document.getElementById("datepicker").value);            // The function returns the product of p1 and p2
									
									var date= document.getElementById("datepicker").value; 
									document.getElementById("date").value =date;
									//alert(date);
								}
								
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

	<input type="button" name="nextw" class="nextw action-button" value="Suivant" "/>
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Passer une commande</h2>
		<!--h3 class="fs-subtitle">Your presence on the social network</h3-->
		
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label for="field-4" class="control-label" >Type d'envoi : *</label>
					<select  class="" id="typeEnvoie" style="/*display: inherit !important; color:#000;*/">
						<option value=""><i class="fa fa-edit"> Non-Dutiable</option>
						<option value=""><i class="fa fa-edit"> Non Document</option>
												   
					</select>

				</div>
				
				<div class="form-group">
					<label for="field-4" class="control-label" >Nombre total de pièces : *</label>
					<input type="text" name="nbrPieces" placeholder="" value="1" id="nbrPieces"  style="text-align:center;"/>


				</div>
				<div class="form-group">
				
					<label for="field-4" class="control-label" >Poid total (Kgs): *</label>
					<input type="text" name="poid" placeholder="" id="poid"  style="text-align:center;"/>


				</div>
			
			</div>
			<div class="col-md-9">
				<h2 class="fs-title">Information sur les pièces</h2>
				<hr>
				<div id="infoCommande" style="    overflow-y: scroll; overflow-x: hidden; height: 280;">

					<script>
					
					$("#infoCommande").load("load/expedier/infoCommande.php?nbrPieces=1");
					
				</script>
				</div>
				
				<script>
					$(document).ready(function(){
					$("#nbrPieces").change(function(){
					var nbrPieces= $( "#nbrPieces" ).val();
					$("#infoCommande").load("load/expedier/infoCommande.php?nbrPieces="+nbrPieces);
					});
					});
				</script>
			</div>
		</div>
		
		<input type="button" name="previous" class="previous action-button" value="Précédent" />
		<input type="button" name="nextw" class="nextw action-button" value="Suivant" />
	</fieldset>

	<fieldset>
	<h2 class="fs-title">Confirmer la commande</h2>
	<!--h3 class="fs-subtitle">We will never sell it</h3-->
				<div class="row">

                        <div class="col-md-2" style="color:red">
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
						
						
                        <div class="col-md-2" style="color:green">
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
                          

							<div id="infoDistinateurConfirme">
								
							</div>

							
                        </div>

                </div>
				<hr>
                <div class="row">
				
                </div>
	
	
	
	<!--textarea name="address" placeholder="Address"></textarea-->
	<input type="button" name="previous" class="previous action-button" value="Précédent" />
	<input type="submit" name="submit" class="submit action-button" value="Confrimer" />
	</fieldset>
	</form>

	
	
	
	
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