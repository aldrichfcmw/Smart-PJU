<?php 

include 'function.php';

// if(isset($_POST)){
//     tambah_data($_POST);
// }

// if(isset($_GET)){
//     $data=$_GET['devui'];
//     $cek=query("SELECT * FROM board WHERE devui='$data'")[0];
//     echo json_encode($cek, JSON_PRETTY_PRINT);;
// }

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

if (isset($_GET['sensi_select'])) {
    $devui=$_GET['api'];
    $cek=query("SELECT sensitivitas FROM board WHERE devui='$devui'")[0];
    echo $status = $cek['sensitivitas'];
}

if (isset($_POST['sensi_update'])) {
    $devui=$_POST['api'];
    $sensi=$_POST['sensi'];
    mysqli_query($koneksi, "UPDATE board SET sensitivitas='$sensi' WHERE devui='$devui'");
    return mysqli_affected_rows($koneksi);
}

?>