<?php
// koneksi ke database => semua halaman yang ingin konek harus melakukan ini
$conn = mysqli_connect("127.0.0.1:3307", "root", "", "phpmvc");


// cek apakah tombol sudah ditekan
// bacanya: apakah $_POST (element yang ada di dalam form dengan method post) yang key(name)nya submit sudah ditekan? Jika sudah maka di dalam variable superglobal $_POST akan dibuat sebuah elemen yang keynya submit
if (isset($_POST['submit'])) {
  // ambil data dari tiap elemen dalam form
  $nrp = $_POST["nrp"];
  $nama = $_POST["nama"];
  $email = $_POST["email"];
  $jurusan = $_POST["jurusan"];
  $gambar = $_POST["gambar"];

  var_dump($_POST);

  // query insert data
  $query = "INSERT INTO mahasiswa
            VALUES
            ('','$nama','$gambar','$nrp','$email','$jurusan')
            ";
  mysqli_query($conn, $query);

  // cek apakah success
  var_dump(mysqli_affected_rows($conn)); //jika menghasilkan -1 maka ada error
  // jadi kita bisa cek dengan:
  if (mysqli_affected_rows($conn) > 0) {
    echo 'Berhasil';
  } else {
    echo 'Gagal!';
    echo '<br>';
    echo mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>

<head>

  <title>Tambah Data Mahasiswa</title>
</head>

<body>
  <h1>Tambah Data Mahasiswa</h1>

  <form action="" method="POST">
    <ul>
      <li>
        <label for="nrp">NRP</label>
        <input type="text" name="nrp" id="nrp">
      </li>
      <li>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama">
      </li>
      <li><label for="email">Email</label>
        <input type="email" name="email" id="email">
      </li>
      <li><label for="jurusan">Jurusan</label>
        <input type="text" name="jurusan" id="jurusan">
      </li>
      <li><label for="gambar">Gambar</label>
        <input type="text" name="gambar" id="gambar">
      </li>

      <li>
        <button type="submit" name="submit">Tambah Data</button>
      </li>
    </ul>
  </form>
</body>

</html>