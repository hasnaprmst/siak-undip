<!DOCTYPE html>

<?php
require_once('../db_login.php');
session_start();
?>

<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <!-- TAMBAH -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script>
      $(document).ready(function() {
        $('#table').DataTable();
      });
  </script>
</head>

<body>
  <!-- Navbar -->
  <head>
   
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
        <span class="logo-name">Rekap Data Mahasiswa</span>
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
                <span class="link">Progres Studi Mahasiswa</span>
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
  </body>
  <!-- End of Navbar -->
  <div class="">
    <!-- Content -->
    <link rel="stylesheet" href="font.css" />
    <h1 class="text-4xl font-medium mx-32 mb-2 my-20">Rekap Data Mahasiswa</h1>
    <div class="w-96 justify-center flex items-center mx-auto space-x-1">
      <!-- <a href="#" class="px-1 py-2 font-bold text-gray-500 hover:bg-blue-400 hover:text-white">
          <
      </a>
      <a href="#" class="px-1 py-2 text-gray-700 hover:bg-blue-400 hover:text-white">
          2022
      </a>
      <a href="#" class="px-1 py-2 text-gray-700 hover:bg-blue-400 hover:text-white">
          2021
      </a>
      <a href="#" class="px-1 py-2 text-gray-700 hover:bg-blue-400 hover:text-white">
          2020
      </a>
      <a href="#" class="px-1 py-2 text-gray-700 hover:bg-blue-400 hover:text-white">
          2019
      </a>
      <a href="#" class="px-1 py-2 font-bold text-gray-500 hover:bg-blue-400 hover:text-white">
          >
      </a> -->
  </div>
    </div>
    <head> 
    <?php
    require_once('../db_login.php');
    $query = "SELECT status, COUNT(status) as aktif FROM data_mahasiswa GROUP BY status";
    $result = $db->query($query);

    $AKTIF = $result->fetch_object()->aktif;
    $CUTI = $result->fetch_object()->aktif;
    $DO = $result->fetch_object()->aktif;
    $MANGKIR = $result->fetch_object()->aktif;
    $LULUS = $result->fetch_object()->aktif;
    $UNDURDIRI = $result->fetch_object()->aktif;


    ?>
    <form class="grid grid-cols-12 gap-4 mx-27">
      <div class="p-5 col-span-5">
        <div class="bg-white shadow-md rounded-lg p-8">
          <div class="grid grid-cols-3 gap-12">
            <div class="bg-slate-200 shadow-md rounded-lg flex flex-col justify-center  items-center w-36 h-48 p-2">
              <h1 class="text-lg font-semibold">Aktif</h1>
              <h2 class="text-5xl font-bold my-4"><?= $AKTIF?></h2>
            </div>
            <div class="bg-slate-200 shadow-md rounded-lg flex flex-col justify-center items-center w-36 h-48 p-2">
              <h1 class="text-lg font-semibold">Cuti</h1>
              <h2 class="text-5xl font-bold my-4"><?= $CUTI?></h2>
            </div>
            <div class="bg-slate-200 shadow-md rounded-lg flex flex-col justify-center items-center w-36 h-48 p-2">
              <h1 class="text-lg font-semibold">DO</h1>
              <h2 class="text-5xl font-bold my-4"><?= $DO?></h2>
            </div>
            <div class="bg-slate-200 shadow-md rounded-lg flex flex-col justify-center items-center w-36 h-48 p-2">
              <h1 class="text-lg font-semibold">Mangkir</h1>
              <h2 class="text-5xl font-bold my-4"><?= $MANGKIR?></h2>
            </div>
            <div class="bg-slate-200 shadow-md rounded-lg flex flex-col justify-center items-center w-36 h-48 p-2">
              <h1 class="text-lg font-semibold">Lulus</h1>
              <h2 class="text-5xl font-bold my-4"><?= $LULUS?></h2>
            </div>
            <div class="bg-slate-200 shadow-md rounded-lg flex flex-col justify-center items-center w-36 h-48 p-2">
              <h1 class="text-lg font-semibold">Meninggal</h1>
              <h2 class="text-5xl font-bold my-4"><?= $UNDURDIRI?></h2>
            </div>
            
          </div>
        </div>
      </div>

      <div class="p-5 col-span-7">
        <div class="flex flex-col">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
              <div class="overflow-hidden">
                <table id="table" class="min-w-full">
                  <thead class="bg-white border-b">
                    <tr>
                      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        No
                      </th>
                      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Nama
                      </th>
                      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        NIM
                      </th>
                      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Semester
                      </th>
                      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Angkatan
                      </th>

                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $query_param = $_SERVER["QUERY_STRING"];
                  $sql = "";
                  if ($query_param) {
                    $name = strtolower(explode("=", $query_param)[1]);
                    $sql = "SELECT * FROM data_mahasiswa WHERE LOWER(nama) LIKE '%$name%'";
                  } else {
                    $sql = "SELECT * FROM data_mahasiswa";
                  }

                  $result = $db->query($sql);

                  if (!$result) {
                    die("Invalid query: " . $db->error);
                  }
                  ?>
                  <!-- udah ambil data -->


                  <?php
                  $no = 1;
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr> 
                          <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>" . $no . "</td>
                          <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>" . $row["nama"] . "</td>
                          <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>" . $row["nim"] . "</td>
                          <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>" . $row["semester"] . "</td>
                          <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>" . $row["angkatan"] . "</td>
                          </tr>";
                    $no = $no + 1;
                  }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End of Content -->
  </div>
  <script>
      $(document).ready(function() {
        $('#table').DataTable();
      });
    </script>
  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
</body>

</html>