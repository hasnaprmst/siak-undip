<!DOCTYPE html>

<?php
session_start();
require_once('../db_login.php');
$nim = $_GET['nim'];

$query = "SELECT * FROM data_mahasiswa WHERE nim = $nim";
$result = $db->query($query);

$dosen = $result->fetch_object();
?>
<html>
<link rel="stylesheet" href="style.css" />

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>

<body>
  <!-- Navbar -->

  <!-- End of Navbar -->
  <div class="">
    <!-- Content -->
    <h1 class="text-4xl mx-20 my-8 mt-24">Data IRS Mahasiswa</h1>
    
    <div class="overflow-x-auto mx-20 relative shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="py-3 px-6">
              Semester
            </th>
            <th scope="col" class="py-3 px-6">
              Jumlah SKS
            </th>
            <th scope="col" class="py-3 px-6">
              Lihat File
            </th>

          </tr>
        </thead>
        <tbody>

          <?php
            require_once ("../db_login.php");
            $query="SELECT * FROM irs, data_mahasiswa as m WHERE 
            $nim = m.nim and
            m.nim = irs.nim ";
            //balikin nim 
            $result= $db->query($query);

            while ($row = $result->fetch_object()){
              echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">';
              echo ' <td class="py-4 px-6"> '.$row->semester_irs.' </td>';
              echo ' <td class="py-4 px-6"> '.$row->jumlah_sks.' </td>';
              
              echo '<td class="py-4 px-6"><a href="../mahasiswa/fileirs/'.$row->upload_file.'" class="font-medium text-green-600 dark:text-green-500 hover:underline">Lihat File</a></td>';
            
              echo '</td>';
              //href=""
            }

          ?>
          
        </tbody>
      </table>


      

    </div>

    <!-- End of Content -->
  </div>

  <head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--<title>Sidebar Menu | Side Navigation Bar</title>-->
    <!-- CSS -->

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
  </head>

  <body>
  <nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">Data Mahasiswa</span>
      </div>
      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
          <span class="logo-name">Universitas Diponegoro</span>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
              <a href="dashboard_dosen.php" class="nav-link">
                <i class="bx bx-home-alt icon"></i>
                <span class="link">Home</span>
              </a>
            </li>
            
            
            <li class="list">
              <a href="data_mahasiswa.php" class="nav-link">
                <i class="bx bx-spreadsheet icon" ></i>
                <span class="link">Data Mahasiswa </span>
              </a>
            </li>
          
            <div class="list"> 
            <a href="verifikasi_data.php" class="nav-link"> 
                <i class="bx bx-pie-chart-alt-2 icon"></i>
                <span class="link">Verifikasi</span>  
              </a>
              </a>
            </div>
            <li class="list">
              <a href="progress.php" class="nav-link">
                <i class="bx bx-paste icon" ></i>
                <span class="link">Progress Studi Mahasiswa</span>
              </a>
            </li>
            <li class="list">
              <a href="data_pkl.php" class="nav-link">
                <i class="bx bx-folder-open icon"></i>
                <span class="link">Data Mahasiswa PKL</span>
              </a>
            </li>
            <li class="list">
              <a href="data_skripsi.php" class="nav-link">
                <i class="bx bx-folder-open icon"></i>
                <span class="link">Data Mahasiswa Skripsi</span>
              </a>
            </li>
          </ul>

          <div class="bottom-cotent">
            <li class="list">
              <a href="../logout.php" class="nav-link">
                <i class="bx bx-log-out icon"></i>
                <span class="link">Logout</span>
              </a>
            </li>
          </div>
        </div>
      </div>
    </nav>

    <section class="overlay"></section>

    <script>
      const navBar = document.querySelector("nav"),
        menuBtns = document.querySelectorAll(".menu-icon"),
        overlay = document.querySelector(".overlay");

      menuBtns.forEach((menuBtn) => {
        menuBtn.addEventListener("click", () => {
          navBar.classList.toggle("open");
        });
      });

      overlay.addEventListener("click", () => {
        navBar.classList.remove("open");
      });
    </script>
  </body>

  <head>

    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
</body>

</html>