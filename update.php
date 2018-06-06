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
	<div class="container">
	<div class="portfolio-modal mfp-hide" id="logo-modal-1">
      <div class="portfolio-modal-dialog bg-white">
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
			<br>
              <h3 class='text-secondary text-uppercase mb-0'>Project Name</h3>
				<hr class="star-dark mb-5">
				<?php
					require_once('koneksi.php');

					$koneksiObj = new Koneksi();
					$koneksi = $koneksiObj->getKoneksi();

					if($koneksi->connect_error){
						echo "Gagal Koneksi : ". $koneksi->connect_error;
					} 

					$nim 	= $_POST['nim'];
					$nama   = $_POST['nama'];
					$jenis_kelamin   = $_POST['jk'];
					$jurusan = $_POST['jurusan'];
					$semester   = $_POST['semester'];
					$alamat = $_POST['alamat'];

					$query = "update uas_mahasiswa set nama = '$nama', jenis_kelamin = '$jenis_kelamin', jurusan = '$jurusan', semester = '$semester', alamat = '$alamat' where nim = '$nim'";
					
					if($nim=='' || $nama=='' || $jenis_kelamin=='' || $jurusan=='' || $semester=='' || $alamat==''){
					echo "<h5 class='text-secondary text-uppercase mb-0'>Gagal update, pastikan semua kolom di form telah terisi dengan Benar!</h5>".
					'<a class="btn btn-warning btn-lg rounded-pill portfolio-modal-dismiss" href="form-edit.php">
						<i class="fa fa-close"></i>
						Kembali</a>';
						return;
					}
					
					if($koneksi->query($query) === true) {
						echo "<h5 class='text-secondary text-uppercase mb-0'>Data Dengan Nama</h5>".$_POST["nama"]. "<br><h5>Berhasil Diubah</h5>";
					}else{
						$koneksi->error;
						echo "<h5 class='text-secondary text-uppercase mb-0'>Data Dengan Nim</h5>".$_POST["nim"]. "Nama".$_POST["nama"]."<br><h5>Berhasil Disimpan</h4>";
					}

					$koneksi->close();
				?>
				<hr class="star-dark mb-5">
				<a class="btn btn-primary btn-lg" href="input.php">
                Tambah Data</a>
				<a class="btn btn-warning" href="index.php">
                Lihat Data</a>

	</div>
</body>
</html>