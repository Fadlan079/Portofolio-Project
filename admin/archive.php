<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Landing Page</title>
  <style>
    #loginForm {
      display: none; /* awalnya disembunyikan */
      position: fixed;
      top: 50%; left: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      background: white;
      border: 2px solid #333;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }
  </style>
</head>
<body>
  <!-- Logo / teks rahasia -->
  <h1 id="secretLogo">🚀 My Landing Page</h1>

  <!-- Form login rahasia -->
  <div id="loginForm">
    <h2>Login Admin</h2>
    <form action="admin/login.php" method="post">
      <input type="text" name="username" placeholder="Username"><br><br>
      <input type="password" name="password" placeholder="Password"><br><br>
      <button type="submit">Login</button>
    </form>
  </div>

  <script>
    let clickCount = 0;
    const logo = document.getElementById("secretLogo");
    const loginForm = document.getElementById("loginForm");

    logo.addEventListener("click", () => {
      clickCount++;
      if (clickCount === 5) { // kalau diklik 5x
        loginForm.style.display = "block";
      }
    });
  </script>
</body>
</html>
