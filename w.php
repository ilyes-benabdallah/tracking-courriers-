<?php
		include('entete.php');
?>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Wizard</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3><strong>Step</strong> Wizard</h3>
                                    <p>Here is an example of a complete wizard form in modal window.</p>
                                    <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                                    <form class="form-wizard" action="#">
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
                                            <div class="form-group">
                                                <label for="age">Age (The warning step will show up if age is less than 18) *</label>
                                                <input id="age" name="age" type="text" class="form-control required number">
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

                                <div class="col-md-4">
                                    <h3><strong>Modal</strong> Wizard Bootstrap</h3>
                                    <p>Here is an example of a complete wizard form in modal window.</p>
                                    <button id="open-wizard" class="btn btn-primary">Open wizard</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      
        <!-- END MAIN CONTENT -->


    <!-- END WRAPPER -->
 
   
<?php
		include('footer.php');
?>