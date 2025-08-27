<?php

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Soal Praktek Percabangan</title>
</head>
<body>
    <h2>Soal Praktek Percabangan (PHP)</h2>

    <form method="post">
        <h3>1. Cek Bilangan (+, -, 0)</h3>
        <input type="text" name="bilangan" placeholder="Masukkan bilangan">
        <button type="submit" name="cek_bilangan">Cek</button>
    </form>


    <form method="post">
        <h3>2. Kategori Usia</h3>
        <input type="number" name="usia" placeholder="Masukkan usia">
        <button type="submit" name="cek_usia">Cek</button>
    </form>

    <form method="post">
        <h3>3. Pesan Sesuai Hari</h3>
        <input type="text" name="hari" placeholder="Masukkan nama hari (Senin–Minggu)">
        <button type="submit" name="cek_hari">Cek</button>
    </form>

    <hr>

    <?php
    if (isset($_POST['cek_bilangan'])) {
        $angka = $_POST['bilangan'];
        if ($angka > 0) {
            echo "<p>Bilangan $angka adalah <b>POSITIF</b>.</p>";
        } elseif ($angka < 0) {
            echo "<p>Bilangan $angka adalah <b>NEGATIF</b>.</p>";
        } else {
            echo "<p>Bilangan yang dimasukkan adalah <b>NOL</b>.</p>";
        }
    }

    if (isset($_POST['cek_usia'])) {
        $usia = $_POST['usia'];
        if ($usia <= 12 && $usia >0) {
            echo "<p>Kategori: <b>Anak</b></p>";
        } elseif ($usia > 12 && $usia <= 17) {
            echo "<p>Kategori: <b>Remaja</b></p>";
        } elseif ($usia >= 18 && $usia <= 59) {
            echo "<p>Kategori: <b>Dewasa</b></p>";
        }elseif($usia >=60){
            echo"<P>Kategori: <b>Lansia</b></p>";
        }else {
            echo "<p>Kategori: <b>Tidak Valid</b></p>";
        }
    }

    if (isset($_POST['cek_hari'])) {
        $hari = strtolower($_POST['hari']);
        switch ($hari) {
            case "senin":
                echo "<p>selamat hari senin</p>";
                break;
            case "selasa":
                echo "<p>selamat hari selasa</p>";
                break;
            case "rabu":
                echo "<p>selamat hari rabu</p>";
                break;
            case "kamis":
                echo "<p>selamat hari kamis</p>";
                break;
            case "jumat":
                echo "<p>selamat hari jumat</p>";
                break;
            case "sabtu":
                echo "<p>selamat hari sabtu</p>";
                break;
            case "minggu":
                echo "<p> selamat hari minggu</p>";
                break;
            default:
                echo "<p>Hari yang kamu masukkan tidak valid.</p>";
                break;
        }
    }
    ?>
</body>
</html>
