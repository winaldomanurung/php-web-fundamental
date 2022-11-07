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
  $gambar = htmlspecialchars($data["gambar"]);

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
