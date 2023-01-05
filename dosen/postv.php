<?php
require_once('../db_login.php');

$status_verifikasi = $_POST['status_verifikasi'];
$nim = $_POST['nim'];

$query = "SELECT * FROM verifikasi WHERE nim = $nim";
$result = $db->query($query);
if ($result->num_rows > 0) {
    $query = "UPDATE verifikasi SET status_verifikasi = '$status_verifikasi' WHERE nim = $nim";
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
    }
    echo '<script>alert("Data berhasil diupdate");</script>';
    echo '<script>window.location.href = "verifikasi_data.php";</script>';
}

if (!$result) {
    die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
}
?>