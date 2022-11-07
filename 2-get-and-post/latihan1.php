<?php

// variable scope
$x = 10; //variable local untuk file latihan1

function tampilX()
{
  global $x; //cari ada ga variable x diluar function, kalau ada maka ambil
  echo $x; //10
}

tampilX();
echo '<br>';
echo $x; //10
