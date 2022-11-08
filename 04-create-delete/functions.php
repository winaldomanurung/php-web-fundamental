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
