<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM `history` ORDER BY id_order DESC");
?>
<!DOCTYPE html>
<html>
<head>
	<title>History</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="icon-bar">
        <a href="user.php" style="text-decoration:none"><i class="fa fa-fw fa-home"></i> Home</a>
    </div>

<table width='80%' border=1>
    
    <?php

        // Fetch all users data from database
        $result = mysqli_query($mysqli, "SELECT * FROM `order` ORDER BY id_order DESC");
    ?>

    <tr>
        <th>ID Order</th>
        <th>Nama Costumer</th>
        <th>Jenis Paket</th>
        <th>Status</th>
        <th>Total Biaya</th>
    </tr>

    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id_order']."</td>";
        echo "<td>".$user_data['username']."</td>";
		echo "<td>".$user_data['jenis_paket']."</td>";
        echo "<td>".$user_data['status']."</td>";
		echo "<td>".$user_data['total_biaya']."</td>";        
		
    }
    ?>

    </table>

    <div class="icon-bar">
        <a href="order_user.php" style="text-decoration:none"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>

</body>
</html>