<?php
    include "config.php";
    $query_barang = mysqli_query($mysqli, "SELECT * FROM `jenis_paket` ORDER BY id_paket ASC");
    // $query_barang = mysqli_fetch_array($query_exe);
    // print_r($query_barang);
?>
<html>
<head>
    <title>Add Users</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="icon-bar">
        <a href="user.php" style="text-decoration:none"><i class="fa fa-fw fa-home"></i> Home</a>
    </div>

    <form action="add_user.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr> 
                <td>Status</td>
                <td><input type="radio" name="status" value="antri" checked>Antri</td>
            </tr>
            <tr> 
                <td>Jenis Barang</td>
                <td><!-- <input type="radio" name="jenis_barang">Kaos Pendek   -->                  
                    <select name="jenis_paket">
                        <option name="jenis_paket" value="---Pilih Paket---" disabled="" selected="" style="display:none;">---Pilih Paket---</option>
                            <?php
                            while ($row=mysqli_fetch_array($query_barang)) {
                              ?>
                              <option value="<?php print $row['jenis_paket'];?>"><?php print $row['jenis_paket'];?></option>
                              <?php
                            }
                          ?>
                    </select>
            </tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php
    //id_order,username,status,wkt_mulai,wkt_selesai,total_biaya
    // Check If form submitted, insert form data into users table.
        
    if(isset($_POST['Submit'])) {
        $nama=$_POST['username'];
    if ($nama ==''){
        echo "Nama harus diisi";
    exit;}
        else{
        $username = $_POST['username'];
        $jenis_paket = $_POST['jenis_paket'];
        $status = $_POST['status'];
        $biaya = mysqli_query($mysqli, "SELECT harga FROM `jenis_paket` WHERE jenis_paket = '$jenis_paket'");
        
        while ($row=mysqli_fetch_array($biaya)) {
            $total_biaya = $row['harga'];
        }
        
        }
        // include database connection file
        $result = mysqli_query($mysqli, "INSERT INTO `order` (`username`, `jenis_paket`,`status`,`id_karyawan`, `total_biaya`) VALUES ('$username', '$jenis_paket','$status','9', '$total_biaya')") or die(mysqli_error($mysqli));
        // Show message when user added
        echo "Data berhasil ditambahkan!";
        }
    ?>
    <?php include_once("config.php");

        // Fetch all users data from database
        $result = mysqli_query($mysqli, "SELECT * FROM `order` ORDER BY id_order DESC");
    ?>

    <table width='80%' border=1>
    <tr>
        <th>Nama</th>
        <th>Jenis Paket</th>
        <th>Total Biaya</th>
        

    </tr>
        <?php  
        while($user_data = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$user_data['username']."</td>";
            echo "<td>".$user_data['jenis_paket']."</td>"; 
            echo "<td>".$user_data['total_biaya']."</td>";
            }
        ?>
    </table>

    <div class="icon-bar">
        <a href="order_user.php"style="text-decoration:none"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>

</body>
</html>
