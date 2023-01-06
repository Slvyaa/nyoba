<?php include('./connection.php'); ?>

	<div class="container" style="margin-top:80px">
		<center><font size="6"   style="text-align: center; color: #f7c04a; font-family:cursive ">EDIT DATA</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($conn, "SELECT * FROM category WHERE id='$id'") or die(mysqli_error($conn));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['Submit'])){
			$name  		= $_POST['name'];
			$img			= $_POST['img'];
		 
			$sql = mysqli_query($conn, "UPDATE dataset SET name='$name', img='$img' WHERE id='$id'") or die(mysqli_error($conn));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data.");  document.location="category.php?page=tampil_data_category";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EDIT DATA</title>
	 
</head>
<body>
<div class="container">
    
<form action="category.php?page=edit_data_category&id=<?php echo $id; ?>" method="post">

			<div class="input-group mb-3">
				<label   class="col-sm-2 col-form-label">NO</label>
				<div class="col-sm-10">
				<input type="text" name ="id" class="form-control" value="<?php echo $id['id']; ?>"    readonly required  >
				</div>
			</div>	<div class="input-group mb-3">
				<label   class="col-sm-2 col-form-label">GENRE MOVIE</label>
				<div class="col-sm-10">
				<input type="text" name ="name" class="form-control" value="<?php echo $data['name']; ?>" required >
				</div>
			</div>
		<div class="input-group mb-3">
			<label class="col-sm-2 col-form-label">GAMBAR</label>
			<div class="col-sm-10">
				<input type="file" class="form-control" id="img" name="img" value="<?php  echo $data['img']; ?>" required >
				</div>
			</div>

		</form>
	</div>
	 
	</div>
	<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="Submit" name="Submit" class="btn btn-primary" value="Simpan">
					<a href="category.php?page=tampil_data_category" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
</body>
</html>