<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM `order` INNER JOIN `karyawan` ON `order`.`id_karyawan` = `karyawan`.`id_karyawan` ORDER BY `order`.`id_order` ASC");
?>

<html>
<head>    
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="icon-bar">
        <a href="add_admin.php" style="text-decoration:none"><i class="fa fa-plus-square-o"></i> Tambah</a>
        <a href="history_admin.php" style="text-decoration:none"><i class="fa fa-history"></i> History</a><br/><br/>
    </div>

    <table width='80%' border=1>
    <tr>
        <th>ID Order</th>
        <th>Nama Costumer</th>
        <th>Status</th>
        <th>Nama Karyawan</th>
        <th>Jenis Paket</th>
        <th>Total Biaya</th>
        <th>Update</th>
    </tr>

    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id_order']."</td>";
        echo "<td>".$user_data['username']."</td>";
        echo "<td>".$user_data['status']."</td>";
        echo "<td>".$user_data['nama_karyawan']."</td>";
        echo "<td>".$user_data['jenis_paket']."</td>";  
        echo "<td>".$user_data['total_biaya']."</td>";
        
        echo "<td><a href='edit.php?id_order=".$user_data['id_order']."'>Edit</a> | <a href='delete.php?id_order=".$user_data['id_order']."'>Delete</a></td></tr>";        
    }
    ?>

    </table>
        <br>

    <div class="icon-bar">
        <a href="admin.php" style="text-decoration:none"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
    
</body>
</html>