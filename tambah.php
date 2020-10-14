<?php 

	require 'koneksi.php';


	if (isset($_POST["submit"])) {

		if ( tambah($_POST) > 0) {
			
			echo "<script>
					alert('Berhasil ditambahkan');
					document.location.href='index.php';
						</script>";

		} else{

			echo "<script>
					alert('gagal ditambahkan');
					document.location.href='';
						</script>";
		}

	}





 ?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tambah</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body style="background-color: #DCDCDC;">

<div class="kotak">
	<form action="" method="post">
		<h1 style="text-align: center; color: white; font-family: sans-serif; margin-bottom: 30px; text-indent: all;">Pinjam Buku</h1>

		<label class="">Nama: </label>
		<input type="text" name="nama" required="">
		<br><br>

		<label class="">kelas: </label>
		<select class="" name="kelas">
			<option value="X">X</option>
			<option value="XI">XI</option>
			<option value="XII">XII</option>
		</select>
		<br><br>
		

		<label class="jurusan">Jurusan: </label>
		<select class="" name="jurusan">
			<option value="rekayasa perangkat lunak">RPL</option>
			<option value="tkro">TKRO</option>
			<option value="tsm">TSM</option>
			<option value="elektro">Elektro</option>
			<option value="artsitek">Arsitek</option>
		</select>	
		<br><br>
		

		<label class="">buku: </label>
		<input type="text" name="buku" required="">
		<br><br>


		<button class="btn btn-primary" type="submit" name="submit">Submit</button>

</form>

</div>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


<style type="text/css">
	.kotak{

		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		background: #008692;
		padding: 50px;
		border-radius: 30px;
	}

	.kotak input{
		padding: 10px;
		width: 300px;
		border-radius: 7px;
	}

	.kotak select{
		padding: 10px;
		width: 200px;
		border-radius: 7px;
	
	}

	label {
		margin-right: 60px;
		color: white;
	}

	.jurusan{
		margin-right: 40px;
	}



</style>