<?php 

require 'function.php';

if(isset($_POST)){
    tambah_data($_POST);
}

if(isset($_GET)){
    $data=$_GET['devui'];
    $cek=query("SELECT * FROM board WHERE devui='$data'")[0];
    echo json_encode($cek, JSON_PRETTY_PRINT);;
}

if($_POST['type'] == "tampil"){
	$data = [];
	$query = mysqli_query($con, "SELECT * FROM posts ORDER BY id DESC ");
	while($row = mysqli_fetch_object($query)){
		$data[] = $row;
	}
	echo json_encode($data);
}

if(isset($_POST["status"])){
    ubah_status($_POST["status"]);
}
?>