<?php  
	session_start();
	include 'config.php';
?>
<!DOCTYPE html>
<html>
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<head>
	<title>Halaman Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<div class="navbar">
		<a href=""><i class="fa fa-fw fa-home"></i>Home</a>
		<a href="order_admin.php"><i class="fa fa-cog"></i>Kelola Order</a>
		<a href="karyawan.php"><i class="fa fa-cog"></i>Kelola Karyawan</a>
		<a href="menu_paket.php"><i class="fa fa-cog"></i>Kelola Paket</a>	
		<a href="logout.php"><i class="fa fa-toggle-on"></i>Logout</a>
	</div>

		<div class="middle">
			<h1>SELAMAT DATANG DI MY-LAUNDRY!</h1>
		</div>

</body>
</html>

