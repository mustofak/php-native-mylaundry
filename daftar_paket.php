	<?php
// Membuat koneksi dengan database
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM `jenis_paket` ORDER BY id_paket ASC");
	?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Daftar Paket User</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   
    <div class="icon-bar">
        <a href="user.php" style="text-decoration:none"><i class="fa fa-fw fa-home"></i> Home </a><br/><br/>
    </div>

    <!-- -------------------------------------------------------- -->
    
    <table width='80%' border=1>
    <tr>
        <th>ID Paket</th>
        <th>Jenis Paket</th>
        <th>Harga</th>
    </tr>
        <?php  
            while($user_data = mysqli_fetch_array($result)) {         
                echo "<tr>";
                echo "<td>".$user_data['id_paket']."</td>";
                echo "<td>".$user_data['jenis_paket']."</td>";
                echo "<td>".$user_data['harga']."</td>";
            }
        ?>
    </table>
        <br>

    <div class="icon-bar">
        <a href="user.php" style="text-decoration:none"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>

</body>
</html>
</body>
</html>