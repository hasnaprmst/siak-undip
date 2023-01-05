<!DOCTYPE html>
<?php
require_once('../db_login.php');
session_start();
$nip = $_SESSION['nip'];
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
    <!-- Navbar -->

    <!-- End of Navbar -->
    <div class="">
      <!-- Content -->
      <h1 class="text-4xl mx-20 my-8 mt-24">Verifikasi Data Mahasiswa</h1>
      <div class="overflow-x-auto mx-20 relative shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                          Semester
                      </th>
                      <th scope="col" class="py-3 px-6">
                          Status Verifikasi
                      </th>
                      <th scope="col" class="py-3 px-6">
                          Detail
                      </th>
                      <th scope="col" class="py-3 px-6">
                          Action
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
                $sql = "SELECT * FROM data_mahasiswa as m, verifikasi, data_dosen as d WHERE 
                m.nim = verifikasi.nim
                and m.doswal = d.nama_dosen
                and $nip = d.nip";
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
                      <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>" . $row["status_verifikasi"] . "</td>
                      <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>
                        <a href='detail_data.php?nim=" . $row["nim"] . "' class='font-medium text-green-600 dark:text-green-500 hover:underline'>Lihat Detail</a>
                      </td>
                      <td class='py-4 px-6 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>
                        <form action='postv.php' method='POST'>
                          <input type='hidden' name='nim' value='" . $row["nim"] . "'>
                          <input type='hidden' name='status_verifikasi' value='Verified '>
                          <button type='submit' name='submit'class='font-medium text-green-600 dark:text-green-500 hover:underline''>
                            Verify
                          </button>
                        </form>
                        <form action='postv.php' method='POST'>
                          <input type='hidden' name='nim' value='" . $row["nim"] . "'>
                          <input type='hidden' name='status_verifikasi' value='Unverified '>
                          <button type='submit' name='submit' class='font-medium text-red-600 dark:text-red-500 hover:underline''>
                            Unverify
                          </button>
                        </form>
                      </td>
                      
                      </tr>";
                $no = $no + 1;
              }
              ?>
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
                              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                          </button>
                      </div>
                      <!-- Modal body -->
                      <div class="p-6 space-y-6">
                          <div class="grid grid-cols-6 gap-6">
                              <div class="col-span-6 sm:col-span-6">
                                  <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                                  <select
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="pilih semester" required="">
                                    <option selected>Pilih Semester</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                  </select>
                              </div>
                              <div class="col-span-6 sm:col-span-6">
                                  <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah SKS</label>
                                  <select
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="pilih jumlah sks" required="">
                                    <option selected>Pilih Jumlah SKS</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                  </select>
                              </div>
                              <div class="col-span-6 sm:col-span-6">
                                <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">IP Semester</label>
                                <input type="number" name="ips" id="ips" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="3.50" required="">
                              </div>

                              <div class="col-span-6 sm:col-span-6">
                                  <label for="phone-number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload File KHS</label>
                                  <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                                  <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">khs_namamhs.pdf</p>
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
      <link
        href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
        rel="stylesheet"
      />
    </head>
    <body>
      <nav>
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
          <span class="logo-name">Verifikasi Data Mahasiswa</span>
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