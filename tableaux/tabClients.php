
	<!-- tableau des clients  -->  
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				
				<!--  panel du titre de tableau -->
				<div class="panel-heading bg-white" style="border-bottom:3px solid #DFE5E9;">
					<h3 class="panel-title"><strong>Clients </strong> Liste des clients </h3>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					

					<!--  bouton ajouter client -->
					<button class="btn btn-dark btn-transparent" data-toggle="modal" data-target="#modal-responsive" onclick="viderChamps();" style="/*color:#fff !important; border: 1px solid #fff !important;*/" ><b><i class="fa fa-plus"></i> Ajouter un client</b></button>
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
										<th>Clients</th>
										<th>N° téléphone</th>
										<th></th>
										<th></th>
										<th></th>
										</tr>
								</thead>
								<!-- fin entete de tableau  -->
																
								<!-- corp du tableau   -->
								<tbody>
									<tr>
										<td id="1">BENABDALLAH	Mohammed Ilyes</td>
										<td>0775 38 34 61</td>
										<td><a href="#"><button class="btn btn-info btn-transparent" data-toggle="modal" data-target="#modal-detail"><i class="fa fa-info"></i> Détail</button></a></td>
										<td><a href="#"><button class="btn btn-danger btn-transparent" data-toggle="modal" data-target="#modal-supprime"><i class="fa fa-trash-o"></i> Supprimer</button></a></td>
										<td><a href="#"><button class="btn btn-success btn-transparent" data-toggle="modal" data-target="#modal-responsive1"><i class="fa fa-edit"></i> Modifier</button></a></td>
									</tr>
									
									<!--  contenu du modal détail client -->
									<div class="modal fade" id="modal-detail" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												
												<!--  Entete du modal -->
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
													<h4 class="modal-title" id="myModalLabel"><strong>Détail du client</strong>  <small></small></h4>
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
									<!--  fin du contenu de modal détail client -->
									
									<!--  contenu du modal supprimé client -->
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

													<h3><center>Etes vous sure de vouloir supprimer ce client?</center></h3>
													
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
									<!--  fin du contenu de modal supprimé client -->
									
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
           

    <!-- BEGIN MANDATORY SCRIPTS -->
    <script src="assets/plugins/jquery-1.11.js"></script>
    <script src="assets/plugins/jquery-migrate-1.2.1.js"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui-1.10.4.min.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script>
    <script src="assets/plugins/bootstrap-select/bootstrap-select.js"></script>
    <script src="assets/plugins/icheck/icheck.js"></script>
    <script src="assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/plugins/mmenu/js/jquery.mmenu.min.all.js"></script>
    <script src="assets/plugins/nprogress/nprogress.js"></script>
    <script src="assets/plugins/charts-sparkline/sparkline.min.js"></script>
    <script src="assets/plugins/breakpoints/breakpoints.js"></script>
    <script src="assets/plugins/numerator/jquery-numerator.js"></script>
    <!-- END MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/bootstrap-switch/bootstrap-switch.js"></script>
    <script src="assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js"></script>
    <script src="assets/plugins/datatables/dynamic/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="assets/plugins/datatables/dataTables.tableTools.js"></script>
    <script src="assets/plugins/datatables/table.editable.html"></script>
    <script src="assets/js/table_dynamic.js"></script>
    <!-- END  PAGE LEVEL SCRIPTS -->
    <script src="assets/js/application.js"></script>

