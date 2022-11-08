<?php

// array associative => array yang memiliki key sebagai pengganti index (dalam bentuk string)
$mahasiswa = [
  [
    "nama" => "Winaldo Manurung",
    "nrp" => "043040023",
    "email" => "winaldo_manurung@gmail.com",
    "jurusan" => "Teknik Informatika",
    "gambar" => "winaldo.jpg"
  ],
  [
    "nama" => "Tito Sinaga",
    "nrp" => "092474523",
    "email" => "titosinaga@unpas.ac.id",
    "jurusan" => "Teknik Mesin",
    "gambar" => "tito.jpg"

  ],
  [
    "nama" => "Sandhika Galih",
    "nrp" => "040023430",
    "email" => "sandhikagalih@unpas.ac.id",
    "jurusan" => "Teknik Informatika",
    "gambar" => "sandhika.jpg"

  ],
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Daftar Mahasiswa</title>
  <style>
    .gambar {
      width: 100px;
      height: 100px;
    }
  </style>
</head>

<body>
  <h1>Daftar Mahasiswa</h1>
  <?php foreach ($mahasiswa as $mhs) : ?>
    <ul>
      <li>
        <img src="img/<?= $mhs["gambar"]; ?>" class="gambar">
      </li>
      <li>Nama: <?= $mhs["nama"]; ?></li>
      <li>NRP: <?= $mhs["nrp"]; ?></li>
      <li>Email: <?= $mhs["email"]; ?></li>
      <li>Jurusan: <?= $mhs["jurusan"]; ?></li>
    </ul>
  <?php endforeach; ?>
</body>

</html>