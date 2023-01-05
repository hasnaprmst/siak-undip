<!DOCTYPE html>

<?php
session_start();
require_once('../db_login.php');
$nip = $_SESSION['nip'];

$query = "SELECT * FROM data_dosen WHERE nip = $nip";
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

  <!-- End of Navbar -->
  <div class="">
    <!-- Content -->
    <h1 class="text-4xl mx-20 my-8 mt-24">Data Mahasiswa Dosen Wali</h1>
    <div class="flex justify-between mx-20 mt-8">
      <!-- dropdown pilih tahun -->
      <!-- <div>
        <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="mb-4 center justify-center inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
          <svg class="w-4 h-4 text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
          Pilih Tahun<svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>

        <div id="dropdownRadio" class="hidden z-10 w-48 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                  <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                      <li>
                          <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                              <input id="filter-radio-example-1" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                              <label for="filter-radio-example-1" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">2022</label>
                          </div>
                      </li>
                      <li>
                          <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                              <input checked="" id="filter-radio-example-2" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                              <label for="filter-radio-example-2" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">2021</label>
                          </div>
                      </li>
                      <li>
                          <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                              <input id="filter-radio-example-3" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                              <label for="filter-radio-example-3" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">2020</label>
                          </div>
                      </li>
                      <li>
                          <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                              <input id="filter-radio-example-4" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                              <label for="filter-radio-example-4" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">2019</label>
                          </div>
                      </li>
                      <li>
                          <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                              <input id="filter-radio-example-5" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                              <label for="filter-radio-example-5" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">2018</label>
                          </div>
                      </li>
                  </ul>
        </div>
      </div> -->
      <!-- end of dropdown -->

      <!-- search bar -->
      <!-- <div class="flex justify-right mb-4">
      <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for mahasiswa">
        </div>
      </div> -->
      <!-- end of search -->
    </div>   



    <div class="overflow-x-auto mx-20 relative shadow-md sm:rounded-lg">
      <table id= "list-mahasiswa" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <table id= "table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="py-3 px-6">
              No
            </th>
            <th scope="col" class="py-3 px-6">
              Nama
            </th>
            <th scope="col" class="py-3 px-6">
              NIM
            </th>
            <th scope="col" class="py-3 px-6">
              Angkatan
            </th>
            <th scope="col" class="py-3 px-6">
              Status
            </th>
            <th scope="col" class="py-3 px-6">
              Status PKL
            </th>
            <th scope="col" class="py-3 px-6">
              Status Skripsi
            </th>
            <th scope="col" class="py-3 px-6">
              Verifikasi
            </th>
            <th scope="col" class="py-3 px-6">
              Action
            </th>
          </tr>
        </thead>
        <tbody>
              <!-- ambil data dari database -->
        <?php


          $sql = "SELECT * FROM data_mahasiswa as m, pkl, skripsi, verifikasi, data_dosen as d
          WHERE m.doswal = d.nama_dosen
          and $nip = d.nip
          and m.nim = pkl.nim
          and m.nim = skripsi.nim
          and m.nim = verifikasi.nim";
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
                  <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>".$row["status"]. "</td>
                  <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>".$row["status_pkl"]. "</td>
                  <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>".$row["status_skripsi"]. "</td>
                  <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>".$row["status_verifikasi"]. "</td>
                  <td class='py-4 px-6 space-x-4 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>
                    <a href='#' type='button' data-modal-toggle='detailModal' class='font-medium text-green-600 dark:text-green-500 hover:underline'>Detail  </a>
                  </td>
                </tr>";
              }
              

              ?>


            </td>

          </tr>

        </tbody>
      </table>
      <!-- Edit modal -->
      <div id="editModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center p-4 w-full md:inset-0 h-modal md:h-full">
        <div class="relative w-full max-w-2xl h-full md:h-auto">
          <!-- Modal content -->
          <form action="#" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Edit Data KHS
              </h3>
              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editModal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
              </button>
            </div>
            <!-- Modal body -->

            <?php
            if(isset($_GET['nim'])){
              $nim = mysqli_real_escape_string($db, $_GET['nim']);
              $query = "SELECT * FROM data_mahasiswa WHERE nim='$nim'";
              $query_run = mysqli_query($db, $query);

              if(mysqli_num_rows($query_run)>0){
                $nim = mysqli_fetch_array($query_run);
              }
            }
                ?>
                



            <div class="p-6 space-y-6">
              <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-6">
                  <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                  <input type="text" name="nama" id="nama" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tulis Nama Anda" required="">
                </div>
                <div class="col-span-6 sm:col-span-6">
                  <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                  <input type="number" name="nim" id="nim" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="240601xxxxxxxx" required="">
                </div>
                <div class="col-span-6 sm:col-span-6">
                  <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Angkatan</label>
                  <input type="number" name="angkatan" id="angkatan" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1945" required="">
                </div>
                <div class="col-span-6 sm:col-span-6">
                  <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status PKL</label>
                  <select required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="pilih semester">
                  <!-- Jadi ini kan aku bikin value="" trs dia selected, jadi defaultnya value dari select ini itu = "", padahal kalo required itu gaboleh "", nah nanti dia bakal kevalidasi suruh isi dulu -->  
                  <option selected value="">Pilih Status PKL</option>
                    <option value="belummengambil">Belum Mengambil</option>
                    <option value="lulus">Lulus</option>
                    <option value="tidaklulus">Tidak Lulus</option>
                  </select>
                </div>
                <div class="col-span-6 sm:col-span-6">
                  <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Skripsi</label>
                  <select required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="pilih semester">
                  <!-- Jadi ini kan aku bikin value="" trs dia selected, jadi defaultnya value dari select ini itu = "", padahal kalo required itu gaboleh "", nah nanti dia bakal kevalidasi suruh isi dulu -->  
                  <option selected value="">Pilih Status Skripsi</option>
                    <option value="belummengambil">Belum Mengambil</option>
                    <option value="lulus">Lulus</option>
                    <option value="tidaklulus">Tidak Lulus</option>
                  </select>
                </div>
                <div class="col-span-6 sm:col-span-6">
                  <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Verifikasi</label>
                  <select required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="pilih semester">
                  <!-- Jadi ini kan aku bikin value="" trs dia selected, jadi defaultnya value dari select ini itu = "", padahal kalo required itu gaboleh "", nah nanti dia bakal kevalidasi suruh isi dulu -->  
                  <option selected value="">Pilih Status Verifikasi</option>
                    <option value="terverifikasi">Terverifikasi</option>
                    <option value="belumterverifikasi">Belum Terverifikasi</option>
                  </select>
                </div>

              </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
              <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save Changes</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Detail modal -->
      <div id="detailModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center p-4 w-full md:inset-0 h-modal md:h-full">
        <div class="relative w-full max-w-2xl h-full md:h-auto">
          <!-- Modal content -->
          <form action="#" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Detail Data Mahasiswa
              </h3>
              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="detailModal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
              </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
              <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-6">
                  <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                  <input type="text" readonly name="nama" id="nama" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tulis Nama Anda" required="">
                </div>
                <div class="col-span-6 sm:col-span-6">
                  <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                  <input type="number" readonly name="nim" id="nim" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php 
                ?>
                </div>
                <div class="col-span-6 sm:col-span-6">
                  <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Angkatan</label>
                  <input type="number" readonly name="angkatan" id="angkatan" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1945" required="">
                </div>
                <div class="col-span-6 sm:col-span-6">
                  <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status PKL</label>
                  <input type="number" readonly name="statuspkl" id="statuspkl" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Status PKL" required="">             
                </div>
                <div class="col-span-6 sm:col-span-6">
                  <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Skripsi</label>
                  <input type="number" readonly name="statuspkl" id="statusskripsi" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Status Skripsi" required=""> 
                </div>
                <div class="col-span-6 sm:col-span-6">
                  <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Verifikasi</label>
                  <input type="number" readonly name="statuspkl" id="statusverifikasi" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Status Verifikasi" required=""> 
                </div>

              </div>
            </div>
            <!-- Modal footer -->
          </form>
        </div>
      </div>
      
      <!-- Delete Modal -->
      <div id="deleteModal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
          <div class="relative p-4 w-full max-w-md h-full md:h-auto">
              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="deleteModal">
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                      <span class="sr-only">Close modal</span>
                  </button>
                  <div class="p-6 text-center">
                      <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                      <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                      <button data-modal-toggle="deleteModal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                          Yes, I'm sure
                      </button>
                      <button data-modal-toggle="deleteModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                  </div>
              </div>
          </div>
      </div>

    </div>
    <!-- End of Content -->
  </div>
  <head>
    
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    

  </head>
</html>
