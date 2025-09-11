<?php 
// //soal 1
function hitungkata($kalimat){
    $jumlahkalimat = str_word_count($kalimat);
    return $jumlahkalimat;
}
$kalimat = "Halo Dunia";
echo "Jumlah Karakter :" . hitungkata($kalimat) . PHP_EOL;

//soal 2
function sayHello($nama, $bahasa="id"){
    if($bahasa == "id"){
        echo "Halo Dunia,$nama" . PHP_EOL;

    }elseif($bahasa == "en"){
        echo "Hello World,$nama" .PHP_EOL;
    }else{
        echo"bahasa tidak valid";
    }
}
sayHello("Fadlan", "en");
sayHello("Fadlan");

//soal 3
function rataRata($nilai){
    $total = array_sum($nilai);
    $jumlahnilai = count($nilai);
    return $total / $jumlahnilai;
}

$a = [85,90,95,97,75];
echo"Nilai:" . PHP_EOL;
foreach($a as $item){
    echo$item . PHP_EOL;
}
echo "Nilai Rata Rata :".rataRata($a) . PHP_EOL;
?>