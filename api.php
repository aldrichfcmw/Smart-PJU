<?php 

include 'function.php';

if (isset($_POST['data_post'])){
    tambah_data($_POST);
}

if (isset($_POST['data_post_status'])){
    edit_data_status($_POST);
}

if (isset($_GET['data_request'])) {
    $data=$_GET['devui'];
    $cek=query("SELECT * FROM board WHERE devui='$data'")[0];
    echo json_encode($cek, JSON_PRETTY_PRINT);;
}

if (isset($_GET['toggle_select'])) {
    $devui=$_GET['api'];
    $cek=query("SELECT status FROM board WHERE devui='$devui'")[0];
    echo $status = $cek['status'];
}

if (isset($_POST['toggle_update'])) {
    $devui=$_POST['api'];
    $status=$_POST['status'];
    mysqli_query($koneksi, "UPDATE board SET status='$status' WHERE devui='$devui'");
    return mysqli_affected_rows($koneksi);
}

if (isset($_GET['sensi_lux'])) {
    $devui=$_GET['api'];
    $cek=query("SELECT sensi_lux FROM board WHERE devui='$devui'")[0];
    echo $status = $cek['sensi_lux'];
}

if (isset($_POST['sensi_up_lux'])) {
    $devui=$_POST['api'];
    $sensi=$_POST['sensi'];
    mysqli_query($koneksi, "UPDATE board SET sensi_lux='$sensi' WHERE devui='$devui'");
    return mysqli_affected_rows($koneksi);
}

if (isset($_GET['sensi_elec'])) {
    $devui=$_GET['api'];
    $cek=query("SELECT sensi_elec FROM board WHERE devui='$devui'")[0];
    echo $status = $cek['sensi_elec'];
}

if (isset($_POST['sensi_up_elec'])) {
    $devui=$_POST['api'];
    $sensi=$_POST['sensi'];
    mysqli_query($koneksi, "UPDATE board SET sensi_elec='$sensi' WHERE devui='$devui'");
    return mysqli_affected_rows($koneksi);
}

if(isset($_POST['permarker'])){
    $devui=$_POST['api'];
	$query = mysqli_query($koneksi, "SELECT * FROM board WHERE devui='$devui' ORDER BY id DESC ");
	$row = mysqli_fetch_assoc($query);
	print json_encode($row);
}

if(isset($_POST['marker'])){
	$data = [];
	$query = mysqli_query($koneksi, "SELECT * FROM board ORDER BY id DESC ");
	while($row = mysqli_fetch_object($query)){
		$data[] = $row;
	}
	echo json_encode($data);
}
?>