<?php
require_once('../db_login.php');

$email = $_POST['email'];
$nomor_hp = $_POST['nomor_hp'];
$doswal = $_POST['doswal'];
$alamat = $_POST['alamat'];
$provinsi = $_POST['provinsi'];
$kabupaten_kota = $_POST['kabupaten_kota'];
$nim = $_POST['nim'];

$query = "SELECT * FROM data_mahasiswa WHERE nim = $nim";
$result = $db->query($query);
if ($result->num_rows > 0) {
    $query = "UPDATE data_mahasiswa SET email = '$email', nomor_hp = '$nomor_hp', doswal = '$doswal', alamat = '$alamat', provinsi = '$provinsi', kabupaten_kota = '$kabupaten_kota' WHERE nim = $nim";
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
    }
    echo '<script>alert("Data berhasil diupdate");</script>';
    echo '<script>window.location.href = "update_data.php";</script>';
} else {
    $query = "INSERT INTO data_mahasiswa (email, nomor_hp, doswal, alamat, provinsi, kabupaten_kota) VALUES ('$email', '$nomor_hp', '$doswal', '$alamat', '$provinsi', '$kabupaten_kota')";
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
    }
    echo '<script>alert("Data berhasil ditambahkan");</script>';
    echo '<script>window.location.href = "update_data.php";</script>';
}

if (!$result) {
    die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
}
?>