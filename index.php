<html !DOCTYPE>
<head>
	<title> Data Mahasiswa </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>           
  <div class="row">
        <div class="container">
		<br>
            <h2><i class="fa fa-users"></i> Aplikasi Data Mahasiswa</h2>
            <hr>
            <a href="input.php" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
            <br><br>
            <table class="table table-striped table-bordered table-hover" id="tb-mahasiswa">
    <thead>
      <tr>
        <th>NIM</th>
        <th>NAMA</th>
		<th>JENIS KELAMIN</th>
        <th>JURUSAN</th>
		<th>SEMESTER</th>
        <th>ALAMAT</th>
		<th>PILIHAN</th>
      </tr>
    </thead>
    <tbody>
		<?php
		include "koneksi.php";

		$koneksiObj = new Koneksi();
		$koneksi = $koneksiObj->getKoneksi();

		if($koneksi->connect_error) {
			echo "<tr><td>";
			echo "Gagal koneksi : ". $koneksi->connect_error;
			echo "</td></tr>";
		}

		$query = "select * from uas_mahasiswa order by nama";
		$data = $koneksi->query($query);
		
		
		if($data->num_rows <= 0) {
			echo "<tr><td colspan='7'>";
			echo "<p align='center'>Tidak ada data</p>";
			echo "</td></tr>";
		}else {
			while ($row = $data->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["nim"]. "</td>"; 
				echo "<td>" . $row["nama"]. "</td>";
				echo "<td>" . $row["jenis_kelamin"]. "</td>";
				echo "<td>" . $row["jurusan"] . "</td>";
				echo "<td>" . $row["semester"]. "</td>";
				echo "<td>" . $row["alamat"] . "</td>";
				echo '<td><a href="form-edit.php?nim='. $row["nim"] .'"><button type="button" class="btn btn-secondary">Edit</button></a> 
				<a href="hapus.php?nim='. $row["nim"] .'"><button type="button" class="btn btn-danger">Hapus</button></a></td>';
				echo "</tr>";
			}
		}
		
		$koneksi->close();
			?>
    </table>
	</div>
    </div>
</body>
</html>