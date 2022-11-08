<!DOCTYPE html>
<html lang="en">

<head>
  <title>POST</title>
</head>

<body>
  <!-- apakah tombol submit sudah ditekan -->
  <?php if (isset($_POST["submit"])) : ?>
    <h1>Halo, Selamat Datang <?= $_POST["nama"]; ?></h1>
  <?php endif; ?>

  <form action="latihan6.php" method="POST">
    Masukkan nama:
    <input type="text" name="nama">
    <br>
    <button type="submit" name="submit">
      Kirim
    </button>
  </form>

  <form action="" method="POST">
    Masukkan nama:
    <input type="text" name="nama">
    <br>
    <button type="submit" name="submit">
      Kirim
    </button>
  </form>

</body>

</html>