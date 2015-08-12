
        <!-- BEGIN MAIN CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
						<div class="panel-heading bg-white" style="border-bottom:3px solid #DFE5E9;">
							<h3 class="panel-title"><strong>Expédier </strong> Expéditions récentes </h3>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					

							<!--  bouton ajouter client -->
							<button class="btn btn-dark btn-transparent" data-toggle="modal" data-target="#modal-responsive" onclick="viderChamps();" style="/*color:#fff !important; border: 1px solid #fff !important;*/" ><b><i class="glyph-icon flaticon-email"></i>&nbsp; Expédier</b></button>
						</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <form class="form-wizard" action="index.php">
                                        <h1>Account</h1>
                                        <section>
                                            <div class="form-group">
                                                <label for="userName">User name *</label>
                                                <input id="userName" name="userName" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password *</label>
                                                <input id="password" name="password" type="password" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="confirm">Confirm Password *</label>
                                                <input id="confirm" name="confirm" type="password" class="form-control required">
                                            </div>
                                            <p>(*) Mandatory</p>
                                        </section>
                                        <h1>Profile</h1>
                                        <section>
                                            <div class="form-group">
                                                <label for="name">First name *</label>
                                                <input id="name" name="name" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="surname">Last name *</label>
                                                <input id="surname" name="surname" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email *</label>
                                                <input id="email" name="email" type="text" class="form-control required email">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input id="address" name="address" type="text" class="form-control">
                                            </div>
                                          
                                            <p>(*) Mandatory</p>
                                        </section>
                                        <h1>Warning</h1>
                                        <section>
                                            <legend>You are to young</legend>
                                            <p>Please go away ;-)</p>
                                        </section>
                                        <h1>Finish</h1>
                                        <section>
                                            <legend>Terms and Conditions</legend>
                                            <div class="pos-rel p-l-30">
                                                <input id="acceptTerms" name="acceptTerms" type="checkbox" class="pos-rel p-l-30 required">
                                                <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                            </div>
                                        </section>
                                    </form>
                                    <!-- END FORM WIZARD WITH VALIDATION -->

                                </div>

                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- END MAIN CONTENT -->

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
    <script type="text/javascript" src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="assets/plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="assets/plugins/wizard/wizard.js"></script>
    <script src="assets/plugins/jquery-steps/jquery.steps.js"></script>
    <script src="assets/js/form_wizard.js"></script>
    <!-- END  PAGE LEVEL SCRIPTS -->
    <script src="assets/js/application.js"></script>
