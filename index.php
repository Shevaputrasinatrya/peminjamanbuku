<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "dblatihan";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	//jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "edit")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE tmhs set
											 	id_buku = '$_POST[tid]',
											 	nama = '$_POST[tnama]',
												judul_buku = '$_POST[tjudul]',
												gambar = '$_POST[tgambar]',
											 	prodi = '$_POST[tprodi]'
											 WHERE id_mhs = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data sukses!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO tmhs (id_buku, nama, judul_buku, gambar, prodi)
										  VALUES ('$_POST[tid]', 
										  		 '$_POST[tnama]', 
										  		 '$_POST[tjudul]', 
												 '$_POST[tgambar]', 
										  		 '$_POST[tprodi]')
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data sukses!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='index.php';
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
			$tampil = mysqli_query($koneksi, "SELECT * FROM tmhs WHERE id_mhs = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vid = $data['id_buku'];
				$vnama = $data['nama'];
				$vjudul = $data['judul_buku'];
				$vgambar = $data['gambar'];
				$vprodi = $data['prodi'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Sukses!!');
						document.location='index.php';
				     </script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>

	<title>Dashboard Peminjaman Buku</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

	<style>

.head {
      width: 100%;
      height: 170px;
      box-shadow: 2px 2px 8px #54a0ff;
      margin-bottom: 30px;
      background: #000;
      margin: 0px;
      padding: 0px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Bad Script', cursive;
  }

  .head:after {
      content: '';
      display: block;
      clear: both;
  }

  h2 {
      margin: 0;
      padding: 0;
      color: #111;
      font-size: 6em;
  }

  h2 span {
      letter-spacing: 10px;
      display: table-cell;
      margin: 0px;
      padding-top: 20px;
      animation: animate 2s linear infinite;
  }

  h2 span:nth-child(1) {
      animation-delay: 0s
  }

  h2 span:nth-child(2) {
      animation-delay: 0.25s
  }

  h2 span:nth-child(3) {
      animation-delay: 0.5s
  }

  h2 span:nth-child(4) {
      animation-delay: 0.75s
  }

  h2 span:nth-child(5) {
      animation-delay: 1s
  }

  h2 span:nth-child(6) {
      animation-delay: 1.25s
  }

  h2 span:nth-child(7) {
      animation-delay: 1.5s
  }

  h2 span:nth-child(8) {
      animation-delay: 1.75s
  }

  h2 span:nth-child(9) {
      animation-delay: 2s
  }

  h2 span:nth-child(10) {
      animation-delay: 2.25s
  }

  h2 span:nth-child(11) {
      animation-delay: 2.5s
  }

  h2 span:nth-child(12) {
      animation-delay: 2.75s
  }

  h2 span:nth-child(13) {
      animation-delay: 3s
  }

  h2 span:nth-child(14) {
      animation-delay: 3.25s
  }

  h2 span:nth-child(15) {
      animation-delay: 3.5s
  }

  h2 span:nth-child(16) {
      animation-delay: 3.75s
  }

  h2 span:nth-child(17) {
      animation-delay: 4s
  }

  h2 span:nth-child(18) {
      animation-delay: 4.25s
  }

  @keyframes animate {

      0%,
      100% {
          color: #fff;
          filter: blur(2px);
          text-shadow: 0 0 10px #FA8231,
              0 0 20px #FA8231,
              0 0 40px #FA8231,
              0 0 80px #FA8231,
              0 0 120px #FA8231,
              0 0 200px #FA8231,
              0 0 230px #FA8231,
              0 0 250px #FA8231,
              0 0 270px #FA8231,
              0 0 300px #FA8231,
              0 0 330px #FA8231,
              0 0 350px #FA8231,
              0 0 370px #FA8231,
              0 0 400px #FA8231,
              0 0 430px #FA8231,
              0 0 450px #FA8231,
              0 0 470px #FA8231,
              0 0 500px #FA8231;
      }

      5%,
      95% {
          color: #111;
          filter: blur(0px);
          text-shadow: none;
      }
  }

  #peminjam {
	  width: 1110px;
	  height: 700px;
	  overflow: auto;
  }

  .footer {
    width: 100%;
    height: 200px;
    background-color: #0c246152;
    padding-left: 100px;
    padding-top: 10px;
	margin-top: 100px;
}

.footer p:first-child {
    font-family:  'Quicksand', sans-serif;
    font-weight: bold;
    color: #FA8231;
    font-size: 30px;
}

.footer p:nth-child(2) {
    font-family:  'Quicksand', sans-serif;
    font-weight: bold;
    color: #0C2461;
    font-size: 30px;
    margin-left: 66px;
    margin-top: -60px;
}

.footer p:nth-child(3) {
    font-family:  'Quicksand', sans-serif;
    color: #666262;
    margin-left: 25px;
    margin-top: -17px;
	font-size: 13px;
}

.footer p:nth-child(4) {
    font-family:  'Quicksand', sans-serif;
    color: #666262;
    margin-left: 12px;
    margin-top: -17px;
	font-size: 13px;
}

#contact p:first-child {
    font-family:  'Quicksand', sans-serif;
    color: black;
    font-size: 20px;   
    margin-top: -150px;
    margin-left: 40%;
}

#contact p:last-child {
    font-family: 'Roboto', sans-serif;
    color: #3C3939;
    font-size: 15px;
    margin-top: -12px;
    margin-left: 40%;
}



	</style>

</head>
<body>

<header>
    <div class="head">
      <h2>
        <span>C</span>
        <span>h</span>
        <span>o</span>
        <span>i</span>
        <span>c</span>
        <span>e</span>

        <span>Y</span>
        <span>o</span>
        <span>u</span>
        <span>r</span>

        <span>F</span>
        <span>a</span>
        <span>v</span>
        <span>o</span>
        <span>r</span>
        <span>i</span>
        <span>t</span>
        <span>e</span>
      </h2>
  </header>

<div class="container">

	<!-- Awal Card Form -->
	<div class="card mt-5">
	  <div class="card-header bg-primary text-white">
	    Form Input Data Peminjaman Buku
	  </div>

	  <p class="ml-3 mt-3 mb-1"><i>*Note = Batas waktu meminjam buku hingga 3 hari dari peminjaman sekarang. Jika lebih dari 3 hari belum dikembalikan, baca deskripsi di bagian bawah ( footer ).</i></p>

	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>ID Buku</label>
	    		<input type="text" name="tid" value="<?=@$vid?>" class="form-control" placeholder="Input Id Buku disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Nama</label>
	    		<input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Input Nama anda disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Judul Buku</label>
	    		<textarea class="form-control" name="tjudul"  placeholder="Input Judul Buku disini!"><?=@$vjudul?></textarea>
	    	</div>
			<div class="form-group">
	    		<label>Gambar Buku</label>
	    		<textarea class="form-control" name="tgambar"  placeholder="Input link Gambar Buku disini!"><?=@$vgambar?></textarea>
	    	</div>
	    	<div class="form-group">
	    		<label>Jurusan</label>
	    		<select class="form-control" name="tprodi">
	    			<option value="<?=@$vprodi?>"><?=@$vprodi?></option>
	    			<option value="TKJ">TKJ ( Teknik Komputer Jaringan )</option>
	    			<option value="MM">MM ( Multi Media )</option>
	    			<option value="RPL">RPL ( Rekayasa Perangkat Lunak )</option>
					<option value="BC">BC ( Broadcasting )</option>
					<option value="TEI">TEI ( Teknik Elektronika Industri )</option>
					<option value="Lainnya">Umum/Lainnya</option>
	    		</select>
	    	</div>

	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Reset</button>

	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->

	<!-- Awal Card Tabel -->
	<div class="card mt-5">
	  <div class="card-header bg-success text-white">
	    Daftar Peminjam 
	  </div>
	  <div class="card-body" id="peminjam">
	    
	    <table class="table table-bordered table-striped">
	    	<tr class="text-center">
	    		<th>No.</th>
	    		<th>Id Buku</th>
	    		<th>Nama</th>
	    		<th>Judul Buku</th>
				<th>Gambar Buku</th>
	    		<th>Jurusan</th>
	    		<th>Aksi</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id_mhs desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$no++;?></td>
	    		<td><?=$data['id_buku']?></td>
	    		<td><?=$data['nama']?></td>
	    		<td><?=$data['judul_buku']?></td>
				<td><center><img src="<?= $data['gambar'] ?>" alt="" width="80"></center></td>
	    		<td><?=$data['prodi']?></td>
	    		<td>
				<center>
	    			<a href="index.php?hal=edit&id=<?=$data['id_mhs']?>" class="btn btn-warning"> Edit </a>
	    			<a href="index.php?hal=hapus&id=<?=$data['id_mhs']?>" 
	    			   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
				</center>
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>

	  </div>
	</div>
	<!-- Akhir Card Tabel -->

</div>

 <!-- footer -->
 <div class="footer">
            <p>Star</p>
            <p>Book</p>
            <p> *Jika buku lebih dari 3 hari belum dikembalikan maka </p>
            <p> akan dikenakan denda dari setiap buku yang sama <br>
                sebesar Rp. 50.000,00 secara <b>TUNAI</b> tetapi jika<br>
                sipeminjam melakukan tawaran untuk memperpanjang<br>
             	waktu maka hubungi pustakawan :<br>
                <i>Hub. Contact yang tertera</i>.</p>


            <div id="contact">
                <P>Contact</P>
                    <p>No. WA<br>
                        <u>089546758890 ( + Sinta ) <br>
						089567899077 ( + Keyla ) <br>
						0857716088100 ( + David )</u></p>
            </div>
</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>