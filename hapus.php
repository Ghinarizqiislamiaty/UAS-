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
              <h3 class='text-secondary text-uppercase mb-0'>Data Mahasiswa</h3>
				<hr class="star-dark mb-5">
					<?php
					include "koneksi.php";

					$koneksiObj = new koneksi();
					$koneksi = $koneksiObj->getKoneksi();
					


					if($koneksi->connect_error) {
						echo "gagal koneksi : ".$koneksi->connect_error;
					}else {
						echo "";
					}

					$qry = "delete from uas_mahasiswa where nim=" . $_GET["nim"];

					if($koneksi->query($qry) === true) {
						echo "<h5 class='text-secondary text-uppercase mb-0'>Data  Berhasil Dihapus</h5>";
					}else {
						echo "<h5 class='text-secondary text-uppercase mb-0'>Data Data Gagal Dihapus</h5>";
					}

					$koneksi->close();
					?>
					<hr class="star-dark mb-5">
					<a class="btn btn-primary" href="index.php">
					<i class="fa fa-close"></i>
					Lihat Data</a>
				</div>
			  </div>
			</div>
		  </div>
		</div>	
		</div>
	</div>
</body>
</html>
