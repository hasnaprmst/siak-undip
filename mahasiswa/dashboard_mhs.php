<?php
session_start();

require_once('../db_login.php');

$nim = $_SESSION['nim'];

$query = "SELECT * FROM data_mahasiswa WHERE nim = $nim";
$result = $db->query($query);

$mahasiswa = $result->fetch_object();

$query = "SELECT * FROM skripsi WHERE nim = $nim";
$result = $db->query($query);

$skripsi = $result->fetch_object();

$query = "SELECT * FROM pkl WHERE nim = $nim";
$result = $db->query($query);

$pkl = $result->fetch_object();
?>

<!DOCTYPE html>
<html>
  <link rel="stylesheet" href="style.css" />
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css"
    />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  </head>
  <body>
    <!-- Navbar -->

    <!-- End of Navbar -->
    <div class="mb-10">
      <!-- Content -->
      <h1 class="text-4xl mx-20 my-8 mt-24">Dashboard Mahasiswa</h1>
      <form class="w-full">
        <div class="bg-white border shadow-xl mx-20 rounded-lg p-8">
          <div class="flex gap-12">
            <div>
              <img class="w-32 h-32 border-2 rounded-full" src="https://uwaterloo.ca/school-of-accounting-and-finance/sites/ca.school-of-accounting-and-finance/files/uploads/images/nishika_formal_square.jpg" alt="foto mahasiswa"></img>
            </div>

            <div class="w-full">
              <div>
                <label
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Nama Lengkap</label>
                <input value="<?= $mahasiswa->nama ?>" type="text" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
              </div>
              
              <div>
                <label
                class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >NIM</label>
                <input value=<?= $nim ?> type="text" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
              </div>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-12 gap-4 mx-20 mt-4">
          <div class="bg-white border shadow-xl rounded-lg p-8 col-span-6">
            <div class="text-2xl justify-center mb-6 text-center">Status PKL</div>
            <div>
            <h1 class="text-3xl justify-center text-center"><?= $pkl->status_pkl ?></h1>
            </div>
          </div>

          <div class="bg-white border shadow-xl rounded-lg p-8 col-span-6">
          <div class="text-2xl justify-center mb-6 text-center">Status Skripsi</div>
            <div>
            <h1 class="text-3xl justify-center text-center"><?= $skripsi->status_skripsi ?></h1>
            </div>
          </div>
          </div>
        </div>

        <div class="grid grid-cols-12 gap-4 mx-20 mt-4 mb-6">
          <div class="bg-white border shadow-xl rounded-lg p-8 col-span-3">
            <div class="text-2xl justify-center mb-6 text-center">Semester</div>
            <h1 class="text-3xl justify-center text-center"><?= $mahasiswa->semester ?></h1>
          </div>
          <div class="bg-white border shadow-xl rounded-lg p-8 col-span-3">
            <div class="text-2xl justify-center mb-6 text-center">Status</div>
            <h1 class="text-3xl justify-center text-center"><?= $mahasiswa->status ?></h1>
          </div>
          <div class="bg-white border shadow-xl rounded-lg p-8 col-span-3">
            <?php 
              require_once('../db_login.php');
              $query = "SELECT ROUND(AVG(nilai_ip), 2) AS jumlah FROM khs WHERE nim = $nim";
              $result = $db->query($query);
              $khs = $result->fetch_object();

              $nilai_ipk = $khs->jumlah;

            ?>
            <div class="text-2xl justify-center mb-6 text-center">IP Kumulatif</div>
            <h1 class="text-3xl justify-center text-center"><?= $nilai_ipk ?></h1>
          </div>
          <div class="bg-white border shadow-xl rounded-lg p-8 col-span-3">
            <?php 
            require_once('../db_login.php');
            $query = "SELECT SUM(jumlah_sks) AS jumlah FROM irs WHERE nim = $nim";
            $result = $db->query($query);
            $sks = $result->fetch_object();

            $total_sks = $sks->jumlah;

            ?>
            <div class="text-2xl justify-center mb-6 text-center">SKS Kumulatif</div>
            <h1 class="text-3xl justify-center text-center"><?= $total_sks ?></h1>
          </div>
        </div>

        
      </form>
      <!-- End of Content -->
    </div>
    <head>
    
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <!--<title>Sidebar Menu | Side Navigation Bar</title>-->
      <!-- CSS -->
      
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
          <span class="logo-name">Dashboard</span>
        </div>
        <div class="sidebar">
          <div class="logo">
            <i class="bx bx-menu menu-icon"></i>
            <span class="logo-name">Universitas Diponegoro</span>
          </div>
  
          <div class="sidebar-content">
            <ul class="lists">
              <li class="list">
                <a href="dashboard_mhs.php" class="nav-link">
                  <i class="bx bx-home-alt icon"></i>
                  <span class="link">Home</span>
                </a>
              </li>
              
              
              <li class="list">
                <a href="update_data.php" class="nav-link">
                  <i class="bx bx-spreadsheet icon" ></i>
                  <span class="link">Profil</span>
                </a>
              </li>
             
              <div class="list"> 
               <a href="inputirs.php" class="nav-link"> 
                  <i class="bx bx-pie-chart-alt-2 icon"></i>
                  <span class="link">Data IRS</span>  
                </a>
                </a>
               </div>
              <li class="list">
                <a href="inputkhs.php" class="nav-link">
                  <i class="bx bx-paste icon" ></i>
                  <span class="link">Data KHS</span>
                </a>
              </li>
              <li class="list">
                <a href="inputpkl.php" class="nav-link">
                  <i class="bx bx-folder-open icon"></i>
                  <span class="link">Data PKL</span>
                </a>
              </li>
            
            <li class="list">
              <a href="input_skripsi.php" class="nav-link">
                <i class="bx bx-folder-open icon"></i>
                <span class="link">Skripsi</span>
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