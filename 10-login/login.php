<?php

require 'functions.php'; //untuk mengambil $conn

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  // cek username
  if (mysqli_num_rows($result) === 1) { //untuk menghitung berapa baris yang di return query di atas

    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) { //untuk cek string sama ga dengan hashnya. Parameter => (password inputan, password database)
      header("Location: index.php");
      exit;
    }
  }

  // jika if lewat semua, berarti data tidak sesuai untuk login
  $error = true;
}


?>

<!DOCTYPE html>

<head>
  <title>Halaman Login</title>
</head>

<body>
  <h1>Halaman Login</h1>

  <?php if (isset($error)) : ?>
    <p style="color: red; font-style: italic;">Username / password salah</p>
  <?php endif ?>

  <form action="" method="POST">
    <ul>
      <li>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username">
      </li>
      <li>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
      </li>
      <li>
        <button type="submit" name="login">Login!</button>
      </li>
    </ul>
  </form>

</body>

</html>