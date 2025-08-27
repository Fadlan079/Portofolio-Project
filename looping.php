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
?>