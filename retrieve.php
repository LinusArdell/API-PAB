<?php
require("koneksi.php");
$perintah = "SELECT * FROM lyricscloud";
$eksekusi = mysqli_query($connect, $perintah);
$cek = mysqli_affected_rows($connect);
if($cek>0){
    $response["kode"] = 1;
    $response["pesan"] = "data tersedia";
    $response["data"] = array();
    
    while($get = mysqli_fetch_object($eksekusi)){
        $var["id"] = $get ->id;
        $var["judul"] = $get ->judul;
        $var["album"] = $get ->album;
        $var["artis"] = $get ->artis;
        $var["genre"] = $get ->genre;
	    $var["lirik"] = $get ->lirik;
	    $var["link"] = $get ->link;
        
        array_push($response["data"], $var);
    }
} else {
    $response["kode"] = 0;
    $response["pesan"] = "data tidak tersedia";
}

echo json_encode($response);
mysqli_close($connect);
?>