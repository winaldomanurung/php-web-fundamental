<?php
// cek apakah tidak ada data di $_GET
if (
  !isset($_GET["nama"]) ||
  !isset($_GET["nrp"]) ||
  !isset($_GET["email"]) ||
  !isset($_GET["jurusan"]) ||
  !isset($_GET["gambar"])
) { //isset digunakan untuk mengecek apakah sebuah variable sudah pernah didefinisika atau belum
  // redirect
  header('Location: latihan3.php');
  exit; //supaya script dibawah tidak dieksekusi
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Detail Mahasiswa</title>
  <style>
    .gambar {
      width: 100px;
      height: 100px;
    }
  </style>
</head>

<body>
  <ul>
    <li>
      <img src="img/<?= $_GET["gambar"]; ?>" class="gambar">
    </li>
    <li><?= $_GET["nama"]; ?></li>
    <li><?= $_GET["nrp"]; ?></li>
    <li><?= $_GET["email"]; ?></li>
    <li><?= $_GET["jurusan"]; ?></li>
  </ul>

  <a href="latihan3.php">Kembali ke daftar mahasiswa</a>
</body>

</html>