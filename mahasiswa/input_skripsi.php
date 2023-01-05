<?php
session_start();

require_once('../db_login.php');
// if (!isset($_SESSION['nim'])){
//   header('Location: ../login.php');
// }

$nim = $_SESSION['nim'];

$query = "SELECT * FROM data_mahasiswa WHERE nim = $nim";
$result = $db->query($query);

$mahasiswa = $result->fetch_object();

$query = "SELECT * FROM skripsi WHERE nim = $nim";
$result = $db->query($query);

$skripsi = $result->fetch_object();
?>

<!DOCTYPE html>
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
    
    <h1 class="text-4xl font-medium mt-24 mx-32 mb-2 my-8">Input Progress Skripsi</h1>
    <form class="grid grid-cols-12 gap-4 mx-28" method="POST" action="update_skripsi.php" enctype="multipart/form-data">
      <div class="p-5 col-span-8">
        <div class="bg-white shadow-md rounded-lg p-8">
          <div class="flex items-start gap-12">
            <div class="bg-white shadow-md rounded-lg flex justify-center items-center w-36 h-48">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-20 h-20">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
              </svg>
            </div>
            <div class="w-6/12">
              <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Lengkap</label>
                <input value="<?= $mahasiswa->nama ?>" type="text" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
              </div>
              <div>
                <label class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NIM</label>
                <input name="nim" value=<?= $nim ?> type="text" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
              </div>
              <div class="mb-2 w-full">
                  <label
                  class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                  >Status Skripsi</label
                  >
                  <select
                  id="status_skripsi" name="status_skripsi",
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  >
                  <option default>Pilih Status Skripsi</option>
                  <option <?= ($skripsi->status_skripsi == 'Lulus') ? 'selected' : '' ?> value="Lulus">Lulus</option>
                  <option <?= ($skripsi->status_skripsi == 'Tidak Lulus') ? 'selected' : '' ?> value="Tidak Lulus">Tidak Lulus</option>
                </select>
              </div>
              <div class="mb-2 w-full">
                <label
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Nilai Skripsi</label
                >
                <select
                  id="nilai" name="nilai",
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  >
                  <option default>Pilih Nilai Skripsi</option>
                  <option <?= ($skripsi->nilai == 'A') ? 'selected' : '' ?> value="A">A</option>
                  <option <?= ($skripsi->nilai == 'B') ? 'selected' : '' ?> value="B">B</option>
                  <option <?= ($skripsi->nilai == 'C') ? 'selected' : '' ?> value="C">C</option>
                  <option <?= ($skripsi->nilai == 'D') ? 'selected' : '' ?> value="D">D</option>
                  <option <?= ($skripsi->nilai == 'E') ? 'selected' : '' ?> value="E">E</option>
                </select>
              </div>
              <div class="mb-2 w-full">
                <label
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Lama Studi (semester)</label
                >
                <select
                  id="lama_studi" name="lama_studi",
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  >
                  <option default>Pilih Semester</option>
                  <option <?= ($skripsi->lama_studi == '6') ? 'selected' : '' ?> value="6">6</option>
                  <option <?= ($skripsi->lama_studi == '7') ? 'selected' : '' ?> value="7">7</option>
                  <option <?= ($skripsi->lama_studi == '8') ? 'selected' : '' ?> value="8">8</option>
                  <option <?= ($skripsi->lama_studi == '9') ? 'selected' : '' ?> value="9">9</option>
                  <option <?= ($skripsi->lama_studi == '10') ? 'selected' : '' ?> value="10">10</option>
                  <option <?= ($skripsi->lama_studi == '11') ? 'selected' : '' ?> value="11">11</option>
                  <option <?= ($skripsi->lama_studi == '12') ? 'selected' : '' ?> value="12">12</option>
                  <option <?= ($skripsi->lama_studi == '13') ? 'selected' : '' ?> value="13">13</option>
                  <option <?= ($skripsi->lama_studi == '14') ? 'selected' : '' ?> value="14">14</option>
                </select>
              </div>
              <div class="mb-2 w-full">
                  <label
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                  >Tanggal Sidang</label>
                  <input
                  type="date" id="tanggal_sidang" name="tanggal_sidang" value=<?= $skripsi->tanggal_sidang ?>
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  />
                  </select>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 col-span-4">
        <div class="bg-white shadow-md rounded-lg p-8">
          <h1 class="text-xl text-center font-medium mb-8">Upload Berita Acara Sidang Skripsi</h1>
          <div class="justify-center items-center w-full">
            <input id="upload-file" name="file" required class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">berita_acara_nim.pdf</p>
        </div>
        <div class="flex justify-end mt-8">
          <button type="submit"
            class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-12 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Save
          </button>
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
          <span class="logo-name">SIAK</span>
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