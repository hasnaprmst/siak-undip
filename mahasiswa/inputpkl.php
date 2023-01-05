<!DOCTYPE html>
<?php
session_start();
require_once('../db_login.php');
$nim = $_SESSION['nim'];

$query = "SELECT * FROM data_mahasiswa WHERE nim = $nim";
$result = $db->query($query);

$mahasiswa = $result->fetch_object();

$query = "SELECT * FROM pkl WHERE nim = $nim";
$result = $db->query($query);

$status = $result->fetch_object();

?>
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
 
    <!-- End of Navbar -->
    <div class="">
      <!-- Content -->
      <h1 class="text-4xl mx-20 my-8 mt-20">Input Progress PKL</h1>
      <form method="POST" action="update_pkl.php" enctype="multipart/form-data" class="w-full">
        <div class="grid grid-cols-12 gap-4 mx-20 my-8">
            <div class="bg-white border shadow-xl rounded-lg p-8 col-span-8">
                <div class="flex gap-12">
                    <div>
                        <div  class="w-32 h-32 rounded-full bg-gray-500"></div>
                    </div>
                    <div class="w-full">
                      <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Lengkap</label>
                        <input value="<?= $mahasiswa->nama ?>" type="text" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                      </div>
                      <div>
                        <label class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NIM</label>
                        <input name="nim" value=<?= $nim ?> type="text" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                      </div>
                      <div class="">
                          <label
                            class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                            >Status PKL</label>
                          <select
                            id='status_pkl'
                            name="status_pkl",
                            class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option default>Pilih Status PKL</option>
                            <option <?= ($status->status_pkl == 'Belum Mengambil') ? 'selected' : '' ?>  value="Belum Mengambil">Belum Mengambil</option>
                            <option <?= ($status->status_pkl == 'Lulus') ? 'selected' : '' ?> value="Lulus">Lulus</option>
                            <option <?= ($status->status_pkl == 'Tidak Lulus') ? 'selected' : '' ?> value="Tidak Lulus">Tidak Lulus</option>
                          </select>
                        </div>
                      <div class="">
                          <label
                            class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                            >Nilai PKL</label>
                          <select
                              id='nilai'
                              name="nilai",
                              class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                              <option default>Pilih Nilai PKL</option>
                              <option <?= ($status->nilai == 'A') ? 'selected' : '' ?> value="A">A</option>
                              <option <?= ($status->nilai == 'B') ? 'selected' : '' ?> value="B">B</option>
                              <option <?= ($status->nilai == 'C') ? 'selected' : '' ?> value="C">C</option>
                              <option <?= ($status->nilai == 'D') ? 'selected' : '' ?> value="D">D</option>
                              <option <?= ($status->nilai == 'E') ? 'selected' : '' ?> value="E">E</option>
                            </select>
                      </div>
                          <div class="justify-center items-center w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Upload Berita Acara PKL</label>
                            <input id="upload-file" name="file" required class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">berita_acara_nim.pdf</p>
                          </div>
                        </div>
                </div>
            </div>
            <div class="col-span-4">
                <div class="bg-white border shadow-md rounded-lg p-14">
                    <div class="text-2xl justify-center mb-6 text-center">Nilai PKL</div>
                    <h1 class="text-7xl justify-center text-center"><?= $status->nilai ?></h1>
                </div>
                <div class="flex justify-center mt-8">
                    <button
                      type="submit"
                      class="mb-6 text-white bg-blue-500 hover:bg-blue-800 font-medium rounded-lg text-sm px-12 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                      Save</button>
                </div>
            </div>
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
              <a href="inputkhs.php" class="nav-link">
                <i class="bx bx-pie-chart-alt-2 icon"></i>
                <span class="link">Data KHS</span>
              </a>
              </a>
            </div>
            <li class="list">
              <a href="inputirs.php" class="nav-link">
                <i class="bx bx-paste icon"></i>
                <span class="link">Data IRS</span>
              </a>
            </li>
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

        const status = document.getElementById('status_pkl');
        function refreshFormState() {
          if (status.selectedIndex == 1) {
            document.getElementById('nilai').disabled = true;
            document.getElementById('upload-file').disabled = true;
          } else {
            document.getElementById('nilai').disabled = false;
            document.getElementById('upload-file').disabled = false;
          }
        }
        status.addEventListener('change', refreshFormState);
        refreshFormState();
      </script>
    </body>
    <head>

    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
  </body>
</html>