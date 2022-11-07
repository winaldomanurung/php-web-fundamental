<?php

// array numerik => array yang index nya merupakan angka
$mahasiswa = [
  [
    "Winaldo Manurung",
    "043040023",
    "winaldo_manurung@gmail.com",
    "Teknik Informatika"
  ],
  [
    "Tito Sinaga",
    "092474523",
    "titosinaga@unpas.ac.id",
    "Teknik Mesin"
  ],
  [
    "Sandhika Galih",
    "040023430",
    "sandhikagalih@unpas.ac.id",
    "Teknik Informatika"
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
  <?php foreach ($mahasiswa as $mhs) : ?>
    <ul>
      <li>Nama: <?= $mhs[0]; ?></li>
      <li>NRP: <?= $mhs[1]; ?></li>
      <li>Email: <?= $mhs[2]; ?></li>
      <li>Jurusan: <?= $mhs[3]; ?></li>
    </ul>
  <?php endforeach; ?>
</body>

</html>