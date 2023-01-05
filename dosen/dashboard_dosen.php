<?php 
session_start();
require_once('../db_login.php');

$nip = $_SESSION['nip'];

$query = "SELECT * FROM data_dosen WHERE nip = $nip";
$result = $db->query($query);

$dosen = $result->fetch_object();
?>
<!DOCTYPE html>
<html>
  <link rel="stylesheet" href="style.css" />
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="card.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css"
    />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  </head>
  <body>
    <!-- Navbar -->

    <!-- End of Navbar -->
    <div class="">
      <!-- Content -->
      <h1 class="text-4xl mx-20 my-8 mt-24">Dashboard Dosen Wali</h1>
      <form class="w-full">
        <div class="grid grid-cols-12 gap-4 mx-20 mt-4">
          <div class="bg-white border shadow-xl rounded-lg p-8 col-span-7">
            <div class="flex w-full justify-center items-center">
              <img class="object-center w-32 h-32 border-2 rounded-full" src="https://www.digicatapult.org.uk/wp-content/uploads/2021/11/DC_square_People_juergen-600x600-c-default.jpg" alt="foto dosen wali">
            </div>

            <div class="w-full">
              <div>
                <label
                class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Nama Lengkap</label>
                <input value="<?= $dosen->nama_dosen ?>" type="text" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
              </div>
              <div>
                <label
                class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-gray-300"
                >NIP</label>
                <input value="<?= $dosen->nip ?>" type="text" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
              </div>
            </div>

          </div>

          <div class="bg-white border shadow-xl rounded-lg p-8 col-span-5">
            <div>
              <a href="data_pkl.php" type="button" data-modal-toggle="addModal" class="flex justify-center mb-2 text-white bg-blue-500 hover:bg-blue-800 font-medium rounded-lg text-sm px-12 py-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Data Mahasiswa PKL</a>
              <a href="data_skripsi.php" type="button" data-modal-toggle="addModal" class="flex justify-center mb-2 text-white bg-blue-500 hover:bg-blue-800 font-medium rounded-lg text-sm px-12 py-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Data Mahasiswa Skripsi</a>
              <a href="data_mahasiswa.php" type="button" data-modal-toggle="addModal" class="flex justify-center mb-2 text-white bg-blue-500 hover:bg-blue-800 font-medium rounded-lg text-sm px-12 py-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Data Mahasiswa</a>
              <a href="verifikasi_data.php" type="button" data-modal-toggle="addModal" class="flex justify-center mb-2 text-white bg-blue-500 hover:bg-blue-800 font-medium rounded-lg text-sm px-12 py-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Verifikasi</a>
              <a href="progress.php" type="button" data-modal-toggle="addModal" class="flex justify-center mb-2 text-white bg-blue-500 hover:bg-blue-800 font-medium rounded-lg text-sm px-12 py-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Progres Studi Mahasiswa</a>
            </div>
          </div>
        
        </div>

        <div class="grid grid-cols-12 gap-4 mx-20 mt-4">
          <div class="bg-white border shadow-xl rounded-lg p-8 col-span-6">
            <div class="text-2xl justify-center mb-6 text-center">Mahasiswa Lulus PKL</div>
            <canvas id="grafikMahasiswaLulusPKL"></canvas>
            <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <?php
            require_once('../db_login.php');
            $query = "SELECT angkatan, COUNT(nim) as jml FROM pkl GROUP BY angkatan";
            $result = $db->query($query);

            $pklangkatan2017 = $result->fetch_object()->jml;
            $pklangkatan2018 = $result->fetch_object()->jml;
            $pklangkatan2019 = $result->fetch_object()->jml;
            $pklangkatan2020 = $result->fetch_object()->jml;
            $pklangkatan2021 = $result->fetch_object()->jml;
            $pklangkatan2022 = $result->fetch_object()->jml;

            ?>
            <script>
              const ctx = document.getElementById("grafikMahasiswaLulusPKL");
              const myChart = new Chart(ctx, {
                type: "bar",
                data: {
                  labels: ["2022", "2021", "2020", "2019", "2018", "2017"],
                  datasets: [
                    {
                      label: "# of Votes",
                      data: [<?= $pklangkatan2022 ?>, <?= $pklangkatan2021 ?>, <?= $pklangkatan2020 ?>, <?= $pklangkatan2019 ?>, <?= $pklangkatan2018 ?>, <?= $pklangkatan2017 ?>],
                      backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 206, 86, 0.2)",
                        "rgba(75, 192, 192, 0.2)",
                        "rgba(153, 102, 255, 0.2)",
                        "rgba(255, 159, 64, 0.2)",
                      ],
                      borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 159, 64, 1)",
                      ],
                      borderWidth: 1,
                    },
                  ],
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true,
                    },
                  },
                },
              });
            </script>

          </div>

          <div class="bg-white border shadow-xl rounded-lg p-8 col-span-6">
            <div class="text-2xl justify-center mb-6 text-center">Mahasiswa Lulus Skripsi</div>
            <canvas id="grafikMahasiswaSkripsi"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <?php
            require_once('../db_login.php');
            $query = "SELECT angkatan, COUNT(nim) as jumlah FROM skripsi GROUP BY angkatan";
            $result = $db->query($query);

            $angkatan2017 = $result->fetch_object()->jumlah;
            $angkatan2018 = $result->fetch_object()->jumlah;
            $angkatan2019 = $result->fetch_object()->jumlah;
            $angkatan2020 = $result->fetch_object()->jumlah;
            $angkatan2021 = $result->fetch_object()->jumlah;
            $angkatan2022 = $result->fetch_object()->jumlah;

            ?>
            <script>
              const ctxx = document.getElementById("grafikMahasiswaSkripsi");
              const myChartskripsi = new Chart(ctxx, {
                type: "bar",
                data: {
                  labels: ["2022", "2021", "2020", "2019", "2018", "2017"],
                  datasets: [
                    {
                      label: "# of Votes",
                      data: [<?= $angkatan2022 ?>, <?= $angkatan2021 ?>, <?= $angkatan2020 ?>, <?= $angkatan2019 ?>, <?= $angkatan2018 ?>, <?= $angkatan2017 ?>],
                      backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 206, 86, 0.2)",
                        "rgba(75, 192, 192, 0.2)",
                        "rgba(153, 102, 255, 0.2)",
                        "rgba(255, 159, 64, 0.2)",
                      ],
                      borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 159, 64, 1)",
                      ],
                      borderWidth: 1,
                    },
                  ],
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true,
                    },
                  },
                },
              });
            </script>
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
          <span class="logo-name">Dashboard Dosen</span>
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

    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
  </body>
</html>