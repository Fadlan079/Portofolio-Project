<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];
    
    $hash = password_hash($password,PASSWORD_DEFAULT);

    $sql = "INSERT INTO data_user (email,username,password,telp)
            VALUES ('$email', '$username', '$hash', '$telp')";
    if (mysqli_query($kon, $sql)) {
        echo "Data berhasil ditambahkan!<br>";
        header("Location: \index.php?success=1");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($kon);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign in - Fadlan Server</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">
        Data berhasil ditambahkan!
    </div>
    <?php endif; ?>
    <form method="post" class="row">
        <h2>Sign in</h2>
        <div class="col">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required placeholder="example@gmail.com"><br><br>
        </div>
        <div class="col">
            <label class="form-label">Username:</label>
            <input type="text" name="username" class="form-control" required placeholder="Fadlan Firdaus"><br><br>
        </div>
        <div class="col-12">
            <label class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" required placeholder="isi dengan 8-16 karakter kombinasi huruf besar,huruf kecil,angka, dan karakter unik"><br><br>
        </div>
        <div class="col-12">
            <label class="form-label">No Telepon:</label>
            <input type="tel" name="telp" class="form-control" required placeholder="08xxxxxxxxxx"> <br><br>
        </div>
        <div class="col-12">
            <input type="submit" value="Submit" class="btn btn-primary mb-3">
        </div>
    </form>
</body>
</html>