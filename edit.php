<?php
// include database connection file
include "config.php";

//query karyawan
$query_karyawan = mysqli_query($mysqli, "SELECT * FROM `karyawan` ORDER BY id_karyawan ASC");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   //id_order,username,status,jenis_paket,total_biaya
    $id_order = $_POST['id_order'];
    $username=$_POST['username'];
    $status=$_POST['status'];
    $jenis_paket=$_POST['jenis_paket'];
	$total_biaya=$_POST['total_biaya'];
    $id_karyawan=$_POST['id_karyawan'];
    $karyawan = mysqli_query($mysqli, "SELECT nama_karyawan FROM `karyawan` WHERE id_karyawan = '$id_karyawan'");
        
    while ($row=mysqli_fetch_array($karyawan)) {
        $nama_karyawan = $row['nama_karyawan'];
    }

    // update user data
    mysqli_query($mysqli, "UPDATE `order` SET username='$username', status='$status',id_karyawan='$id_karyawan',jenis_paket='$jenis_paket', total_biaya='$total_biaya' WHERE id_order='$id_order'")or die(mysqli_error($mysqli));
    // echo "<pre>";
    // print_r ($id_order);
    // echo "</pre>";
    // exit();
    // Redirect to homepage to display updated user in list
    header("Location: order_admin.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id_order = $_GET['id_order'];

$tampil_order = mysqli_query($mysqli,"SELECT * FROM `order` INNER JOIN `karyawan` ON `order`.`id_karyawan` = `karyawan`.`id_karyawan` WHERE id_order='$id_order'") or die(mysqli_error($mysqli));

while($user_data = mysqli_fetch_array($tampil_order))
{
    $id_order = $user_data['id_order'];
    $username = $user_data['username'];
    $status = $user_data['status'];
    $nama_karyawan = $user_data['nama_karyawan'];
	$jenis_paket = $user_data['jenis_paket'];
	$total_biaya = $user_data['total_biaya'];
}

//id_order,username,status,jenis_paket,total_biaya
?>
<html>
<head>  
    <title>Edit data</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<?php
    print "Hallo, $username!";
?>
    <br>

    <div class="icon-bar">
        <a href="admin.php" style="text-decoration:none"><i class="fa fa-fw fa-home"></i>Home</a>
    </div>
    
    
    <form name="update" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Username</td>
                <td><input type="text" name="username" value=<?php echo $username;?>></td>
            </tr>
            <tr> 
                <td>Status</td>
                <td><input type="radio" name="status" value="antri" checked>Antri <br>
                    <input type="radio" name="status" value="proses" required>Proses <br>
                    <input type="radio" name="status" value="selesai" required>Selesai<br>
                    <input type="radio" name="status" value="diambil" required>Diambil<br></td>
            </tr>
            <tr>
                <td>Nama Karyawan</td>
                <td>
                    <select name="id_karyawan">
                        <option name="id_karyawan" value="<?php echo $row['id_karyawan'] ?>" disabled="" selected="" style="display:none;">---Pilih Karyawan---</option>
                            <?php
                            while ($row=mysqli_fetch_array($query_karyawan)) {
                              ?>
                              <option value="<?php echo $row['id_karyawan'];?>"><?php echo $row['nama_karyawan'];?></option>
                              <?php
                            }
                          ?>
                    </select>

                </td>
            </tr> 
                <td>Jenis Paket</td>
                <td><input type="text" name="jenis_paket" value="<?php echo $jenis_paket;?>"></td>
            </tr>
			<tr> 
                <td>Total Biaya</td>
                <td><input type="text" name="total_biaya" value="<?php echo $total_biaya;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_order" value=<?php echo $_GET['id_order'];?>></td>
                <td><input type="submit" name="update" value="update"></td>
            </tr>
        </table>
    </form>

    <br>
    <div class="icon-bar">
        <a href="order_admin.php" style="text-decoration:none"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
</body>
</html>