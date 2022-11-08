<?php

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

</head>

<body>
  <h1>Daftar Mahasiswa</h1>
  <ul>
    <?php foreach ($mahasiswa as $mhs) : ?>
      <li>
        <a href="latihan4.php?nama=<?= $mhs['nama']; ?>&nrp=<?= $mhs['nrp']; ?>&email=<?= $mhs['email']; ?>&jurusan=<?= $mhs['jurusan']; ?>&gambar=<?= $mhs['gambar']; ?>">
          <?= $mhs['nama'] ?></a>
      </li>
    <?php endforeach ?>
  </ul>

</body>

</html>