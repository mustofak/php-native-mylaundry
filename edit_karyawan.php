<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   $id_karyawan = $_POST['id_karyawan'];
    $nama_karyawan=$_POST['nama_karyawan'];
    $no_telp=$_POST['no_telp'];

	

    // update barang
    $result = mysqli_query($mysqli, "UPDATE `karyawan` SET nama_karyawan='$nama_karyawan', no_telp='$no_telp' WHERE id_karyawan='$id_karyawan'")or die(mysqli_error($mysqli));

    // Redirect to homepage to display updated user in list
    header("Location: karyawan.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id_karyawan = $_GET['id_karyawan'];


    

$result = mysqli_query($mysqli,"SELECT * FROM `karyawan` WHERE id_karyawan='$id_karyawan'") or die(mysqli_error($mysqli));

while($user_data = mysqli_fetch_array($result))
{
    $id_karyawan = $user_data['id_karyawan'];
    $nama_karyawan = $user_data['nama_karyawan'];
    $no_telp = $user_data['no_telp'];
}
?>
<html>
<head>  
    <title>Edit karyawan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="icon-bar">
        <a href="admin.php" style="text-decoration:none"><i class="fa fa-fw fa-home"></i> Home</a>
    </div>
    <br/><br/>
    
    
    <form name="update_user" method="post" action="edit_karyawan.php">
        <table border="0">
            <tr> 
                <td>Nama Karyawan</td>
                <td><input type="text" name="nama_karyawan" value=<?php echo "$nama_karyawan";;?>></td>
            </tr>
            <tr> 
                <td>No Telp</td>
                <td><input type="text" name="no_telp" value=<?php echo $no_telp;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_karyawan" value=<?php echo $_GET['id_karyawan'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>