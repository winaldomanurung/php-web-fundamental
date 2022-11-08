// ambil elemen yang dibutuhkan

var keyword = document.getElementById("keyword");
var tombolCari = document.getElementById("tombol-cari");
var container = document.getElementById("container");

// tambahkan event ketika keyword ditulis
keyword.addEventListener("keyup", function () {
  // buat object AJAX
  var xhr = new XMLHttpRequest();

  // cek kesiapan AJAX (sumbernya harus siap merespon)
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  };

  // eksekusi ajax
  xhr.open("GET", "ajax/mahasiswa.php?keyword=" + keyword.value, true);
  xhr.send();
});
