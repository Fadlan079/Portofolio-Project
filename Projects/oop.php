<?php
//Soal 1
class Siswa{
    public $nama;
    public $kelas;

    public function profil(){
        return "Nama: $this->nama Kelas: $this->kelas \n";
}
}

$siswa1 = new Siswa();
$siswa1->nama = "Fadlan";
$siswa1->kelas = "XI PPLG";
$siswa->hobi = "malas";
    
$siswa2 = new Siswa();
$siswa2->nama = "Fahri";
$siswa2->kelas = "XI PPLG";

echo $siswa1->profil();
echo $siswa2->profil();

//Soal 2
class Segitiga{
    public $alas;
    public $tinggi;

    public function hitungLuas(){
        $luas = 0.5 * $this->alas * $this->tinggi;

            return (object) [
            "alas" => $this->alas,
            "tinggi" => $this->tinggi
        ];

        // return "Alas: $this->alas \n Tinggi: $this->tinggi \n Luas Segitiga: $luas \n"; 
    }
}

$segitiga = new Segitiga();
$segitiga->alas = 10;
$segitiga->tinggi = 5;

 $segitiga->hitungLuas();

foreach ($segitiga as $key => $value) {
    echo $key . " : " . $value . "\n";
}

//Soal 3
class Lampu{
    public $status = "Mati";

    function nyalakan(){
        $this->status = "Nyala";
        echo "Lampu Di Nyalakan \n";
    }

    function matikan(){
        $this->status = "Mati";
        echo "Lampu Di Matikan \n";
    }

    function Status(){
        return"Status Lampu : $this->status \n";
    }
}

$lampu = new Lampu();
echo $lampu->Status();
$lampu->nyalakan();
echo $lampu->Status();
?>