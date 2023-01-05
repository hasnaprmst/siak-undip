<?php

require_once("../db_login.php");
session_start();

$nim = $_SESSION['nim'];
$status_pkl = $_POST["status_pkl"];

// Periksa apakah data udah ada di db
$query = "SELECT * FROM pkl WHERE nim = $nim";
$result = $db->query($query);

if ($_POST['status_pkl'] == 'Belum Mengambil'){
  if ($result->num_rows > 0) {
    // Data udah ada, berarti update
    $query = "UPDATE pkl SET status_pkl = '$status_pkl', nilai = ' ' WHERE nim = $nim";
    $result = $db->query($query);
  
    echo '<script>alert("Data berhasil diupdate");</script>';
    echo '<script>window.location.href = "inputpkl.php";</script>';
  } else {
    // Data blm ada, berarti insert
    $nilai = $_POST["nilai"];
    $query = "INSERT INTO pkl (nim, status_pkl, nilai) VALUES ($nim, '$status_pkl', '$nilai')";
    $db->query($query);
  
    echo '<script>alert("Data berhasil ditambahkan");</script>';
    echo '<script>window.location.href = "inputpkl.php";</script>';
  }
} else {
  $ekstensi_diperbolehkan = array("svg", "png", "jpg", "pdf");
  $nama = $_SESSION['nim'] . "_" . 'PKL.pdf';
  $x = explode('.', $nama);
  $ekstensi = strtolower(end($x));
  $ukuran = $_FILES['file']['size'];
  $file_tmp = $_FILES['file']['tmp_name'];
  $nilai = $_POST["nilai"];

  if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
    if ($ukuran <= 1044070) {
      move_uploaded_file($file_tmp, "filepkl/".$nama);
      
      if ($result->num_rows > 0) {
        // Data udah ada, berarti update
        $query = "UPDATE pkl SET status_pkl = '$status_pkl', nilai = '$nilai', upload_file = '$nama' WHERE nim = $nim";
        $result = $db->query($query);
      
        echo '<script>alert("Data berhasil diupdate");</script>';
        echo '<script>window.location.href = "inputpkl.php";</script>';
      } else {
        // Data blm ada, berarti insert
        $query = "INSERT INTO pkl (nim, status_pkl, nilai, upload_file) VALUES ($nim, '$status_pkl', '$nilai', '$nama')";
        $db->query($query);
      
        echo '<script>alert("Data berhasil ditambahkan");</script>';
        echo '<script>window.location.href = "inputpkl.php";</script>';
      }
    } else{
      echo '<script>alert("UKURAN FILE TERLALU BESAR");</script>';
      echo '<script>window.location.href = "inputpkl.php";</script>';
    }
  } else{
    echo '<script>alert("EKSTENTSI FILE TIDAK SESUAI !!!! ");</script>';
    echo '<script>window.location.href = "inputpkl.php";</script>';
  }
}
?>