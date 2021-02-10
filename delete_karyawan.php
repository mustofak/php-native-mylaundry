<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$id_karyawan = $_GET['id_karyawan'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM `karyawan` WHERE id_karyawan='$id_karyawan'")or die(mysqli_error($mysqli));

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:karyawan.php");
?>