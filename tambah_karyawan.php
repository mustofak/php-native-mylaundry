<<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Karyawan</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="icon-bar">
        <a href="admin.php" style="text-decoration:none"><i class="fa fa-fw fa-home"></i> Home</a>
    </div>

	<form action="" method="post" name="form1">
        <table width="25%" border="0">
            <!-- <tr> 
                <td>ID Karyawan</td>
                <td><input type="text" name="id_karyawan"></td>
            </tr> -->
            <tr> 
                <td>Nama Karyawan</td>
                <td><input type="text" name="nama_karyawan"></td>
            </tr>
			<tr> 
                <td>No Telp</td>
                <td><input type="text" name="no_telp"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <div class="icon-bar">
        <a href="admin.php"style="text-decoration:none"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
</body>
</html> 
<?php 
include 'config.php';

if (isset($_POST['Submit'])) {
	/*$id_karyawan = $_POST['id_karyawan'];*/
	$nama_karyawan = $_POST['nama_karyawan'];
	$no_telp = $_POST['no_telp'];

	$result = mysqli_query($mysqli, "INSERT INTO `karyawan` (`nama_karyawan`, `no_telp`) VALUES ('$nama_karyawan', '$no_telp')") or die(mysqli_error($mysqli));
	echo "Sukses menambah Karyawan! <a href='karyawan.php'>Klik untuk melihat</a>";
}
?>