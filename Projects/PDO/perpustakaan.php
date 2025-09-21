<?php
require_once "koneksi.php";

try{
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $insert = $pdo->prepare("INSERT INTO buku (judul, pengarang) VALUES (:judul, :pengarang)");
        $insert->execute([
            'judul' => $judul,
            'pengarang' => $pengarang
        ]);

        header("Location:/projects/PDO/perpustakaan.php?success=1");
        exit;
    }
}catch (PDOException $e){
    echo("Query gagal: " . $e->getMessage());
}


try{
    $sql = "SELECT * FROM buku";
    $select = $pdo->query($sql);
    $buku = $select->fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e){
    echo("Query gagal: " . $e->getMessage());
}

try{
   $update = $pdo->prepare("UPDATE buku SET judul = :judul,pengarang = :pengarang WHERE id_buku = :id_buku");
    // $update->execute([
    //     'judul' => 'Perahu Kertas',
    //     'pengarang' => 'Dewi Lestari',
    //     'id_buku' => 4
    // ]); 
}catch (PDOException $e){
    echo("Query gagal: " . $e->getMessage());
}

try{
    // $delete = $pdo->prepare("DELETE FROM buku WHERE id_buku = :id_buku");
    // $delete->execute(['id_buku' => 1]);
}catch (PDOException $e){
    echo("Query gagal: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengelola Buku</title>
    <link rel="stylesheet" href="/src/css/output.css">
</head>
<body class="text-neutral-200">
    <div class="max-w-4xl m-auto shadow-xl bg-neutral-100 rounded-xl mt-5 p-5">
        <h1 class="text-neutral-900 text-2xl font-bold block text-center">Sistem Pengelola Buku</h1>

        <section class="m-5 p-5">
            <h1 class="text-neutral-900 text-xl font-bold block text-left">Tampilkan buku</h1>
            <hr class="border-2 rounded-full border-emerald-500 w-full">

            <table class="m-5 p-5 w-full bg-neutral-900">
                <tr>
                    <th class="border border-neutral-500 p-5">ID Buku</th>
                    <th class="border border-neutral-500 p-5">Judul</th>
                    <th class="border border-neutral-500 p-5">Pengarang</th>
                </tr>

                <?php foreach ($buku as $row): ?>
                    <tr>
                        <td class="border border-neutral-500 p-5"><?= htmlspecialchars($row['id_buku']) ?></td>
                        <td class="border border-neutral-500 p-5"><?= htmlspecialchars($row['judul']) ?></td>
                        <td class="border border-neutral-500 p-5"><?= htmlspecialchars($row['pengarang']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>

        <section class="m-5 p-5">
            <h1 class="text-neutral-900 text-xl font-bold block text-left">Tambah buku</h1>
            <hr class="border-2 rounded-full border-emerald-500 w-full">

            <form action="perpustakaan.php" method="POST" class="grid grid-cols-1 gap-10 m-5 p-5 bg-neutral-900  shadow-xl border border-neutral-500 w-full">
                <label for="" class="font-bold">Judul</label>
                <input type="text" name="judul" placeholder="Laskar Pelangi..." required class="border-2 border-neutral-500 p-2 shadow-lg rounded-lg focus:outline-none focus:border-emerald-500 transition-all duration-300">
                <label for="" class="font-bold">Pengarang</label>
                <input type="text" name="pengarang" placeholder="Andrea Hirata..." required class="border-2 border-neutral-500 p-2 shadow-lg rounded-lg focus:outline-none focus:border-emerald-500 transition-all duration-300">
                <input type="submit" value="Kirim" class="font-bold text-xl rounded-lg shadow-xl bg-orange-500 hover:bg-emerald-500 hover:scale-105 hover:-translate-y-1 hover:text-neutral-100 hover:shadow-2xl transition-all duration-300 p-3">
            </form>
        </section>
    </div>
</body>
</html>