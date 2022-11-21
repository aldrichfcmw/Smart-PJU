<?php

$title = "SMART PJU";

$koneksi = mysqli_connect("localhost", "root", "", "spju");
//$koneksi = mysqli_connect('localhost','sql_smart_pju','telkom20','sql_smart_pju');

function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function query_json($query_json)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query_json);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    $response=json_encode($rows, JSON_PRETTY_PRINT);
    return $response;
}

function regis($data)
{
    global $koneksi;
    $name1 = htmlspecialchars($data['name1']);
    $name2 = htmlspecialchars($data['name2']);
    $name = "$name1 $name2";
    $email = $data['email'];
    $password = md5($data["password"]);
    $repassword = md5($data["repassword"]);

    if($password==$repassword){
        $sql= "select * from users where email='$email'";
        $hasil = mysqli_query($koneksi, $sql);
        if(!$result -> num_rows > 0){
            $sql = "INSERT INTO users values ('','$name','$email','$password')";
            $hasil = mysqli_query($koneksi, $sql);
            if($hasil){
                echo "<script>alert('Registrasi berhasil')</script>";  
            } else {
                echo "<script>alert('Terdapat Kesalahan')</script>"; 
            }
        } else {
            echo "<script>alert('Email sudah dipakai')</script>"; 
        }
    } else {
        echo "<script>alert('Password harus sama')</script>"; 
    }
    
    return mysqli_affected_rows($koneksi);
}

function login($data)
{
    global $koneksi;
    $email = $data['emaillogin'];
    $password = md5($_POST["passwordlogin"]);

    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email' AND password='$password'");
	$cek = mysqli_num_rows($result);
    if ($cek > 0) {
		$row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = true;
        $_SESSION['id'] = $row['id'];
		$_SESSION['name'] = $row['nama'];
	} else {
		echo "<script>alert('Woops! Email Atau Password anda Salah.')</script>";
	}
    
    return mysqli_affected_rows($koneksi);
}

function tambah($data)
{
    global $koneksi;
    $devname = $data['devname'];
    $devui = $data['devui'];
    $board = $data['board'];
    $latitude = $data['latitude'];
    $longitude = $data['longitude'];
    $status = 0;

    $result = mysqli_query($koneksi, "SELECT * FROM board WHERE devui='$devui' AND devname='$devname'");
    $cek = mysqli_num_rows($result);
    //echo "<script>alert('$cek')</script>";
    if($cek == 0){
        
        $sql = "INSERT INTO board values ('','$board','$devname','$devui','$latitude','$longitude','$status')";
        $hasil = mysqli_query($koneksi, $sql);
    }
    return mysqli_affected_rows($koneksi);
}

function hapus($data)
{
    global $koneksi;
    $board = $data["del_board"];
    mysqli_query($koneksi, "DELETE FROM board WHERE id = $board");
    return mysqli_affected_rows($koneksi);
}

function tambah_data($data)
{
    global $koneksi;
    ini_set('date.timezone', 'Asia/Jakarta');
    $now = new DateTime();

    $datenow = $now->format("Y-m-d H:i:s");
    
    $tegangan = $data['tegangan'];
    $arus = $data['arus'];
    $suhu = $data['suhu'];
    $cahaya = $data['cahaya'];
    $devui = $data['devui'];
    		
    $result = mysqli_query($koneksi, "SELECT * FROM board WHERE devui='$devui'");
    $cek = mysqli_num_rows($result);
    if($cek > 0){
    	$sql = "INSERT INTO sensor(cahaya,tegangan,arus,suhu,date,devui) VALUES ('$cahaya', '$tegangan', '$arus', '$suhu', '$datenow', '$devui')";
    	if ($koneksi->query($sql) === TRUE) {
    		echo json_encode("Ok");
        } else {
        		echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    }
    return mysqli_affected_rows($koneksi);
}

function edit_data_status($data)
{
    global $koneksi;

    $status = $data['status'];
    $devui = $data['devui'];
    		
    $result = mysqli_query($koneksi, "SELECT * FROM board WHERE devui='$devui'");
    $cek = mysqli_num_rows($result);
    if($cek > 0){
        $sql = "UPDATE board SET status='$status' WHERE devui='$devui'";
    	if ($koneksi->query($sql) === TRUE) {
    		echo json_encode("Ok");
        } else {
        		echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    }
    return mysqli_affected_rows($koneksi);
}

//$path_parts = pathinfo($_SERVER['PHP_SELF']);
//$url = $path_parts['filename'];
?>