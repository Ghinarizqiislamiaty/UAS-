<html !DOCTYPE>
<head>
	<title>Ubah Data</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body>
<br>
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading"><h2>Ubah Data</h2></div>
	<hr>
<?php
    include('koneksi.php');

    if($_GET['nim']!=null){
        $nim = $_GET['nim'];

        $koneksiObj = new Koneksi();
        $koneksi = $koneksiObj->getKoneksi();

        if($koneksi->connect_error){
            echo "Gagal Koneksi : ". $koneksi->connect_error;
        }

        $query = "select * from uas_mahasiswa where nim='$nim'";
        $data = $koneksi->query($query);

    }
?>

<?php
        if($data->num_rows <= 0){
            echo "Data tidak ditemukan";
        } else{
            while($row = $data->fetch_assoc()){
                $nim    = $row['nim'];
                $nama   = $row['nama'];
                $jk     = $row['jenis_kelamin'];
				$jurusan  = $row['jurusan'];
                $semester    = $row['semester'];
                $alamat    = $row['alamat'];
            }
        }
    ?>

    <div class="panel-body">
		<form action = "update.php" method="post">
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">NIM</label>
				<div class="col-3">
					<input class="form-control" type="text" name="nim" readonly="true"
					value="<?php echo $_GET["nim"]; ?>" requered>
				</div>
			</div>
			
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">NAMA</label>
				<div class="col-3">
					<input class="form-control" type="text" name="nama" placeholder="nama" value="<?php echo $nama;?>">
				</div>
			</div>
			
			<div class="form-group row">
			  <label class="col-sm-2 control-label">JENIS KELAMIN</label>
			  <div class="col-3">
				  <select class="form-control" name="jk">
					<option selected>Jenis Kelamin</option>
					<option value="Laki-Laki" <?php echo $jk=='Laki-Laki' ? 'selected':'';?>>Laki-laki</option>
                    <option value="Perempuan" <?php echo $jk=='Perempuan' ? 'selected':'';?>>Perempuan</option>
				  </select>
			  </div>
			</div>
			
			<div class="form-group row">
			  <label class="col-sm-2 control-label">JURUSAN</label>
			  <div class="col-3">
				  <select class="form-control" name="jurusan" value="<?php echo $_GET["jurusan"]; ?>">
					<option selected>Pilih Jurusan</option>
					<option value="D4 Teknik Informatika" <?php echo $jurusan=='D4 Teknik Informatika' ? 'selected':'';?>>D4 Teknik Informatika</option>
					<option value="D3 Kebidanan" <?php echo $jurusan=='D3 Kebidanan' ? 'selected':'';?>>D3 Kebidanan</option>
					<option value="D3 Farmasi" <?php echo $jurusan=='D3 Farmasi' ? 'selected':'';?>>D3 Farmasi</option>
					<option value="D4 Mesin" <?php echo $jurusan=='D3 Mesin' ? 'selected':'';?>>D3 Mesin</option>
					<option value="D3 Kebidanan" <?php echo $jurusan=='D3 Akutansi' ? 'selected':'';?>>D3 Akutansi</option>
					<option value="D3 Farmasi" <?php echo $jurusan=='D3 Komputer' ? 'selected':'';?>>D3 Komputer</option>
				  </select>
			  </div>
			</div>
			
			<div class="form-group row">
			  <label class="col-sm-2 control-label">SEMESTER</label>
			  <div class="col-3">
				  <select class="form-control" name="semester" value="<?php echo $_GET["semester"]; ?>">
					<option selected>Semester</option>
					<option value="1" <?php echo $semester=='1' ? 'selected':'';?>>1</option>
					<option value="2" <?php echo $semester=='2' ? 'selected':'';?>>2</option>
					<option value="3" <?php echo $semester=='3' ? 'selected':'';?>>3</option>
					<option value="4" <?php echo $semester=='4' ? 'selected':'';?>>4</option>
					<option value="5" <?php echo $semester=='5' ? 'selected':'';?>>5</option>
					<option value="6" <?php echo $semester=='6' ? 'selected':'';?>>6</option>
					<option value="7" <?php echo $semester=='7' ? 'selected':'';?>>7</option>
					<option value="8" <?php echo $semester=='8' ? 'selected':'';?>>8</option>
				  </select>
			  </div>
			</div>
			
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">ALAMAT</label>
				<div class="col-3">
					<input class="form-control" type="text" name="alamat" placeholder="alamat" value="<?php echo $alamat;?>">
				</div>
			</div>
			
			<input class="btn btn-primary" type="submit" value="Simpan">
			<input class="btn btn-danger" type="reset" value="Reset">
		</form>
	</div>
  </div>
	</div>
</div>
</body>
</html>