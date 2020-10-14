<?php 


require 'koneksi.php';

	if (isset($_POST["submit"])) {
		
		$username = $_POST["username"];
		$Password = $_POST["Password"];

		$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");


		//cek username

		if (mysqli_num_rows($result) === 1 ) {
			
			$row = mysqli_fetch_assoc($result);

			if (password_verify($Password, $row["password"])) {
				
				header('Location: index.php');
				exit;
			}


		}

		$error = true;


	}



 ?>





<!DOCTYPE html>
<html>
<head>
	<title>Silahkan login</title>
	<link rel="shortcut icon" href="img/smkn7.png">
</head>
<body style="background: #D9D6D6;">


<center>
  <div class="kotak">
  	<center>
	<img style="width: 100px;" src="img/logo.png">
	<br><br>
	</center>
	<form action="" method="post">

		<?php if (isset($error)) :?>
			<p style="color: white;">Username/password anda salah!!!</p>
		<?php endif; ?>
		
		<input type="text" name="username" placeholder="Username...">
		<br><br><br>

		<input type="Password" name="Password" placeholder="Password...">
		<br><br><br>

		<button type="submit" name="submit">masuk</button>

	</form>

</div>
</center>

</body>
</html>


<style type="text/css">
	.kotak{

		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		background: #808080;
		padding: 50px;
		border-radius: 30px;
	}

	.kotak input{
		padding: 10px;
		width: 200px;
		border-radius: 7px;
	}

	.kotak button{
		padding: 10px;
		border-radius: 50px;
		width: 100px;
		background: white;
		color: #222426;
	}


</style>