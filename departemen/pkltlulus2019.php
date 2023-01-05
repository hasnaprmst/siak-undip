<!DOCTYPE html>

<?php
require_once('../db_login.php');
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css"
    />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  </head>
  <body>
    <!-- Navbar -->
<br>

    <!-- End of Navbar -->
    <div class="">
      <h1 class="text-4xl mx-20 my-8 mt-24">Detail Mahasiswa PKL (Tidak Lulus)</h1>
      <div class="overflow-x-auto mx-20 relative shadow-md sm:rounded-lg"><br><br>
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <table id= "table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="py-3 px-6">
                          No
                      </th>
                      <th scope="col" class="py-3 px-6">
                          Nama Mahasiswa
                      </th>
                      <th scope="col" class="py-3 px-6">
                          NIM
                      </th>
                      <th scope="col" class="py-3 px-6">
                          Angkatan
                      </th>
                      <th scope="col" class="py-3 px-6">
                          Semester
                      </th>
                      <th scope="col" class="py-3 px-6">
                          Nilai PKL
                      </th>
                      
                  </tr>
              </thead>
              <tbody>
                <!-- ambil data dari database -->
                <?php

                $sql = "SELECT * FROM data_mahasiswa as m, pkl
                WHERE m.nim = pkl.nim AND pkl.status_pkl = 'Tidak Lulus' AND pkl.angkatan = '2019' ORDER BY m.nim ASC";
                $result = $db->query($sql);
                $nomor = 0;

                // $sql1 = "SELECT * FROM skripsi";

                // $result1 = $db->query($sql1);
                if(!$result){
                die("Invalid query: " . $db->error);
                }
                ?>
                <!-- udah ambil data -->
        
                <?php 
                  while(($row = $result->fetch_assoc())){
                    $nomor++;
                    echo "<tr> 
                    <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>".$nomor. "</td>
                      <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>".$row["nama"]. "</td>
                      <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>".$row["nim"]. "</td>
                      <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>".$row["angkatan"]. "</td>
                      <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>".$row["semester"]. "</td>
                      <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>".$row["nilai"]. "</td>
                      </td>
                    </tr>";
                  }
                  

                  ?>
              </tbody>
          </table>

  <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <!--<title>Sidebar Menu | Side Navigation Bar</title>-->
     <!-- CSS -->
     <link rel="stylesheet" href="style.css" />
     <!-- Boxicons CSS -->
     <link
       href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
       rel="stylesheet"
     />
   </head>
   <body>
   <nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">Data Mahasiswa PKL</span>
      </div>
      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
          <span class="logo-name">Universitas Diponegoro</span>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
              <a href="dashboard_dept.php" class="nav-link">
                <i class="bx bx-home-alt icon"></i>
                <span class="link">Home</span>
              </a>
            </li>
            
            <li class="list">
              <a href="data_dosen.php" class="nav-link">
                <i class="bx bx-spreadsheet icon" ></i>
                <span class="link">Data Dosen</span>
              </a>
            </li>

            <li class="list">
              <a href="data_skripsi.php" class="nav-link">
                <i class="bx bx-spreadsheet icon" ></i>
                <span class="link">Data Mahasiswa Skripsi</span>
              </a>
            </li>
           
            <div class="list"> 
             <a href="data_pkl.php" class="nav-link">
                <i class="bx bx-pie-chart-alt-2 icon"></i>
                <span class="link">Data Mahasiswa PKL</span>  
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
              <a href="rekap_data.php" class="nav-link">
                <i class="bx bx-folder-open icon"></i>
                <span class="link">Rekap Data Mahasiswa</span>
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
    <script>
      $(document).ready(function() {
        $('#table').DataTable();
      });
    </script>
  </body>

   <br></br>
   <div class="flex w-full justify-start mx-20 mt2">

    <a href = "pkllulus2019.php">
     <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 p-4 rounded-full mr-2">
      
      Lulus
    </button></a>
   
   </body>
   <a href = "pkltlulus2019.php">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 p-4  rounded-full ml-2">
     
     Tidak Lulus
   </button></a>
   
   <a href = "pklbm2019.php">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 p-4  rounded-full ml-2">
     
     Belum Mengambil
   </button></a>

  </body>
   

  </body>
 </div>
 
  </html>