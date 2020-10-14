
<?php 

$koneksi =  mysqli_connect("localhost", "root", "", "perpusweb");



// query

function query($data){
	global $koneksi;
	$result = mysqli_query($koneksi, $data);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {		
		$rows[] = $row;
	}


	return $rows;
	
}


// Tambah


	function tambah($data){
		global $koneksi;


	$nama = ucwords($data["nama"]);
	$kelas = strtoupper($data["kelas"]);
	$jurusan = ucwords($data["jurusan"]);
	$buku = ucwords($data["buku"]);

		$sql = "INSERT INTO perpus_tb VALUES('','$nama', '$kelas', '$jurusan', '$buku') ";
		mysqli_query($koneksi, $sql);


		return mysqli_affected_rows($koneksi);

	}


// hapus 

	function hapus($id){
		
		global $koneksi;

		$sql = "DELETE FROM perpus_tb WHERE id = $id";

		mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);


	}


// ubah 

	function ubah($data){
		global $koneksi;

		$id = $data["id"];
		$nama = $data["nama"];
		$kelas = $data["kelas"];
		$jurusan = $data["jurusan"];
		$buku = $data["buku"];

		$sql = "UPDATE perpus_tb SET nama = '$nama', kelas = '$kelas', jurusan = '$jurusan', buku = '$buku' WHERE id = $id ";

		mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);

	}



// sign up

	function signup($data){
		global $koneksi;

		$username = strtolower(stripslashes($data["username"]));
		$password = mysqli_real_escape_string($koneksi, $data["password"]);
		$password2 = mysqli_real_escape_string($koneksi, $data["password2"]);


		//cek username sama atu tidak

		$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' ");

		if (mysqli_fetch_assoc($result)) {
			
			echo "<script>
					alert('Username trdaftar');
					document.location.href='';
						</script>";


			return false;


		}



		//cek konfirmasi password
		if ($password !== $password2) {
			
			echo "<script>
					alert('Password Konfirmasi salah');
					document.location.href='';
						</script>";

			return false;
		}


		//encrypty password
		$password = password_hash($password, PASSWORD_DEFAULT);


		//memasukan ke database

		$sql = " INSERT INTO user VALUES('','$username', '$password') ";
		mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);


	}


//PENCARIAN

	function cari($keyword){
		
		$query = "SELECT * FROM perpus_tb WHERE nama LIKE '%$keyword%' OR kelas LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' OR buku LIKE '%$keyword%' ";

		return query($query);

	}



 ?>