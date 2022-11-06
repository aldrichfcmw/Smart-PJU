<?php 
include 'function.php';

?>
<?php $dev=query("SELECT * FROM board")[0]; ?>
<?php if($dev['status']=="1"){echo "checked";}; ?>