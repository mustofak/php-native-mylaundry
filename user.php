<?php  
	session_start();
	include 'config.php';
?>
<!DOCTYPE html>
<html>
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<head>
	<title>Halaman User</title>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	
	<div class="navbar">
		<a href=""><i class="fa fa-fw fa-home"></i>Home</a>
		<a href="daftar_paket.php"><i class="far fa-list-alt"></i>Daftar Paket</a>
		<a href="order_user.php"><i class="fas fa-tshirt"></i>MoLaundry</a>
		<a href="logout.php"><i class="fa fa-toggle-on"></i>Logout</a>
	</div>

		<div class="middle">
			<h1>SELAMAT DATANG DI MY-LAUNDRY!</h1>
		</div>

</body>
</html>