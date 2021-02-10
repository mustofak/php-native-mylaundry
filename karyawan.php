<?php
// Membuat koneksi dengan database
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM `karyawan` ORDER BY id_karyawan ASC");
?>

<html>
<head>    
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <div class="icon-bar">
        <a href="tambah_karyawan.php" style="text-decoration:none"><i class="fa fa-plus-square-o"></i> Tambah Karyawan </a><br/><br/>
    </div>

    <!-- -------------------------------------------------------- -->
    
    <table width='80%' border=1>
    <tr>
        <th>ID Karyawan</th>
        <th>Nama Karyawan</th>
        <th>No Telp</th>
		<th>Aksi</th>
    </tr>
        <?php  
            while($user_data = mysqli_fetch_array($result)) {         
                echo "<tr>";
                echo "<td>".$user_data['id_karyawan']."</td>";
                echo "<td>".$user_data['nama_karyawan']."</td>";
                echo "<td>".$user_data['no_telp']."</td>";
                echo "<td><a href='edit_karyawan.php?id_karyawan=$user_data[id_karyawan]'>Edit</a> | <a href='delete_karyawan.php?id_karyawan=$user_data[id_karyawan]'>Delete</a></td>";
            }
        ?>
    </table>
        <br>

    <div class="icon-bar">
        <a href="admin.php" style="text-decoration:none"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>

</body>
</html>