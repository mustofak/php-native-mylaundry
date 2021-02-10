<?php
// Membuat koneksi dengan database
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM `order` ORDER BY id_order DESC");
?>

<html>
<head>    
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <div class="icon-bar">
        <a href="add_user.php" style="text-decoration:none"><i class="fa fa-plus-square-o"></i> Tambah Order </a>
    </div>

    <!-- -------------------------------------------------------- -->
    
    <table width='80%' border=1>
    <tr>
        <th>ID Order</th>
        <th>Username</th>
        <th>Status</th>
    </tr>
        <?php  
            while($user_data = mysqli_fetch_array($result)) {         
                echo "<tr>";
                echo "<td>".$user_data['id_order']."</td>";
                echo "<td>".$user_data['username']."</td>";
                echo "<td>".$user_data['status']."</td>"; 
            }
        ?>
    </table>
        <br>

    <div class="icon-bar">
        <a href="user.php" style="text-decoration:none"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>

</body>
</html>