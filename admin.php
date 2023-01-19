<?php
	//Koneksi Database
    include "koneksi.php";

	//jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] =="edit")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE `mahasiswa` SET 
												`id_mahasiswa`='$_POST[id]',
												`nama`='$_POST[tnama]',
												`nim`='$_POST[tnim]',
												`jenisKelamin`='$_POST[tjenisKelamin]',
												`alamat`='$_POST[talamat]',
												`notelp`='$_POST[tnotelp]',
												`prodi`='$_POST[tprodi]' WHERE 1
											
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='admin.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='admin.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO mahasiswa (nama, nim, jenisKelamin, alamat, notelp, prodi)
										    VALUES ('$_POST[tnama]', 
										  		 	'$_POST[tnim]', 
										  		 	'$_POST[tjenisKelamin]', 
										  		 	'$_POST[talamat]',
													'$_POST[tnotelp]',
												   	'$_POST[tprodi]')
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='admin.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='admin.php';
				     </script>";
			}
		}


		
	}


	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id_mahasiswa = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vnama = $data['nama'];
				$vnim = $data['nim'];
				$vjenisKelamin = $data['jenisKelamin'];
				$valamat = $data['alamat'];
                $vnotelp = $data['notelp'];
				$vprodi = $data['prodi'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			
			$hapus = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id_mahasiswa = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='admin.php';
				     </script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="container">

	<h1 class="text-center">Daftar Mahasiswa</h1>
	<h2 class="text-center">Welcome</h2>

	
	<div class="card mt-3">
	  <div class="card-header bg-primary text-white">
	Data Mahasiswa	
		<a href="index.php"><button class="btn-danger float-right ">Logout</button></a><br />
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>nim</label>
	    		<input type="text" name="tnim"class="form-control" value="<?=@$vnim?>" placeholder="Input Your NIM" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Name</label>
	    		<input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Input Your Name" required>
			</div>
			
			<div class="form-group">
	    		<label>jenisKelamin</label>
	    		<select class="form-control" name="tjenisKelamin">
	    			<option value="<?=@$vjenisKelamin?>"><?=@$vjenisKelamin?></option>
	    			<option value="Laki-Laki">Male</option>
	    			<option value="Perempuan">Female</option>
	    		</select>
	    	</div>

	    	<div class="form-group">
	    		<label>alamat</label>
	    		<textarea class="form-control" name="talamat"  placeholder="Masukkan Alamat"><?=@$valamat?></textarea>
			</div>

			<div class="form-group">
	    		<label>noTelp</label>
	    		<input type="text" name="tnotelp" value="<?=@$vnotelp?>" class="form-control" placeholder="Input Your No Hp" required>
			</div>

			<div class="form-group">
	    		<label>prodi</label>
	    		<select class="form-control" name="tprodi">
	    			<option value="<?=@$vprodi?>"><?=@$vprodi?></option>
	    			<option value="D3-Manajemen">Manajemen</option>
	    			<option value="S1-Teknik Informatika">Teknik Informatika</option>
	    		</select>
	    	</div>

	    	<button type="submit" class="btn btn-success" name="bsimpan">Save</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Clear</button>

	    </form>
	  </div>
	</div>

	
	<div class="card mt-3">
	  <div class="card-header bg-success text-white">
			Data Mahasiswa
		<!-- untuk print -->
		<a href="print.php"><button class="btn-warning float-right">Report Print</button></a><br />
		<!--akhir print --->    
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
			<tr>
                <th>No</th>
                <th>NIM</th>
                <th>Name</th>
                <th>jenisKelamin</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from mahasiswa order by id_mahasiswa desc");
	    		while($data = mysqli_fetch_array($tampil)) :

			?>
			<!-- open -->




			<!-- close -->
	    	<tr>
				<td><?=$no++;?></td>
                <td><?=$data['nim']?></td>
                <td><?=$data['nama']?></td>
                <td><?=$data['jenisKelamin']?></td>
                <td><?=$data['alamat']?></td>
                <td><?=$data['notelp']?></td>
                <td><?=$data['prodi']?></td>
	    		<td>
	    			<a href="admin.php?hal=edit&id=<?=$data['id_mahasiswa']?>" class="btn btn-warning"> Edit </a>
	    			<a href="admin.php?hal=hapus&id=<?=$data['id_mahasiswa']?>" 
					   onclick="return confirm('Are You Sure Want Delete This?')" class="btn btn-danger"> Delete </a>

	    		</td>
	    	</tr>
	    <?php endwhile;  ?>
	    </table>

	  </div>
	</div>
	

</div>



<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>