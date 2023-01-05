<!DOCTYPE html>
<html>
	
	<body>
	
		<?php 
		session_start();
		require_once('../db_login.php');
			$nim = $_SESSION['nim'];
			$query = "SELECT * FROM data_mahasiswa WHERE nim = $nim";
			$result = $db->query($query);
		
			$ekstensi_diperbolehkan	= array('pdf');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	

            $semester = $_POST["semester"];
            $sks = $_POST["jumlah_sks"];


			//check wether the POST semester is already in semester column or not

			$query1 = "SELECT * FROM irs WHERE nim = $nim AND semester_irs = $semester";
			$result1 = $db->query($query1);
			if ($result1->num_rows > 0) {
				if(in_array($ekstensi, $ekstensi_diperbolehkan) == true){
					if($ukuran < 1044070){			
						move_uploaded_file($file_tmp, 'fileirs/'.$nama);
						$query = $db->query("UPDATE irs SET upload_file = '$nama', jumlah_sks = '$sks' WHERE nim = $nim and semester_irs = $semester");
						if($query){
							echo '<script>alert("Data berhasil diupdate");</script>';
							echo '<script>window.location.href = "inputirs.php";</script>';
							
						}else{
							echo '<script>alert("GAGAL MENGUPLOAD FILE");</script>';
							echo '<script>window.location.href = "inputirs.php";</script>';
						}
					}else{
						echo '<script>alert("UKURAN FILE TERLALU BESAR");</script>';
							echo '<script>window.location.href = "inputirs.php";</script>';
					}
				}else{
					echo '<script>alert("EKSTENTSI FILE TIDAK SESUAI !!!! ");</script>';
							echo '<script>window.location.href = "inputirs.php";</script>';
				}
			} else {
				if(in_array($ekstensi, $ekstensi_diperbolehkan) == true){
					if($ukuran < 1044070){			
						move_uploaded_file($file_tmp, 'fileirs/'.$nama);
						$query = $db->query("INSERT INTO irs VALUES($nim, $semester, $sks, '$nama')");
						if($query){
							echo '<script>alert("Data berhasil diupdate");</script>';
							echo '<script>window.location.href = "inputirs.php";</script>';
							
						}else{
							echo '<script>alert("GAGAL MENGUPLOAD FILE");</script>';
							echo '<script>window.location.href = "inputirs.php";</script>';
						}
					}else{
						echo '<script>alert("UKURAN FILE TERLALU BESAR");</script>';
							echo '<script>window.location.href = "inputirs.php";</script>';
					}
				}else{
					echo '<script>alert("EKSTENTSI FILE TIDAK SESUAI !!!! ");</script>';
					echo '<script>window.location.href = "inputirs.php";</script>';
				}
			}
		
		?>
 
		<br/>
		<br/>
		<a href="inputirs.php">Upload Lagi</a>
		<br/>
		<br/>
<!--  
		<table>
			<?php 
			$data = mysql_query("select * from upload");
			while($d = mysql_fetch_array($data)){
			?>
			<tr>
				<td>
					<img src="<?php echo "fileirs/".$d['nama_file']; ?>">
				</td>		
			</tr>
			<?php } ?>
		</table> -->

        <script>
            
        </script>
	</body>
</html>