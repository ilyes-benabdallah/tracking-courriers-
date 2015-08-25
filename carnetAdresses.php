<?php
include('entete.php');

?>

<?php
//include('tableaux/expeditionsRecentes.php');
?>



	<div id="carnetAdresse">

<?php
							
		include('tableaux/tabAdministrateurs.php');
?>
		
	</div>
	

		<script>
		$(document).ready(function(){
		
		//$('#carnetAdresse').html('tableaux/tabAdministrateurs.php#divglobaledufichierphp');
		//$("#carnetAdresse").load("load/expedier/infoDistinateur.php");
		//$("#carnetAdresse").load("tableaux/tabAdministrateurs.php #divglobaledufichierphp");
		//$("#carnetAdresseTbody").load("tableaux/bodyTableCarnetAdresse.php");
		//$("#infoDistinateurConfirme").load("load/expedier/infoDistinateur.php");
		
		});
		</script>



<?php
include('footer.php');
?>