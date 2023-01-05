<?php

require_once("../db_login.php");
session_start();

$nim = $_SESSION['nim'];
$status_skripsi = $_POST["status_skripsi"];
$nilai = $_POST["nilai"];
$lama_studi = $_POST["lama_studi"];
$tanggal_sidang = $_POST["tanggal_sidang"];

$ekstensi_diperbolehkan = array("svg", "png", "jpg", "pdf");
$nama = $_SESSION['nim'] . "_" . 'Skripsi.pdf';
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];

// Periksa apakah data udah ada di db
$query = "SELECT * FROM skripsi WHERE nim = $nim";
$result = $db->query($query);

if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
  if ($ukuran <= 1044070) {
    move_uploaded_file($file_tmp, "fileskripsi/".$nama);
    
    if ($result->num_rows > 0) {
      // Data udah ada, berarti update
      $query = "UPDATE skripsi SET status_skripsi = '$status_skripsi', nilai = '$nilai', lama_studi = '$lama_studi', tanggal_sidang = '$tanggal_sidang', upload_file = '$nama' WHERE nim = $nim";
      $result = $db->query($query);
    
      echo '<script>alert("Data berhasil diupdate");</script>';
      echo '<script>window.location.href = "input_skripsi.php";</script>';
    } else {
      // Data blm ada, berarti insert
      $query = "INSERT INTO skripsi (nim, status_skripsi, nilai, lama_studi, tanggal_sidang, upload_file) VALUES ($nim, '$status_skripsi', '$nilai', '$lama_studi', '$tanggal_sidang', '$nama')";
      $db->query($query);
    
      echo '<script>alert("Data berhasil ditambahkan");</script>';
      echo '<script>window.location.href = "input_skripsi.php";</script>';
    }
  } else{
    echo '<script>alert("UKURAN FILE TERLALU BESAR");</script>';
    echo '<script>window.location.href = "input_skripsi.php";</script>';
  }
} else{
  echo '<script>alert("EKSTENTSI FILE TIDAK SESUAI !!!! ");</script>';
  echo '<script>window.location.href = "input_skripsi.php";</script>';
}
?>