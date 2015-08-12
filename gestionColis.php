<?php
include('entete.php');
?>


<!--  Fin entete -->

<!--  Contenu de la page Gestion des clients -->

	<!--  contenu du modal ajouter client -->

    <div class="modal fade" id="modal-responsive" aria-hidden="true">
        <div class="modal-dialog modal-lg">
			<form method="POST" action="#" id="myForm">
            <div class="modal-content">
				
				<!--  Entete du modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"><strong>Ajouter un nouveau client</strong>  <small></small></h4>
                </div>
				<!-- Fin entete du modal  -->
				
				<!--  Contenu du modal -->

                <div class="modal-body">
		
				
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Nom: *</label>
                                <input type="text" class="form-control" id="nom" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Prénom: *</label>
                                <input type="text" class="form-control" id="prenom" placeholder="">
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-4" class="control-label" >Sexe: *</label>
								<select  class="form-control" id="sexe" style="display: inherit !important; color:#000;">
									<option value="homme"><i class="fa fa-edit"> Homme</option>
									<option value="femme"><i class="fa fa-edit"> Femme</option>
                                               
								</select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="field-5" class="control-label">Date de naissance: *</label>
								<input type="text" class="form-control" id="date_naissance" placeholder="">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="field-6" class="control-label">Nationalité: *</label>
								<input type="text" class="form-control" id="nationalite" placeholder="">
							</div>
						</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Addresse: *</label>
                                <input type="text" class="form-control" id="adresse" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-4" class="control-label">ville: *</label>
                                <input type="text" class="form-control" id="ville" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="field-5" class="control-label">pays: *</label>
								<input type="text" class="form-control" id="pays" placeholder="">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="field-6" class="control-label">code postal: *</label>
								<input type="text" class="form-control" id="code_postale" placeholder="">
							</div>
						</div>
                    </div>
					
					<div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">N° téléphone: *</label>
                                <input type="text" class="form-control" id="numero_telephone" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">E-mail: *</label>
                                <input type="text" class="form-control" id="email" placeholder="">
                            </div>
                        </div>
                    </div>
					
					<div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-4" class="control-label">pseudonyme: *</label>
                                <input type="text" class="form-control" id="pseudo" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="field-5" class="control-label">Mot de passe: *</label>
								<input type="password" class="form-control" id="mot_passe" placeholder="">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="field-6" class="control-label">Confirmation de mot passe: *</label>
								<input type="password" class="form-control" id="confirmation_mot_passe" placeholder="">
							</div>
						</div>
                    </div>
                </div>
				
				<!-- fin du contenu de modal  -->
				
				<!-- pied du modal "bouton valider"  -->
				
                <div class="modal-footer text-center">
				
				
					<div id="test"></div>
                    <button type="button" name="vider" class="btn btn-primary"  onclick="viderChamps();"><i class="fa fa-eraser"></i> Vider les champs</button>
                    <button type="button" name="valider" class="btn btn-primary"  onclick="ajouter();"><i class="fa fa-check"></i> Valider</button>
                </div>
				<!--  fin du pied de modal -->
            </div>
			</form>
        </div>
    </div>
	<!--  fin du contenu de modal ajouter client -->

	<!--  tableau des clients existant dans la base de donnée -->
	<div id="tableauClien">

<?php
		include('tableaux/tabClients.php');
?>
		
	</div>
	<!--  Fin du tableau des clients existant dans la base de donnée -->

	
<!--  Fin du Contenu de la page Gestion des clients -->	

		
<!--  Pied de la page -->			
	
				<!--          Script pour vider les champs du modal d'ajout d'un nouveau client              -->
				<script type="text/javascript">
				function viderChamps() {
				document.getElementById('nom').value=""
				document.getElementById('prenom').value=""
				document.getElementById('sexe').value="homme"
				document.getElementById('date_naissance').value=""
				document.getElementById('nationalite').value=""
				document.getElementById('adresse').value=""
				document.getElementById('ville').value=""
				document.getElementById('pays').value=""
				document.getElementById('code_postale').value=""
				document.getElementById('numero_telephone').value=""
				document.getElementById('email').value=""
				document.getElementById('pseudo').value=""
				document.getElementById('mot_passe').value=""
				document.getElementById('confirmation_mot_passe').value=""
				document.getElementById('test').innerHTML = ' ';
					
					
				}
				</script>
				
				<!--          Script pour ajouter d'un nouveau client              -->
				<script type="text/javascript">
				function ajouter() {
					if (document.getElementById('nom').value!="" && document.getElementById('prenom').value!="" && document.getElementById('date_naissance').value!="" && document.getElementById('nationalite').value!="" && document.getElementById('adresse').value!="" && document.getElementById('ville').value!="" && document.getElementById('pays').value!="" && document.getElementById('code_postale').value!="" && document.getElementById('numero_telephone').value!="" && document.getElementById('email').value!="" && document.getElementById('pseudo').value!="" && document.getElementById('mot_passe').value!="" && document.getElementById('confirmation_mot_passe').value!="")
					{
						
						viderChamps();
						document.getElementById('test').innerHTML = '<div id="jError" style="color:green;"><i class="fa fa-frown-o" style="padding-right:6px"></i> Oops... Veuillez remplir tous les champs obligatoires.</div> ';
						//document.form.submit();
						document.getElementById("myForm").submit();
						//$('#modal-responsive').modal('hide');
					}
					else
					{
						document.getElementById('test').innerHTML = '<div id="jError" style="color:red;"><i class="fa fa-frown-o" style="padding-right:6px"></i> Oops... Veuillez remplir tous les champs obligatoires.</div> ';
							
						//document.location.reload()
						
					}
				}
				</script>
<?php
include('footer.php');
?>