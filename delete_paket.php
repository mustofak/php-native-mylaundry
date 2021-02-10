<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$id_paket = $_GET['id_paket'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM `jenis_paket` WHERE id_paket='$id_paket'")or die(mysqli_error($mysqli));

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:menu_paket.php");
?>