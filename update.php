<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $judul = $_POST["judul"];
    $artis = $_POST["artis"];
    $album = $_POST["album"];
    $genre = $_POST["genre"];
    $lirik = $_POST["lirik"];
    $link = $_POST["link"];
    
    $perintah = "UPDATE lyricscloud set judul = '$judul', artis = '$artis', album = '$album', genre = '$genre', lirik = '$lirik', link = '$link' where id = '$id'";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses update data";
    }   else    {
        $response["kode"] = 0;
        $response["pesan"] = "Gagal update data";
    }
    
}   else    {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada data";
    
}

echo json_encode($response);
mysqli_close($connect);
?>