
	<!-- tableau des Administrateurs  -->  
	<div id="#divglobaledufichierphp">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				
				<!--  panel du titre de tableau -->
				<div class="panel-heading bg-white" style="border-bottom:3px solid #DFE5E9;">
					<h3 class="panel-title"><strong>Administrateurs </strong> Liste des Administrateurs </h3>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					

					<!--  bouton ajouter Administrateur -->
					<button class="btn btn-dark btn-transparent" data-toggle="modal" data-target="#modal-responsive" onclick="viderChamps();" style="/*color:#fff !important; border: 1px solid #fff !important;*/" ><b><i class="fa fa-plus"></i> Ajouter un Administrateur</b></button>
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
										<th>Administrateurs</th>
										<th>E-mail</th>
										<th>N° téléphone</th>
										
										<th></th>
										<th></th>
										</tr>
								</thead>
								<!-- fin entete de tableau  -->
																
								<!-- corp du tableau   -->
								<tbody>
									<tr>
										<td id="1">BENABDALLAH	Mohammed Ilyes (Pseudo)</td>
										<td>Kira13_ilyes@hotmail.com</td>
										<td>0775 38 34 61</td>
										<td><a href="#"><button class="btn btn-info btn-transparent" data-toggle="modal" data-target="#modal-detail"><i class="fa fa-info"></i> Détail</button></a></td>
										<td><a href="#"><button class="btn btn-danger btn-transparent" data-toggle="modal" data-target="#modal-supprime"><i class="fa fa-trash-o"></i> Supprimer</button></a></td>
										
									</tr>
									
									<!--  contenu du modal détail Administrateur -->
									<div class="modal fade" id="modal-detail" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												
												<!--  Entete du modal -->
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
													<h4 class="modal-title" id="myModalLabel"><strong>Détail du Administrateur</strong>  <small></small></h4>
												</div>
												<!-- Fin entete du modal  -->
												
												<!--  Contenu du modal -->
												<div class="modal-body">
													<h4><i class="fa fa-user"></i><b> BENABDALLAH mohammed ilyes </b> (10 - 02 - 1991)</h4>
													<h4><i class="fa fa-map-marker"></i> 09 cité des jasmins Tlemcen Algerie</h4>
													<h4><i class="fa fa-phone"></i> 0775 38 34 61</h4>
													<h4><i class="fa fa-envelope-o"></i> ilyes.benabdallah@eurequat-algerie.com</h4>

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
									<!--  fin du contenu de modal détail Administrateur -->
									
									<!--  contenu du modal supprimé Administrateur -->
									<div class="modal fade" id="modal-supprime" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<!--  Entete du modal -->
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
													<br>
												</div>
												<!-- Fin entete du modal  -->
												
												<!--  Contenu du modal -->
												<div class="modal-body">

													<h3><center>Etes vous sure de vouloir supprimer ce Administrateur?</center></h3>
													
												</div>
												
												<!-- fin du contenu de modal  -->
												
												<!-- pied du modal "bouton valider"  -->
												<div class="modal-footer text-center">
													<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-rotate-left"></i> Annuler</button>	
													<button type="button" class="btn btn-danger" ><i class="fa fa-trash-o"></i> Supprimer</button>	
												</div>
												<!--  fin du pied de modal -->
											</div>
										</div>
									</div>
									<!--  fin du contenu de modal supprimé Administrateur -->
									
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
	</div>
            
	<!-- fin de tableau  -->
           

 

