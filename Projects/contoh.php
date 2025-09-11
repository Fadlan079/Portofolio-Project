<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Belajar Array PHP</title>
</head>
<body>
    <h2>1. Array 2 Dimensi dengan Foreach</h2>
    <?php
    $nama = [
        ["nama" => "fadlan", "hobi" => "Malas", "usia" => 17],
        ["nama" => "Fahri", "hobi" => "yepping", "usia" => 17],
        ["nama" => "nathann andika", "hobi" => "gag", "usia" => 17]
    ];

    foreach ($nama as $teman) {
        echo "Nama: " . $teman["nama"] . "<br>";
        echo "Hobi: " . $teman["hobi"] . "<br>";
        echo "Usia: " . $teman["usia"] . " tahun<br><br>";
    }
    ?>

    <h2>2. Array Asosiatif</h2>
    <?php
    $data_diri = [
        "nama" => "farrel",
        "umur" => 16,
        "hobi" => "gag"
    ];

    foreach ($data_diri as $saya => $data_diri_saya) {
        echo ucfirst($saya) . ": " . $data_diri_saya . "<br>";
    }
    ?>

    <h2>3. Urutkan Array Angka</h2>
    <?php
    $angka = [10, 5, 8, 1, 7];

  
    sort($angka);
    echo "Dari kecil ke besar: " . implode(", ", $angka) . "<br>";


    rsort($angka);
    echo "Dari besar ke kecil: " . implode(", ", $angka) . "<br>";
    ?>
</body>
</html>