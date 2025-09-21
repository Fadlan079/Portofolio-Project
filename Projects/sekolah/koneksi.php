<?php
class Database {
    private $host = "localhost";
    private $db   = "sekolah";
    private $user = "root";
    private $pass = "";
    private $pdo;

    public function __construct() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db}";
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Koneksi Berhasil !";
        }catch(PDOException $e) {
            die("Koneksi gagal: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}

class Siswa {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // CREATE
    public function simpan($nama, $kelas) {
        $sql = "INSERT INTO siswa (nama, kelas) VALUES (:nama, :kelas)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nama' => $nama,
            ':kelas' => $kelas
        ]);
        echo "Data siswa '$nama' berhasil ditambahkan.\n";
    }

    // READ
    public function semua() {
        $sql = "SELECT * FROM siswa";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "Daftar Siswa:\n";
        foreach ($data as $row) {
            echo $row['id_siswa']." - ".$row['nama']." (".$row['kelas'].")\n";
        }
        echo "--------------------------------\n";
    }

    // UPDATE
    public function update($id, $nama, $kelas) {
        $sql = "UPDATE siswa SET nama = :nama, kelas = :kelas WHERE id_siswa = :id_siswa";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id_siswa' => $id,
            ':nama' => $nama,
            ':kelas' => $kelas
        ]);
        echo "Data siswa dengan ID $id berhasil diperbarui.\n";
    }

    // DELETE
    public function hapus($id) {
        $sql = "DELETE FROM siswa WHERE id_siswa = :id_siswa";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_siswa' => $id]);
        echo "Data siswa dengan ID $id berhasil dihapus.\n";
    }

     public function ubah_DB(Database $db) {
         $db->host = "hacker_host";
}
}

$db = new Database();
$pdo = $db->getConnection();
$siswa = new Siswa($pdo);
// $siswa->simpan("Fadlan","XI");
$siswa->semua();
// $siswa->update(1,"Fattah", "X");
$siswa->hapus(2);