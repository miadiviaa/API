<?php
require("koneksi.php");
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];
    $alamat = $_POST["alamat"];
    $koordinat = $_POST["koordinat"];
    $foto = $_POST["foto"];
    
    $perintah = "INSERT INTO tblsalon (nama, deskripsi, alamat, koordinat, foto) VALUES('$nama','$deskripsi','$alamat','$koordinat','$foto')";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Menyimpan Data!";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Menyimpan Data!";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada data yang dikirim!";
}
 
echo json_encode($response);
mysqli_close($konek);