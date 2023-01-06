<?php include('./connection.php'); ?>

	<div class="container" style="margin-top:80px">
		<center><font size="6"   style="text-align: center; color: #f7c04a; font-family:cursive ">INPUT DATA CINEMA MOVIE</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id		= $_POST['id'];
			$name		= $_POST['name'];
			$img		= $_POST['img'];
			 
			$cek = mysqli_query($conn, "SELECT * FROM cinema WHERE id='$id'") or die(mysqli_error($conn));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($conn, "INSERT INTO cinema (id, name, img, ) VALUES('$id', '$name', '$img',") or die(mysqli_error($conn));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="cinema.php?page=tampil_data_cinema";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			} 
		}
		?>
		
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TAMBAH DATA CINEMA</title>
	 
</head>
<body>
<div class="container">
		 
		<form action="cinema.php?page=tambah_data_cinema" method="post">
		<div class="input-group mb-3">
				<label   class="col-sm-2 col-form-label">CINEMA</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" name="name">
				</div>
			</div>
		<div class="input-group mb-3">
			<label class="col-sm-2 col-form-label">GAMBAR</label>
			<div class="col-sm-10">
				<input type="file" class="form-control" id="img" name="img" >
				</div>
			</div>
	 

			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-warning" value="Simpan">
		</div>

	
		</form>

	</div>
	 
</div>
</body>
</html>