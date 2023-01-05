<?php
session_start();
require_once('../db_login.php');
$nip = $_SESSION['nip'];

$valid = TRUE;
if (isset($_POST["save"])){
    $nama = test_input($_POST["nama"]);
    if ($nama == '') {
        $error_nama = "Name is required";
        $valid = FALSE;
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
          $error_nama = "Only letters and white space allowed";
          $valid = FALSE;
        }
    }
    
    $nim = test_input($_POST["nim"]);
    if ($nim == '') {
        $error_nim = "NIM is required";
        $valid = FALSE;
    }

    $angkatan = $_POST["angkatan"];
    if ($angkatan == '' || $angkatan == 'none') {
        $error_angkatan = "Angkatan is required";
        $valid = FALSE;
    }

    $status = $_POST["status"];
    if ($status == '' || $status == 'none') {
        $error_status = "Status is required";
        $valid = FALSE;
    }

    if ($valid){
        $query = "INSERT INTO mahasiswa (nama, nim, angkatan, status) VALUES ('".$nama."', '".$nim."', '".$angkatan."', '".$status."')";
        $result = $db->query($query);
        if (!$result) {
            die ("Could not query the database: <br />". $db->error);
        } else {
          echo 'alert("Data berhasil disimpan")';
          header('Location: dashboard_op.php');
        }
        $db->close();
    }
}

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

    <!-- End of Navbar -->
    <div class="flex flex-col max-w-4xl mx-auto mt-28">
      <!-- Content -->
      <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="w-full">
        <div class="bg-white shadow-md rounded-lg p-8">
          <h1 class="text-3xl font-medium mb-8">Input Data Mahasiswa</h1>
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
              <div class="mb-6">
                <label
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                  >Nama Lengkap Mahasiswa</label
                >
                <input
                  type="text" id="nama" name="nama" placeholder="Nama Lengkap Mahasiswa"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
              </div>
              <div class="mb-6 w-full">
                <label
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                  >NIM</label
                >
                <input
                  type="text" id="nim" name="nim" placeholder="Nomor Induk Mahasiswa"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
              </div>
              <div class="flex gap-4 mb-6">
                <div class="w-6/12">
                  <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >Angkatan</label
                  >
                  <select
                    id="angkatan" name="angkatan"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  >
                    <option selected>Pilih angkatan</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                  </select>
                </div>
                <div class="w-6/12">
                  <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >Status</label
                  >
                  <select
                    id="status" name="status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  >
                    <option selected>Pilih status</option>
                    <option value="aktif">Aktif</option>
                    <option value="cuti">Cuti</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="flex justify-end mt-8">
          <button
            type="submit" name="save" value="save"
            class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-12 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
          >
            Save
          </button>
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
          <span class="logo-name">Input Data Mahasiswa</span>
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
              
              
              <li class="list">
                <a href="data_mahasiswa.php" class="nav-link">
                  <i class="bx bx-spreadsheet icon" ></i>
                  <span class="link">Menejemen Data Mahasiswa</span>
                </a>
              </li>
             
              <li class="list">
                <a href="data_dosen.php" class="nav-link">
                  <i class="bx bx-paste icon" ></i>
                  <span class="link">Manajemen Data Dosen</span>
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

    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
  </body>
</html>