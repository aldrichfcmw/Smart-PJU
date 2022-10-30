<?php 

require 'function.php';

if(isset($_POST)){
    tambah_data($_POST);
}

if(isset($_GET)){
    $data=$_GET['devui'];
    $cek=query("SELECT * FROM board WHERE devui='$data'")[0];
    echo $cek['status'];

}

if($_POST['type'] == "tampil"){
	$data = [];
	$query = mysqli_query($con, "SELECT * FROM posts ORDER BY id DESC ");
	while($row = mysqli_fetch_object($query)){
		$data[] = $row;
	}
	echo json_encode($data);
}

if($_POST['type'] == "marker"){
	$data = [];
	$query = mysqli_query($koneksi, "SELECT * FROM board ORDER BY id DESC ");
	while($row = mysqli_fetch_object($query)){
		$data[] = $row;
	}
	echo json_encode($data);
}

if($_POST['type'] == "permarker"){
	$devui = $data['devui'];
	$data = [];
	$query = mysqli_query($koneksi, "SELECT * FROM board where devui='$data' ORDER BY id DESC ");
	while($row = mysqli_fetch_object($query)){
		$data[] = $row;
	}
	echo json_encode($data);
}
?>