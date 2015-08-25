<?php ob_start(); ?>
<?php
//session_start();
include('entete.php');

?>

<?php
include('tableaux/expeditionsRecentes.php');
?>
<?php
include('footer.php');
?>
<?php ob_flush(); ?>