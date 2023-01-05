<?php

//aktif session
session_start();

require_once('db_login.php');

$nip_nim = $_POST['nip_nim'];
$password = $_POST['password'];

//menyeleksi data user
$login = $db->query("select * from user where nip_nim='$nip_nim' and password='$password'");

//menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

//cek apakah username dan password ditemukan pada database
if($cek>0){

    //memasukkan data dari login ke $data dalam bentuk array
    $data=mysqli_fetch_assoc($login);

    //cek jika user login sebagai admin
    if($data['status']=="mahasiswa"){

        //buat session login dan username
        $_SESSION['nim'] = $nip_nim;
        $_SESSION['email']= $data['email'];
        //alihkan ke halaman dashboard mahasiswa
        header("location:./mahasiswa/dashboard_mhs.php");
    }
    else if($data['status']=="departemen"){

        //buat session login dan username
        $_SESSION['nip'] = $nip_nim;
        $_SESSION['email']= $data['email'];
        //alihkan ke dashboard departemen
        header("location:departemen/dashboard_dept.php");
    }
    else if($data['status']=="operator"){

        //buat session login dan username
        $_SESSION['nip'] = $nip_nim;
        $_SESSION['email']= $data['email'];
        //alihkan ke dashboard operator
        header("location:operator/dashboard_op.php");
    }
    else if($data['status']=="dosen"){

        //buat session login dan username
        $_SESSION['nip'] = $nip_nim;
        $_SESSION['email']= $data['email'];
        //alihkan ke dashboard dosen wali
        header("location:dosen/dashboard_dosen.php");
    }
    else{
		// alihkan ke halaman login kembali
        header("location:login.php");
		//header("location:login.php?pesan=gagal");
    }
}
else{
    header("location:login.php?pesan=gagal");
}
?>