<?php

// SUPERGLOBAL
// var_dump($_GET); //isinya kosong
// var_dump($_SERVER); //sudah ada isinya
// echo ($_SERVER['SERVER_NAME']);

// $_GET
// insert data 1
// $_GET["nama"] = "Winaldo Manurung";
// $_GET["nrp"] = "03848236";
var_dump($_GET);

// insert data 2 (dengan url)
// ? => artinya saya akan memasukkan data ke url ini
// ?nama=Winaldo Manurung => artinya saya akan memasukkan data ke url ini menggunakan methode request GET dengan key nama dan value Winaldo Manurung
// ?nama=Winaldo%20Manurung&nrp=03848236
