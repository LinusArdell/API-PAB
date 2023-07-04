<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $perintah = "SELECT * FROM tbl_pengguna WHERE username='$username' AND password='$password'";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Login sukses";
        $response["dataPengguna"] = array();
    
    while($get = mysqli_fetch_object($eksekusi)){
        $var["username"] = $get ->username;
        
        array_push($response["dataPengguna"], $var);
    }
    }   else    {
        $response["kode"] = 0;
        $response["pesan"] = "Login gagal";
    }
    
}   else    {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada data";
    
}

echo json_encode($response);
mysqli_close($connect);
?>