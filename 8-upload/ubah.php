<?php
require 'functions.php';

// ambil id di URL
$id = $_GET['id'];

// query data mahasiswa berdasar id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0]; //langsung ambil index pertamanya


// cek apakah tombol sudah ditekan
if (isset($_POST['submit'])) {
  // cek apakah data berhasil diubah
  if (ubah($_POST) > 0) {
    echo "
      <script>
        alert('Data berhasil diubah!');
        document.location.href = 'index.php';
      </script>
    ";
  } else {
    echo "
    <script>
      alert('Data gagal diubah!');
      document.location.href = 'index.php';
    </script>
  ";
  }
}
?>

<!DOCTYPE html>

<head>

  <title>Ubah Data Mahasiswa</title>
</head>

<body>
  <h1>Ubah Data Mahasiswa</h1>

  <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
    <ul>
      <li>
        <label for="nrp">NRP</label>
        <input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"]; ?>">
      </li>
      <li>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
      </li>
      <li><label for="email">Email</label>
        <input type="email" name="email" id="email" required value="<?= $mhs["email"]; ?>">
      </li>
      <li><label for="jurusan">Jurusan</label>
        <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
      </li>
      <li><label for="gambar">Gambar</label>
        <br>
        <img src="img/<?= $mhs["gambar"]; ?>" width="40">
        <input type="file" name="gambar" id="gambar">
      </li>

      <li>
        <button type="submit" name="submit">Ubah Data</button>
      </li>
    </ul>
  </form>
</body>

</html>