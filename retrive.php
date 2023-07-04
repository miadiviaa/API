<?php
require("koneksi.php");

$perintah = "SELECT * FROM tblsalon";
$eksekusi = mysqli_query($konek, $perintah);
$cek = mysqli_affected_rows($konek);

if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"] = "Data Tersedia";
    $response["data"] = array();
    
    while($get = mysqli_fetch_object($eksekusi)){
        $var["id"] = $get->id;
        $var["nama"] = $get->nama;
        $var["deskripsi"] = $get->deskripsi;
        $var["alamat"] = $get->alamat;
        $var["koordinat"] = $get->koordinat;
        $var["foto"] = $get->foto;
        array_push($response["data"], $var);
    }
    
    
    
}else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Data";
}

echo json_encode($response);
mysqli_close($konek);