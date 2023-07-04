<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $judul = $_POST["judul"];
    $artis = $_POST["artis"];
    $album = $_POST["album"];
    $genre = $_POST["genre"];
    $lirik = $_POST["lirik"];
    $link = $_POST["link"];
    
    $perintah = "INSERT INTO lyricscloud(judul, artis, album, genre, lirik, link) VALUES('$judul','$artis','$album','$genre','$lirik', '$link')";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses menyimpan data";
    }   else    {
        $response["kode"] = 0;
        $response["pesan"] = "Gagal menyimpan data";
    }
    
}   else    {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada data";
    
}

echo json_encode($response);
mysqli_close($connect);
?>