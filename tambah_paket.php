<<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Paket</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="icon-bar">
        <a href="admin.php" style="text-decoration:none"><i class="fa fa-fw fa-home"></i> Home</a>
    </div>

	<form action="" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Jenis Paket</td>
                <td><input type="text" name="jenis_paket"></td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <div class="icon-bar">
        <a href="menu_paket.php"style="text-decoration:none"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
</body>
</html> 
<?php 
include 'config.php';

if (isset($_POST['Submit'])) {
	$jenis_paket = $_POST['jenis_paket'];
	$harga = $_POST['harga'];

	$result = mysqli_query($mysqli, "INSERT INTO `jenis_paket` (`jenis_paket`, `harga`) VALUES ('$jenis_paket', '$harga')") or die(mysqli_error($mysqli));
	echo "Sukses menambah Menu Paket! <a href='menu_paket.php'>Klik untuk melihat</a>";
}
?>