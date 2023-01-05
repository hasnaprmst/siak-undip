<!DOCTYPE html>
<?php
session_start();
require_once('../db_login.php');
$nim = $_GET['nim'];

$query = "SELECT * FROM data_mahasiswa WHERE nim = $nim";
$result = $db->query($query);

$mahasiswa = $result->fetch_object();
?>
<html>
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

    <!-- End of Navbar -->
    <div class="flex flex-col max-w-4xl mx-auto mt-16">
      <!-- Content -->
      <br>
      <br>
      <br>
      <form class="w-full">
        <h1 class="text-3xl font-medium mb-8">Detail Data Mahasiswa</h1>
        <div class="bg-white shadow-md rounded-lg p-8 border">
            <div class="flex items-start gap-12">
            <div
                class="bg-white shadow-md rounded-lg flex justify-center items-center w-36 h-48"
            >
                <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-20 h-20"
                >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                />
                </svg>
            </div>
            <div class="w-6/12">
                  <!-- ambil data dari database -->
                  <?php
                  $sql = "SELECT * FROM data_mahasiswa WHERE $nim=nim";
                  $pkl = "SELECT * FROM pkl WHERE $nim=nim";
                  $irs = "SELECT * FROM irs WHERE $nim=nim";
                  $fileirs = "SELECT * FROM data_mahasiswa as m, irs 
                  where m.nim=irs.nim and m.nim='$nim'
                  and irs.semester_irs=m.semester";

                  $filekhs = "SELECT * FROM data_mahasiswa as m, khs 
                  where m.nim=khs.nim and m.nim='$nim'
                  and khs.semester_khs=m.semester-1";

                  $skripsi = "SELECT * FROM skripsi WHERE $nim=nim";
                  
                  $result = $db->query($sql);
                  $resultpkl = $db->query($pkl);
                  $resultirs = $db->query($irs);
                  $resultfileirs = $db->query($fileirs);
                  $resultfilekhs = $db->query($filekhs);
                  $resultskripsi = $db->query($skripsi);

                  $nomor = 0;
                  $row = $result->fetch_assoc();
                  $row2 = $resultpkl->fetch_assoc();
                  $row3 = $resultfileirs->fetch_assoc();
                  $row4 = $resultfilekhs->fetch_assoc();
                  $row5 = $resultskripsi->fetch_assoc();

                  if(!$result){
                  die("Invalid query: " . $db->error);
                  }
                  ?>
                <div class="mb-6">
                <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >Nama</label
                >
                <input
                    type="text" name="nama" readonly value="<?php echo $row['nama']; ?>"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                />
                </div>
                <div class="flex gap-4 mb-6">
                <div class="mb-6 w-6/12">
                    <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >NIM</label
                    >
                    <input
                    type="text" name="nim" readonly value="<?php echo $row['nim']; ?>"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    />
                </div>
                <div class="mb-6 w-6/12">
                    <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >Semester</label
                    >
                    <input
                    type="text" name="semester" readonly value="<?php echo $row['semester']; ?>"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    />
                </div>
                </div>
                <div class="flex gap-4 mb-6">
                <div class="bg-slate-100 shadow-md rounded-lg flex justify-center items-center w-56 h-10">
                    <!-- <a href="datairs.php?nim=<?php echo $row['nim']; ?>" class="btn btn-primary">IRS</a> -->
                    <a href="../mahasiswa/fileirs/<?php echo $row3['upload_file'];?>" class="btn btn-primary">IRS</a>
                </div>
                <div class="bg-slate-100 shadow-md rounded-lg flex justify-center items-center w-56 h-10">
                    <a href="../mahasiswa/filepkl/<?php echo $row2['upload_file']; ?>" class="btn btn-primary">PKL</a>
                </div>
                </div>
                <div class="flex gap-4 mb-6">
                <div class="bg-slate-100 shadow-md rounded-lg flex justify-center items-center w-56 h-10">
                  <a href="../mahasiswa/filekhs/<?php echo $row4['upload_file']; ?>" class="btn btn-primary">KHS</a>
                </div>
                <div class="bg-slate-100 shadow-md rounded-lg flex justify-center items-center w-56 h-10">
                  <a href="../mahasiswa/fileskripsi/<?php echo $row5['upload_file']; ?>" class="btn btn-primary">Skripsi</a>
                </div>
                </div>
            </div>
            </div>
        </div>
      </form>
      <!-- End of Content -->
    </div>

    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
  </body>
</html>