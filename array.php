<?php
//Soal 1

// $teman = [
//     ["Farrel", "yapping", 16],
//     ["Fahwi", "Tidur", 17],
//     ["Andik", "Main GAG", 16]
// ];

$teman = [
    ["nama" => "Farrel" ,"hobi" => "yapping" ,"umur" => 16],
    ["nama" => "Fahwi" ,"hobi" => "Tidur" ,"umur" => 17],
    ["nama" => "Andik" ,"hobi" => "main roblox" ,"umur" => 16]
];

foreach ($teman as $item){
    print_r($item);
}

//Soal 2

$data_diri = 
    ["nama" => "Fadlan","umur" => 17,"hobi" => "malas-malasan"];

foreach ($data_diri as $key => $value){
    print_r("$key : $value\n");
}

//Soal 3

$angka = [10,5,8,1,7];
//kecil ke besar
sort($angka);
print_r($angka);

//besar ke kecil
rsort($angka);
print_r($angka);
?>