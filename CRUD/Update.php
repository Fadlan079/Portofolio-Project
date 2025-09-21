
// require_once "connect.php";

// if(isset($_GET['']))
// try{
//     $upd = $pdo->prepare("UPDATE users SET username =:username,email=:email,password=:password WHERE id_users = :id_users");
//     $upd->execute([
//         'username' => 'Budi',
//         'email' => 'Budi@gmail.com',
//         'password' => 'Budi#123',
//         'id_users' => 22
//     ]);
// }catch (PDOException $e){
//     echo("Query gagal: " . $e->getMessage());
// }

<?php
require_once "connect.php";

// Step 1: Ambil data lama berdasarkan id
if (isset($_GET['id_users'])) {
    $id = (int)$_GET['id_users'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id_users = :id");
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("User tidak ditemukan");
    }
}

// Step 2: Kalau form disubmit (method POST), update data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id       = $_POST['id_users'];
    $email    = $_POST['email'];
    $username = $_POST['username'];
    $role     = $_POST['role'];

    $update = $pdo->prepare("UPDATE users 
                             SET email = :email, username = :username, role = :role 
                             WHERE id_users = :id");
    $update->execute([
        'email' => $email,
        'username' => $username,
        'role' => $role,
        'id' => $id
    ]);

    // redirect setelah berhasil
    header("Location: user-management.php?success=updated");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit User</h2>
        
        <form method="POST" class="space-y-4">
            <input type="hidden" name="id_users" value="<?= htmlspecialchars($user['id_users']) ?>">

            <div>
                <label class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" name="email" 
                       value="<?= htmlspecialchars($user['email']) ?>" 
                       class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-emerald-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Username</label>
                <input type="text" name="username" 
                       value="<?= htmlspecialchars($user['username']) ?>" 
                       class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-emerald-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Role</label>
                <input type="text" name="role" 
                       value="<?= htmlspecialchars($user['role']) ?>" 
                       class="w-full border border-gray-300 rounded-lg p-2 mt-1 focus:ring-2 focus:ring-emerald-500">
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="user-management.php" class="text-gray-500 hover:underline">Batal</a>
                <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-lg">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</body>
</html>

