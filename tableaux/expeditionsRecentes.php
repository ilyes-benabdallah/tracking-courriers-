
	<!-- tableau des clients  -->  
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				
				<!--  panel du titre de tableau -->
				<div class="panel-heading bg-white" style="border-bottom:3px solid #DFE5E9;">
					<h3 class="panel-title"><strong>Courriers </strong> Expéditions récentes </h3>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					

					<!--  bouton ajouter client -->
					<a href="expedier.php"><button class="btn btn-dark btn-transparent" data-toggle="modal" data-target="#modal-responsive" onclick="viderChamps();" style="/*color:#fff !important; border: 1px solid #fff !important;*/" ><b><i class="glyph-icon flaticon-email"></i>&nbsp; Expédier</b></button></a>
				</div>
				
				<!--  fin panel du titre de tableau -->
				
				<!--   -->
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-white">

							<!-- contenu de tableau  -->
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover table-dynamic">
								
								<!-- entete de tableau  -->
								<thead>
									<tr>
										<th>Bordreau N°</th>
										<th>Réf</th>
										<th>Distinataire</th>
										<th>Date d'envoie</th>
										<th></th>
										</tr>
								</thead>
								<!-- fin entete de tableau  -->
																
								<!-- corp du tableau   -->
								<tbody>
								<?php
								$idClient=$_SESSION['idClient'];
								$commandeClient=mysql_query("SELECT * FROM commande WHERE clientID='$idClient' ORDER BY dateCommande DESC LIMIT 0 , 5 ")or die( mysql_error());
								$nbrCommande=mysql_num_rows($commandeClient);
								
								if($nbrCommande != 0)
								{
									while($commande=mysql_fetch_array($commandeClient))
									{
										$idCommande=$commande['commandeID'];
										
										$actifCommande=mysql_query("SELECT * FROM actif WHERE commandeID='$idCommande'") or die(mysql_error());
										$nbrActif= mysql_num_rows($actifCommande);
										if($nbrActif !=0)
										{
											while($actif=mysql_fetch_array($actifCommande))
											{
												$actifID=$actif['actifID'];
												$codeActif=$actif['codeProduit'];
												$expediteurID=$actif['expediteurID'];
												
												$distinataireID=$actif['distinataireID'];
												/// info ditinataire:
												$requeteDistinataire=mysql_query("SELECT * FROM contact WHERE contactID ='$distinataireID'") or die(mysql_error());
												$distinataire= mysql_fetch_assoc($requeteDistinataire);
												
												
												$intitule= $distinataire['intitule'];
												$nom= $distinataire['nom'];
												$prenom= $distinataire['prenom'];
												$email= $distinataire['email'];
												$numTelephone= $distinataire['numTelephone'];
												$adresseID= $distinataire['adresseID'];
													// get infi adresse
														$requeteAdresse=mysql_query("SELECT * FROM adresse WHERE adresseID='$adresseID'")or die(mysql_error());
														$adresse=mysql_fetch_assoc($requeteAdresse);
														
														$numVoie=$adresse['numVoie'];
														$nomVoie=$adresse['nomVoie'];
														$cpltVoie=$adresse['cpltVoie'];
														$codePostal=$adresse['codePostal'];
														$commune=$adresse['commune'];
														$pays=$adresse['pays'];
													//------------------
												
												//-------------
												
												$dateEnvoi=$actif['dateEnvoi'];
												$infoProduit=$actif['infoProduit'];
												$statut=$actif['statut'];
												$type=$actif['type'];
								?>
								
												<tr>
													<td id="<?php echo $actifID;?>"><?php echo $codeActif;?></td>
													<td></td>
													
													<td><a href="#"><button class="btn btn-info btn-transparent" data-toggle="modal" data-target="#modal-distinataire<?php echo $distinataireID;?>"><i class="fa fa-info-circle"></i></button></a> <?php echo " ".$intitule;?> </td>
													
													<td><?php echo $dateEnvoi;?></td>
													
													<td><a href="#"><button class="btn btn-info btn-transparent" data-toggle="modal" data-target="#modal-detail<?php echo $actifID;?>"><i class="fa fa-info"></i> Détail</button></a></td>
												</tr>
												
												<!--  contenu du modal détail bordreau -->
												<div class="modal fade" id="modal-detail<?php echo $actifID;?>" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															
															<!--  Entete du modal -->
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																<h4 class="modal-title" id="myModalLabel"><strong>Détail du bordreau</strong>  <small></small></h4>
															</div>
															<!-- Fin entete du modal  -->
															
															<!--  Contenu du modal -->
															<div class="modal-body">
																<!--h4><i class="fa fa-user"></i><b> BENABDALLAH mohammed ilyes </b> (10 - 02 - 1991)</h4>
																<h4><i class="fa fa-map-marker"></i> 09 cité des jasmins Tlemcen Algerie</h4>
																<h4><i class="fa fa-phone"></i> 0775 38 34 61</h4>
																<h4><i class="fa fa-envelope-o"></i> ilyes.benabdallah@eurequat-algerie.com</h4-->
																<h4><i class="fa fa-info"></i> <?php echo $infoProduit;?></h4>
																<h4><b><i class="fa fa-location-arrow"></i> Suivi actif</b></h4>

															</div>
															
															<!-- fin du contenu de modal  -->
															
															<!-- pied du modal "bouton valider"  -->
															<div class="modal-footer text-center">
																<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-thumbs-o-up"></i> OK</button>
															</div>
															<!--  fin du pied de modal -->
														</div>
													</div>
												</div>
												<!--  fin du contenu de modal détail client -->
												
												<!--  contenu du modal info distinatire  -->
												<div class="modal fade" id="modal-distinataire<?php echo $distinataireID;?>" aria-hidden="true"> 
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<!--  Entete du modal -->
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																<h4 class="modal-title" id="myModalLabel"><strong>Détail du Distinataire</strong>  <small></small></h4>
															</div>
															<!-- Fin entete du modal  -->
															
															<!--  Contenu du modal -->
															<div class="modal-body">
																<h4><i class="fa fa-user"></i><b> <?php echo $prenom." ".$nom;?> </b></h4>
																<h4><i class="fa fa-map-marker"></i> <?php echo " N° ". $numVoie ." ".$nomVoie ." ".$cpltVoie ." ".$commune ." ".$codePostal." ".$pays;?> </h4>
																<h4><i class="fa fa-phone"></i> <?php echo $numTelephone;?></h4>
																<h4><i class="fa fa-envelope-o"></i> <?php echo $email;?></h4>

															</div>
															
															<!-- fin du contenu de modal  -->
															
															<!-- pied du modal "bouton valider"  -->
															<div class="modal-footer text-center">
															
																<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-thumbs-o-up"></i> OK</button>
																<!--button type="button" class="btn btn-danger" ><i class="fa fa-trash-o"></i> Supprimer</button-->	
															</div>
															<!--  fin du pied de modal -->
														</div>
													</div>
												</div>
												<!--  fin du contenu de modal supprimé client -->
									<?php
											}
										}
									}
								}
								?>
									
									
                                </tbody>
								<!-- fin du corp de tableau  -->
								
							</table>
							<!-- fin du contenu de tableau  -->
									
						</div>
					</div>
				</div>
				<!--   -->
				
			</div>
		</div>
	</div>
            
	<!-- fin de tableau  -->
           


