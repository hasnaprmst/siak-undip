<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
?>

<!DOCTYPE html>
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
    <!-- Navbar atul galak -->
    
    <!-- End of Navbar -->
    <div class="flex flex-col max-w-4xl mx-auto mt-16">
      <!-- Content -->
      <form class="w-full" method="POST" action='cek_login.php'>
        <div class="bg-white shadow-md rounded-lg p-8 border">
        <center>
          <h1 class="text-3xl font-medium mb-8">Login</h1>
          </center>
          <div class="flex items-start gap-12">
            <div>
              <img src="https://mm.feb.undip.ac.id/wp-content/uploads/2021/11/universitas-diponegoro-logo.png">
             
            </div>
            <div class="w-6/12">
                    <div class="mb-6">
                        <label
                        class="block mb-2 text-sm font-medium text-gray-900 "
                        >NIM/Email/NIP</label
                        >
                        <input
                        style="width: 500px;"
                        type="text" name="nip_nim" placeholder="NIM/Email/NIP"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        />
                    </div>
                    <div class="mb-6 w-full">
                        <label
                        class="block mb-2 text-sm font-medium text-gray-900 "
                        >Password</label
                        >
                        <input
                        style="width: 500px;"
                        type="password" name="password" placeholder="Password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        />
                    </div>

                    <div class="flex justify-end mt-8">
                    <div class="flex justify-end ...">
                        <input type="submit" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-12 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" 
                        value="Login">
                    </div>
                    </div>
             
        
        <div>
            <p style="color:blue;" <a href="www.lupa.com">Lupa Password? </a> </p>
        </div>
      </form>
      <!-- End of Content -->
    </div>

    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
  </body>
</html>