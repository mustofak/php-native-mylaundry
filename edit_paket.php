<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   $id_paket = $_POST['id_paket'];
    $jenis_paket=$_POST['jenis_paket'];
    $harga=$_POST['harga'];

    // update barang
    $result = mysqli_query($mysqli, "UPDATE `jenis_paket` SET jenis_paket='$jenis_paket', harga='$harga' WHERE id_paket='$id_paket'")or die(mysqli_error($mysqli));

    // Redirect to homepage to display updated user in list
    header("Location: menu_paket.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id_paket = $_GET['id_paket'];



$result = mysqli_query($mysqli,"SELECT * FROM `jenis_paket` WHERE id_paket='$id_paket'") or die(mysqli_error($mysqli));

while($user_data = mysqli_fetch_array($result))
{
    $id_paket = $user_data['id_paket'];
    $jenis_paket = $user_data['jenis_paket'];
    $harga = $user_data['harga'];
}
?>
<html>
<head>  
    <title>Edit Paket</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="icon-bar">
        <a href="admin.php" style="text-decoration:none"><i class="fa fa-fw fa-home"></i> Home</a>
    </div>
    <br/><br/>
    
    
    <form name="update" method="post" action="edit_paket.php">
        <table border="0">
            <tr> 
                <td>Jenis Paket</td>
                <td><input type="text" name="jenis_paket" value=<?php echo $jenis_paket;?>></td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="text" name="harga" value=<?php echo $harga;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_paket" value=<?php echo $_GET['id_paket'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>

    <br><br>
    <div class="icon-bar">
        <a href="menu_paket.php" style="text-decoration:none"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
</body>
</html>