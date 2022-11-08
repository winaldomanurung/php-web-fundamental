<?php

$conn = mysqli_connect("127.0.0.1:3307", "root", "", "phpmvc");

function query($query)
{
  global $conn; //supaya variable di luar function bisa di akses
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  global $conn;
  // ambil data dari tiap elemen dalam form
  $nrp = htmlspecialchars($data["nrp"]);
  $nama = htmlspecialchars($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);

  // upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false; //kalau ketemu ini maka sisa di bawahnya tidak akan dijalankan
  }

  // query insert data
  $query = "INSERT INTO mahasiswa
  VALUES
  ('','$nama','$gambar','$nrp','$email','$jurusan')
  ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  global $conn;
  mysqli_query(
    $conn,
    "DELETE FROM mahasiswa WHERE id=$id"
  );
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  global $conn;

  // ambil data dari tiap elemen dalam form
  $id = $data["id"]; //gausah pake htmlspecialchars karena dia hidden input
  $nrp = htmlspecialchars($data["nrp"]);
  $nama = htmlspecialchars($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);

  // cek apakah user pilih gambar baru
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
  }

  // query insert data
  $query = "UPDATE mahasiswa 
            SET 
            nrp = '$nrp',
            nama = '$nama',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
            WHERE id = $id
            ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function cari($keyword)
{
  $query = "SELECT * FROM mahasiswa WHERE 
          nama LIKE '%$keyword%' OR
          nrp LIKE '%$keyword%' OR
          email LIKE '%$keyword%' OR
          jurusan LIKE '%$keyword%'
          ";

  echo $query;

  return query($query);
}

function upload()
{
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek apakah tidak ada gambar yang di upload
  if ($error === 4) {
    echo "<script>
      alert('Pilih gambar terlebih dahulu!');
    </script>";
  }

  // cek apakah yang diupload adalah gambar dengan menggunakan ekstensi file
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));

  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>
      alert('Yang Anda upload bukan sebuah gambar!');
    </script>";
    return false;
  }

  // cek apakah ukuran gambar terlalu besar
  if ($ukuranFile > 1000000) {
    echo "<script>
    alert('Ukuran gambar terlalu besar!');
  </script>";
    return false;
  }

  // lolos pengecekan, gambar siap diupload ke direktori pilihan
  // generate juga nama barunya

  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
  return $namaFileBaru;
}
