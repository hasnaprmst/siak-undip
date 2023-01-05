<?php
require_once('../db_login.php');

$angkatan = $_GET['angkatan'];

$query = "SELECT * FROM data_mahasiswa WHERE angkatan = $angkatan";
$result = $db->query($query);
if (!$result) {
    die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
}
$action = "progress_studi.php";

$i = 1;
while ($row = $result->fetch_object()) {
    echo '<tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">';
    echo '<td class="px-6 py-4 whitespace-nowrap">' . $i . '</td>';
    echo '<td class="px-6 py-4 whitespace-nowrap">' . $row->nama . '</td>';
    echo '<td class="px-6 py-4 whitespace-nowrap">' . $row->nim . '</td>';
    echo '<td class="px-6 py-4 whitespace-nowrap">' . $row->semester . '</td>';
    echo '<td class="px-6 py-4 whitespace-nowrap">' . $row->angkatan . '</td>';
    echo '<td class= "px-6 py-4 whitespace-nowrap">
            <a href="progress_studi.php" "class=font-medium text-green-600 dark:text-green-500 hover:underline">Lihat Detail</a>
        </td>';
    echo '<tr>';
    $i++;
}
?>