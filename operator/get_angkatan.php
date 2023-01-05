<?php
session_start();
require_once('../db_login.php');
$nip = $_SESSION['nip'];

$angkatan = $_GET['angkatan'];

$query1 = "SELECT * FROM data_mahasiswa as m, pkl, skripsi, verifikasi WHERE m.angkatan = $angkatan 
and m.nim = pkl.nim
and m.nim = skripsi.nim
and m.nim = verifikasi.nim";
$result = $db->query($query1);
if (!$result) {
    die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
}

$i = 1;
while ($row = $result->fetch_object()) {
    echo '<tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">';
    echo '<td class="px-6 py-4 whitespace-nowrap">' . $i . '</td>';
    echo '<td class="px-6 py-4 whitespace-nowrap">' . $row->nama . '</td>';
    echo '<td class="px-6 py-4 whitespace-nowrap">' . $row->nim . '</td>';
    echo '<td class="px-6 py-4 whitespace-nowrap">' . $row->angkatan . '</td>';
    echo '<td class="px-6 py-4 whitespace-nowrap">' . $row->status . '</td>';
    echo '<td class="px-6 py-4 whitespace-nowrap">' . $row->status_pkl . '</td>';
    echo '<td class="px-6 py-4 whitespace-nowrap">' . $row->status_skripsi . '</td>';
    echo '<td class="px-6 py-4 whitespace-nowrap">' . $row->status_verifikasi . '</td>';
    echo '<td class="py-4 px-6 space-x-4 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <a href="" type="button" data-modal-toggle="editModal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit  </a>
                    <a href="#" type="button" data-modal-toggle="detailModal" class="font-medium text-green-600 dark:text-green-500 hover:underline">Detail  </a>
                    <button class="font-medium text-red-600 dark:text-red-500 hover:underline" type="button" data-modal-toggle="deleteModal">Remove</button>
                  </td>'
                  ;

    
    $i++;
}
?>


