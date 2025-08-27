<?php 
// $host = "localhost";
// $user = "root";
// $password = "";
// $db = "stationary";

// $kon =mysqli_connect($host,$user,$password,$db);
// if (!$kon){
//     die("koneksi gagal:".mysqli_connect_error());
// }

function cekUmur($umur) {
    if ($umur < 18) {
        return; // fungsi berhenti di sini, gak lanjut ke bawah
    }
    echo "Umur sudah cukup dewasa <br>";
}

cekUmur(15);  // ini gak cetak apa-apa
// cekUmur(20);  // ini cetak "Umur sudah cukup dewasa"
?>