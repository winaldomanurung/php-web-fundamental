<?php

require 'functions.php';

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari diclick
if (isset($_POST["cari"])) {
  $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>

<head>
  <title>Halaman Admin</title>
</head>

<body>

  <a href="logout.php">Logout</a>

  <h1>Daftar Mahasiswa</h1>

  <a href="tambah.php">Tambah Data Mahasiswa</a>
  <br><br>

  <form action="" method="POST">
    <input type="text " name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off" id="keyword">
    <button type="submit" name="cari" id="tombol-cari">Cari!</button>
  </form>

  <div id="container">
    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
      </tr>


      <?php $i = 1; ?>
      <?php foreach ($mahasiswa as $row) : ?>
        <tr>
          <td><?= $i; ?></td>
          <td><a href="ubah.php?id=<?= $row["id"] ?>">Ubah</a> | <a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('Yakin?')">Hapus</a></td>
          <td><img src="img/<?= $row["gambar"] ?>" width="50px"></td>
          <td><?= $row["nrp"] ?></td>
          <td><?= $row["nama"] ?></td>
          <td><?= $row["email"] ?></td>
          <td><?= $row["jurusan"] ?></td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>

    </table>
  </div>
  <script src="js/script.js"></script>
</body>

</html>