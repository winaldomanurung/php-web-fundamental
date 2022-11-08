<?php
// koneksi ke database dengan mysqli
// mysqli_connect(hostname, username, pass, db name)

$conn = mysqli_connect("127.0.0.1:3307", "root", "", "phpmvc");

// query data mahasiswa
// mysqli_query(connection name, query);
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// ambil data (fetch) mahasiswa dari object result (ada 4 cara) 
// mysqli_fetch_row() => mengembalikan array numerik
// mysqli_fetch_assoc() => mengembalikan array associative
// mysqli_fetch_array() => mengembalikan array numerik dan array associative
// mysqli_fetch_object() =? mengembalikan object


// while ($mhs = mysqli_fetch_assoc($result)) {
//   var_dump($mhs);
// }
?>

<!DOCTYPE html>

<head>
  <title>Halaman Admin</title>
</head>

<body>
  <h1>Daftar Mahasiswa</h1>

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
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td><a href="">Ubah</a> | <a href="">Hapus</a></td>
        <td><img src="img/<?= $row["gambar"] ?>" width="50px"></td>
        <td><?= $row["nrp"] ?></td>
        <td><?= $row["nama"] ?></td>
        <td><?= $row["email"] ?></td>
        <td><?= $row["jurusan"] ?></td>
      </tr>
      <?php $i++; ?>
    <?php endwhile; ?>

  </table>
</body>

</html>