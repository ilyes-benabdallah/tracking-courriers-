    <?php
								
	include("../../config/bd.php");
	?>
								

	<div class="col-md-4">
							
							<div class="form-group">
                                <label for="field-4" class="control-label" >Envoi de : *</label><br>
								
								
								<select  class="" id="expediteur" onselect="test(id);" style="/*display: inherit !important; color:#000;*/">
								
								
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
									<option value="<?php echo $idcontact  ?>1"><i class="fa fa-edit"> <?php echo $intitule  ?>1</option>

								<?php
								}
								?>
                                               
								</select>
																
					
							<script>
							$(document).ready(function(){
									var id = $("#expediteur").val();
									$("#infoExpediteur").load("load/expedier/infoExpediteur.php?id="+id);
									$("#infoExpediteurConfirme").load("load/expedier/infoExpediteur.php?id="+id);
							//$("#infoExpediteur").load("load/expedier/infoExpediteur.php");
								$("#expediteur").change(function(){
									var id = $("#expediteur").val();
									$("#infoExpediteur").load("load/expedier/infoExpediteur.php?id="+id);
									$("#infoExpediteurConfirme").load("load/expedier/infoExpediteur.php?id="+id);
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
