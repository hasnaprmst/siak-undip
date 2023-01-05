<?php
session_start();
require_once('../db_login.php');

$nip = $_SESSION['nip'];

$query = "SELECT * FROM data_operator WHERE nip = $nip";
$result = $db->query($query);

$operator = $result->fetch_object();

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
    <!--<title>Sidebar Menu | Side Navigation Bar</title>-->
    <!-- CSS -->
    
    <!-- Boxicons CSS -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet" />
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
              <a href="dashboard_op.php" class="nav-link">
                <i class="bx bx-home-alt icon"></i>
                <span class="link">Home</span>
              </a>
            </li>
            
            <div class="list"> 
             <a href="data_mahasiswa.php" class="nav-link"> 
                <i class="bx bx-pie-chart-alt-2 icon"></i>
                <span class="link">Manajemen Data Mahasiswa </span>  
              </a>
              </a>
             </div>
            <li class="list">
              <a href="data_dosen.php" class="nav-link">
                <i class="bx bx-paste icon" ></i>
                <span class="link">Menejemen Data Dosen</span>
              </a>
            </li>

            <li class="list">
                <a href="input_data.php" class="nav-link">
                  <i class="bx bx-folder-open icon"></i>
                  <span class="link">Input Data Mahasiswa</span>
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

    <!-- End of Navbar -->
    <!-- test -->
    <div class="">
      <!-- Content -->
      <h1 class="text-4xl mx-20 my-8 mt-24">Dashboard Operator</h1>
      <form class="w-full">
        <div class="grid grid-cols-12 gap-4 mx-20 mt-4">
          <div class="bg-white border shadow-xl rounded-lg p-8 col-span-7">
            <div class="flex w-full justify-center items-center">
              <img class="object-center w-32 h-32 border-2 rounded-full" src="http://archdesign.utk.edu/wp-content/uploads/2022/03/AuthorHeadshotHiResSquare.jpg" alt="foto operator">
            </div>

            <div class="w-full">
              <div>
                <label
                class="block mb-2 mt-6 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Nama Lengkap</label>
                <input value="<?= $operator->nama ?>"type="text" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
              </div>
              <div>
                <label
                class="block mb-2 mt-6 text-sm font-medium text-gray-900 dark:text-gray-300"
                >NIP</label>
                <input value="<?= $operator->nip ?>" type="text" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
              </div>
            </div>

          </div>

          <div class="bg-white border shadow-xl rounded-lg p-6 col-span-5">
            <div class="text-2xl justify-center mb-6 text-center">Data Mahasiswa</div>
            <?php 
            require_once('../db_login.php');
            $query = "SELECT status, COUNT(*) AS jumlah FROM data_mahasiswa GROUP BY status";
            $result = $db->query($query);

            $AKTIF = $result->fetch_object()->jumlah;
            $CUTI = $result->fetch_object()->jumlah;
            $MANGKIR = $result->fetch_object()->jumlah;
            $MENINGGALDUNIA = $result->fetch_object()->jumlah;
            $LULUS = $result->fetch_object()->jumlah;
            $UNDURDIRI = $result->fetch_object()->jumlah;
            $DO = $result->fetch_object()->jumlah;
            ?>
            <div>
              <div id="piechart"></div>
  
              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

              <script type="text/javascript">
                // Load google charts
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                
                // Draw the chart and set the chart values
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                  ['Status', 'Keterangan'],
                  ['Aktif', <?= $AKTIF ?>],
                  ['Cuti', <?= $CUTI ?>],
                  ['Mangkir', <?= $MANGKIR ?>],
                  ['Meninggal Dunia', <?= $MENINGGALDUNIA ?>],
                  ['Lulus', <?= $LULUS ?>],
                  ['Undur Diri', <?= $UNDURDIRI ?>],
                  ['DO', <?= $DO ?>]
                  
                ]);
                
                  // Optional; add a title and set the width and height of the chart
                  var options = {'width':480, 'height':300};
                
                  // Display the chart inside the <div> element with id="piechart"
                  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                  chart.draw(data, options);
                }
                </script>
              </body>
            <!-- End Pie Chart 1 -->
            </div>
          </div>
        
        </div>

        <div class="grid grid-cols-12 gap-4 mx-20 mt-4">
          <?php 
          require_once('../db_login.php');
          $query = "SELECT nama, COUNT(*) AS jumlah FROM data_mahasiswa";
          $result = $db->query($query);

          $jumlahmhs = $result->fetch_object()->jumlah;

          $query = "SELECT nama_dosen, COUNT(*) AS jml FROM data_dosen";
          $result = $db->query($query);

          $jumlahdosen = $result->fetch_object()->jml;
          ?>
          <div class="bg-white border shadow-xl rounded-lg p-8 col-span-6">
            <div class="text-2xl justify-center mb-6 text-center">Jumlah mahasiswa</div>
            <h1 class="text-4xl justify-center text-center"><?= $jumlahmhs ?></h1>
          </div>

          <div class="bg-white border shadow-xl rounded-lg p-8 col-span-6">
          <div class="text-2xl justify-center mb-6 text-center">Jumlah Dosen</div>
          <h1 class="text-4xl justify-center text-center"><?= $jumlahdosen ?></h1>
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
    
    <head>

    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
  </body>
</html>