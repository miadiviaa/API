<?php
require("koneksi.php");
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    
    $perintah = "DELETE FROM tblsalon WHERE id='$id'";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Menghapus Data!";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Menghapus Data!";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada data yang dikirim!";
}
 
echo json_encode($response);
mysqli_close($konek);