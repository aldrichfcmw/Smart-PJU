<?php
include 'function.php';
$devui=$_GET['devui'];
$arus=$_GET['arus'];
$sensi_elec=query("SELECT sensi_elec FROM board WHERE devui='$devui'")[0];
echo $tegangan = $_GET['teg'] - $sensi_elec['sensi_elec'];
echo "<br>";
echo $kwh=$arus*$tegangan*720/1000;

?>