<?php
//for
for ($i = 1; $i <= 5; $i++) {
    echo "Perulangan ke-$i <br>";
}

//while
$i = 1;
while ($i <= 5) {
    echo "Perulangan ke-$i <br>";
    $i++;
}

//do while
$i = 7;
do {
    echo "Nilai = $i <br>";
    $i++;
} while ($i <= 5);


//foreach
$buah = ["Apel", "Jeruk", "Mangga"];
foreach ($buah as $item) {
    echo $item . "<br>";
}

//soal 1
for($i = 1;$i<=10;$i++){
    echo "\n 5 x $i =" . (5*$i);
}

//soal 2


//soal 3
$matpel = ["bahasa", "matematika", "pplg", "informatika"];
foreach($matpel as $index => $i){
    echo "\n Pelajaran ke-" . ($index+1). $i ;
}
?>