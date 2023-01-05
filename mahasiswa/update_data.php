<?php
session_start();

require_once('../db_login.php');
$nim = $_SESSION['nim'];

$query = "SELECT * FROM data_mahasiswa WHERE nim = $nim";
$result = $db->query($query);
$mahasiswa = $result->fetch_object();

?>
<!DOCTYPE html>
<link rel="stylesheet" href="style.css" />
<html>
<link rel ="styleshet" href="style.css"/>
  <head>
  <link rel="stylesheet" href="style.css" />
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
    <link rel ="styleshet" href="style.css"/>
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
          <span class="logo-name">Update Data Mahasiswa</span>
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
                <span class="link">Data Skripsi</span>
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

        const mahasiswa = document.getElementById('provinsi');
        provinsi.addEventListener('change', function(){
          const id_provinsi = this.value;
          const kabupaten = document.getElementById('kabupaten');
          kabupaten.innerHTML = '<option value="">Pilih Kabupaten</option>';
          fetch('http://localhost/irs/kabupaten.php?id_provinsi='+id_provinsi)
          .then(response => response.json())
          .then(data => {
            data.forEach(kabupaten => {
              const option = document.createElement('option');
              option.value = kabupaten.id;
              option.text = kabupaten.nama;
              kabupaten.appendChild(option);
            });
          });
        });
      </script>
    </body>
    <head>

    <!-- End of Navbar -->
    <div class="flex flex-col max-w-4xl mx-auto mt-32">
      <!-- Content -->
      <form class="w-full" method="POST" action="post_update.php">
        <div class="bg-white shadow-md rounded-lg p-8">
          <h1 class="text-3xl font-medium mb-8">Update Data</h1>
          <div class="flex items-start gap-12">
            <div class="flex">
              <img class="w-32 h-32 border-2 rounded-full" src="https://uwaterloo.ca/school-of-accounting-and-finance/sites/ca.school-of-accounting-and-finance/files/uploads/images/nishika_formal_square.jpg" alt="foto mahasiswa"></img>
            </div>
            <!-- Button Ganti Foto, letaknya masih salah
            <div class="flex justify-left ">
              <button
                type="button"
                class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-12 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
              >
                Ganti Foto
              </button>
            </div> -->

            <div class="w-6/12">
              <div class="flex gap-10">
                <div class="mb-3 w-6/12">
                  <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >Nama Lengkap</label
                  >
                  <input
                    type="text" value="<?= $mahasiswa->nama ?>" readonly
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  />
                </div>
                <div class="mb-3 w-6/12">
                  <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >Email</label
                  >
                  <input
                    type="text"
                    value="<?= $mahasiswa->email ?>"
                    id="email" name="email",
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  />
                </div>
              </div>
              <div class="flex gap-10">
                <div class="mb-3 w-6/12">
                <label
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                  >NIM</label
                >
                <input
                  type="text" name="nim" value="<?= $mahasiswa->nim ?>" readonly
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
                </div>
                <div class="mb-3 w-6/12">
                  <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >No. Handphone</label
                  >
                  <input
                    type="text"
                    id="nomor_hp" name="nomor_hp" value="<?= $mahasiswa->nomor_hp ?>"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  />
                </div>
              </div>
              <div class="mb-3 w-8/12">
                <label
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                  >Dosen Wali</label
                >
                <input
                  type="text"
                  id="doswal" name="doswal" value="<?= $mahasiswa->doswal ?>" readonly
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
              </div>

              <div class="mb-3 w-full h-fit">
                <label
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                  >Alamat Lengkap Mahasiswa</label
                >
                <input
                  type="text"
                  id="alamat" name="alamat" value="<?= $mahasiswa->alamat ?>"
                  class="p-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
              </div>

              <div class="flex gap-4 mb-6">
                <div class="w-6/12">
                  <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >Provinsi</label
                  >
                  <select
                    id="provinsi" name="provinsi",
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  >
                    <option default>Pilih Provinsi</option>
                    <option <?= ($mahasiswa->provinsi =='JAWA BARAT') ? 'selected' : '' ?> value="JAWA BARAT">Jawa Barat</option>
                    <option <?= ($mahasiswa->provinsi =='JAWA TENGAH') ? 'selected' : '' ?> value="JAWA TENGAH">Jawa Tengah</option>
                    <option <?= ($mahasiswa->provinsi =='JAWA TIMUR') ? 'selected' : '' ?> value="JAWA TIMUR">Jawa Timur</option>
                    <option <?= ($mahasiswa->provinsi =='DKI JAKARTA') ? 'selected' : '' ?> value="DKI JAKARTA">DKI Jakarta</option>
                  </select>
                </div>
                <div class="w-6/12">
                  <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >Kabupaten/Kota</label
                  >
                  <select
                    id="kabupaten_kota" name="kabupaten_kota",
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  >
                    <option default>Pilih Kabupaten/Kota</option>
                    <option <?= ($mahasiswa->kabupaten_kota == 'BANDUNG') ? 'selected' : '' ?> value="BANDUNG">Bandung</option>
                    <option <?= ($mahasiswa->kabupaten_kota == 'BEKASI') ? 'selected' : '' ?> value="BEKASI">Bekasi</option>
                    <option <?= ($mahasiswa->kabupaten_kota == 'BOGOR') ? 'selected' : '' ?> value="BOGOR">Bogor</option>
                    <option <?= ($mahasiswa->kabupaten_kota == 'DEPOK') ? 'selected' : '' ?> value="DEPOK">Depok</option>
                    <option <?= ($mahasiswa->kabupaten_kota == 'JAKARTA') ? 'selected' : '' ?> value="JAKARTA">Jakarta</option>
                    <option <?= ($mahasiswa->kabupaten_kota == 'SEMARANG') ? 'selected' : '' ?> value="SEMARANG">Semarang</option>
                    <option <?= ($mahasiswa->kabupaten_kota == 'SURABAYA') ? 'selected' : '' ?> value="SURABAYA">Surabaya</option>
                    <option <?= ($mahasiswa->kabupaten_kota == 'YOGYAKARTA') ? 'selected' : '' ?> value="YOGYAKARTA">Yogyakarta</option>
                    <option <?= ($mahasiswa->kabupaten_kota == 'SOLO') ? 'selected' : '' ?> value="SOLO">Solo</option>
                  </select>
                </div>
              </div>

              <div class="flex gap-4 mb-6">
                <div class="w-4/12">
                  <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >Status</label
                  >
                  <input
                    type="text" name="status" value="<?= $mahasiswa->status ?>"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  />
                </div>
                <div class="w-4/12">
                  <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >Angkatan</label
                  >
                  <input
                    type="text" name="angkatan" value="<?= $mahasiswa->angkatan ?>"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="flex justify-end mt-8 gap-2 mb-10">
          <button
            type="submit"
            class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-12 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
          >
            Save
          </button>
          <a href="dashboard_mhs.php"
            type="button"
            class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-12 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800"
          >
            < Kembali
          </a>
        </div>
      </form>
      <!-- End of Content -->
    </div>
</div>


  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
</body>
</html>
