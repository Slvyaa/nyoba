<?php
//memasukkan file config.php
include('./connection.php');
?>


	<div class="container" style="margin-top:80px">
		<center><font size="6"  style="text-align: center; color: #f7c04a; font-family:cursive ">DATA CATEGORY MOVIE</font></center>
		<hr>
		<a href="category.php?page=tambah_data_category"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO</th>
					<th>GENRE MOVIE</th>
					<th>GAMBAR</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($conn, "SELECT * FROM category ORDER BY id DESC") or die(mysqli_error($conn));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$id = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
					 
							<td>'.$id.'</td>
							<td>'.$data['name'].'</td>
							<td> '.$data['img'].' </td>
						 
							<td>
								<a href="category.php?page=edit_data_category&id='.$data['id'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?id='.$data['id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$id++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
