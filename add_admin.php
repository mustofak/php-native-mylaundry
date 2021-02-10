<?php 
include 'config.php';
$query_paket = mysqli_query($mysqli, "SELECT * FROM `jenis_paket` ORDER BY id_paket ASC");
 ?>
<html>
<head>
    <title>Add Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    
    <div class="icon-bar">
        <a href="admin.php" style="text-decoration:none"><i class="fa fa-fw fa-home"></i> Home</a>
    </div>

    <form action="add_admin.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Costumer</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr> 
                <td>Status</td>
                <td><input type="radio" name="status" value="antri" required>Antri <br>
                    <input type="radio" name="status" value="proses" required>Proses <br>
                    <input type="radio" name="status" value="selesai" required>Selesai<br>
                </td>
            </tr>
			<tr> 
                <td>Jenis Paket</td>
                <td>
                    <select name="jenis_paket">
                        <option name="jenis_paket" value="---Pilih Paket---" disabled="" selected="" style="display:none;">---Pilih Paket---</option>
                            <?php
                            $harga=1;
                            while ($row=mysqli_fetch_array($query_paket)) {
                              ?>
                              <option value="<?php echo $row['jenis_paket'];?>"><?php echo $row['jenis_paket'];?></option>
                              <?php
                            }
                          ?>
                    </select>
                </td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php

    // include database connection file
    include_once("config.php");

	//id_order,username,status,jenis_paket,total_biaya
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $username = $_POST['username'];
        $status = $_POST['status'];
		$jenis_paket = $_POST['jenis_paket'];
        $biaya = mysqli_query($mysqli, "SELECT harga FROM `jenis_paket` WHERE jenis_paket = '$jenis_paket'");
        // $total_biaya = $_POST['harga'];
        while ($row=mysqli_fetch_array($biaya)) {
            $total_biaya = $row['harga'];
        }
        

		
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO `order` (`username`, `status`, `id_karyawan`, `jenis_paket`, `total_biaya`) VALUES ('$username', '$status', '9', '$jenis_paket','$total_biaya')") or die(mysqli_error($mysqli));
        // Show message when user added
        echo "Sukses menambah laundry! <a href='order_admin.php'>Klik untuk melihat</a>";
    }
    ?>
    <br>
     <div class="icon-bar">
        <a href="order_admin.php"style="text-decoration:none"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
</body>
</html>