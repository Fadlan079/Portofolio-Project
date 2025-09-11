<?php 
echo "hello world \n";

$naamaDepan = "Fadlan";
$namaBelakang = "Firdaus";


//Array pake index dari 0
$Makanan = ["Mie ayam",
             "Bakso ayam", 
             "dada ayam"];

foreach ($Makanan as $item) {
    echo "$item \n";
}

echo $Makanan[0];

//Array associative buat index sendiri 
$datauser = [
    "Username" => "Fadlan",
    "Pass" => "12345678",
    "telp" => "08232143555"
];

echo $datauser ['Username'];

foreach($datauser as $i){
    echo "$i \n";
}

$data = ["apel", "jeruk", "pisang"];
print_r($data);
?>