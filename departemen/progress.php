<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>

<body>
  <!-- Navbar -->
  <head>
   
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
        <span class="logo-name">Progress Studi Mahasiswa</span>
      </div>
      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
          <span class="logo-name">Universitas Diponegoro</span>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
              <a href="dashboard_dept.php" class="nav-link">
                <i class="bx bx-home-alt icon"></i>
                <span class="link">Home</span>
              </a>
            </li>
            
            <li class="list">
              <a href="data_dosen.php" class="nav-link">
                <i class="bx bx-spreadsheet icon" ></i>
                <span class="link">Data Dosen</span>
              </a>
            </li>

            <li class="list">
              <a href="data_skripsi.php" class="nav-link">
                <i class="bx bx-spreadsheet icon" ></i>
                <span class="link">Data Mahasiswa Skripsi</span>
              </a>
            </li>
           
            <div class="list"> 
             <a href="data_pkl.php" class="nav-link">
                <i class="bx bx-pie-chart-alt-2 icon"></i>
                <span class="link">Data Mahasiswa PKL</span>  
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
              <a href="rekap_data.php" class="nav-link">
                <i class="bx bx-folder-open icon"></i>
                <span class="link">Rekap Data Mahasiswa</span>
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
  <div class="">
    <!-- Content -->
    <link rel="stylesheet" href="font.css" />
    <h1 class="text-4xl mx-20 my-8 mt-24">Data Mahasiswa</h1>
    <div class="flex justify-between mx-20 mt-8">
      <!-- dropdown pilih tahun -->
      <div>
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
      </div>
      <!-- end of dropdown -->

      <!-- search bar -->
      <div class="flex justify-right mb-4">
      <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for mahasiswa">
        </div>
      </div>
      <!-- end of search -->
    
    </div>

      <!-- <div class="p-5 col-span-8"> -->
        <!-- <div class="flex flex-col"> -->
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
              <div class="overflow-x-auto mx-20 relative shadow-md sm:rounded-lg">
                <table id="list-mahasiswa" class="min-w-full">
                  <thead class="bg-white border-b">
                    <tr>
                      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        No
                      </th>
                      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Nama
                      </th>
                      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        NIM
                      </th>
                      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Semester
                      </th>
                      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Angkatan
                      </th>

                      <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <!-- <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        Anisatul Ma'rifah
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        24060120140154
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        5
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        2020
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        3.80
                      </td>
                      <td class="py-4 px-6">
                    <a href="progress_studi.php" class="font-medium text-green-600 dark:text-green-500 hover:underline">Lihat Progress</a>
                    </td>

                    </tr>
                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        Farah Tisti Paranpara
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        24060120140145
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        5
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                       2020
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                       3.80
                       <td class="py-4 px-6">
                    <a href="progress_studi.php" class="font-medium text-green-600 dark:text-green-500 hover:underline">Lihat Progress</a>
                     </td>

                    </tr>
                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        Hasna Paramesti Ahmad
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        24060120140141
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        5
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      2020
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      3.80
                      <td class="py-4 px-6">
                        <a href="progress_studi.php" class="font-medium text-green-600 dark:text-green-500 hover:underline">Lihat Progress</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">4</td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                       Garry Yehosyafat
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        24060120140141
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        5
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      2020
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      3.80
                      <td class="py-4 px-6">
                        <a href="progress_studi.php" class="font-medium text-green-600 dark:text-green-500 hover:underline">Lihat Progress</a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">5</td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                       Ratu Aubrey
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        24060120140141
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        5
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      2020
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        3.80
                      <td class="py-4 px-6">
                        <a href="progress_studi.php" class="font-medium text-green-600 dark:text-green-500 hover:underline">Lihat Progress</a>
                      </td>
                     </td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End of Content -->
  </div>

  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
  <script src="ajax.js"></script>
  <script>
    const angkatan = document.getElementsByName('filter-radio');
    const filter2022 = angkatan[0];
    const filter2021 = angkatan[1];
    const filter2020 = angkatan[2];
    const filter2019 = angkatan[3];
    const filter2018 = angkatan[4];

    filter2022.onchange = function() {
      getAngkatan('2022', 'list-mahasiswa');
    }
    filter2021.onchange = function() {
      getAngkatan('2021', 'list-mahasiswa');
    }
    filter2020.onchange = function() {
      getAngkatan('2020', 'list-mahasiswa');
    }
    filter2019.onchange = function() {
      getAngkatan('2019', 'list-mahasiswa');
    }
    filter2018.onchange = function() {
      getAngkatan('2018', 'list-mahasiswa');
    }
  </script>
</body>

</html>